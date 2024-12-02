<script>
    user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'
    let user_data = {};
    let user_cart = {};
    let payment_data = { method: 'cod' }
    let shipping_method = 0
    get_cart()
    let grand_total = '';

    function get_cart() {
        $.ajax({
            url: '<?= base_url('/api/user/cart') ?>',
            type: "GET",
            data: {
                user_id: user_id
            },
            beforeSend: function () {},
            success: function (resp) {
                console.log(resp);
                if (resp.status) {
                    user_cart.cart = resp.data;
                    let subTotal = 0;
                    let totalDeliveryCharge = 0; // Initialize total delivery charge

                    // Loop through cart items and calculate subtotal and delivery fees
                    $.each(resp.data, function (index, item) {
                        var original_price = item.product.base_discount 
                            ? (item.product.base_price - (item.product.base_price * item.product.base_discount / 100)) 
                            : item.product.base_price;

                        // Update the subtotal by multiplying the discounted price with quantity
                        subTotal += parseInt(original_price, 10) * parseInt(item.qty, 10);

                        // Calculate delivery charge for the current item
                        let itemDeliveryCharge = item.product.delivery_charge ? item.product.delivery_charge : 0;
                        totalDeliveryCharge += parseInt(itemDeliveryCharge, 10);
                    });

                    // Display the subtotal
                    $('.subtotal_amount').html(`₹${subTotal}`);

                    // Display the delivery charge
                    if (totalDeliveryCharge > 0) {
                        $('#delivary_charge').html(`₹${totalDeliveryCharge}`);
                    } else {
                        $('#delivary_charge').html('<p style="color: green;">Free</p>');
                    }

                    // Calculate the grand total (subtotal + delivery charges)
                    grand_total = subTotal + totalDeliveryCharge;

                    // Update the checkout button with the grand total
                    $('#oder_placed_btn').html(`
                        <p class="total-price" id="grand_total">₹${grand_total}</p>
                        <button class="checkout" onclick="place_order()" id="place_order_btn">Confirm</button>
                    `);

                    // Store relevant data in the user_cart object
                    user_cart.subTotal = subTotal;
                    user_cart.total = grand_total;
                    user_cart.deliveryCharge = totalDeliveryCharge;

                } else {
                    console.log("Cart is empty or error in response.");
                }
            },
            error: function (err) {
                console.error("Error fetching cart data:", err);
            }
        });
    }


    get_user_data()
    function get_user_data() {
        $.ajax({
            url: "<?= base_url('api/user') ?>",
            type: "GET",
            success: function (resp) {
                console.log(resp)
                if (resp.status == true) {

                    user_data.name = resp.user_data.user_name
                    user_data.email = resp.user_data.email
                    user_data.number = resp.user_data.number
                    // console.log(resp.address)
                    user_data.address = resp.address
                    user_data.allAddress = resp.all_address
                    user_data.user = resp.user_data
                    user_data.user_img = resp.user_img
                    // console.log('address1',user_data)

                } else {
                    console.log(resp.message)
                }
            },
            error: function () {
            }
        })
    }

    function get_discounts_amount(originalPrice, discountPercentage) {
        // Calculate the discount amount
        var discountAmount = (originalPrice * discountPercentage) / 100;
        return discountAmount;
    }


    // function place_order() {
    //     var formData = new FormData();

    //     $.each($('#user_prescription')[0].files, function (index, file) {
    //         formData.append('prescription[]', file);
    //     });
    //     $.ajax({
    //         url: '<?= base_url('/api/order/confirm') ?>',
    //         type: "POST",
    //         contentType: 'application/json',
    //         data: JSON.stringify({
    //             user_data: user_data,
    //             user_cart: user_cart,
    //             grand_total: grand_total,
    //             shipping_method: shipping_method,
    //             payment_data: payment_data,
    //         }),
    //         formData,
    //         contentType: false,
    //         processData: false,
    //         beforeSend: function () { },
    //         success: function (resp) {
    //             if (resp.status) {
    //                 let order_id = resp.data.order_id
    //                 Toastify({
    //                     text: resp.message.toUpperCase(),
    //                     duration: 3000,
    //                     position: "center",
    //                     stopOnFocus: true,
    //                     style: {
    //                         background: resp.status ? 'darkgreen' : 'darkred',
    //                     },
    //                 }).showToast();
    //                 // Redirect after 2 seconds
    //                 setTimeout(function () {
    //                     window.location.href = `<?= base_url('/order/success?o_id=') ?>${order_id}`;
    //                 }, 2000);
    //             } else {
    //                 Toastify({
    //                     text: resp.message.toUpperCase(),
    //                     duration: 3000,
    //                     position: "center",
    //                     stopOnFocus: true,
    //                     style: {
    //                         background: resp.status ? 'darkgreen' : 'darkred',
    //                     },
    //                 }).showToast();
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err)
    //         }
    //     })
    // }

    function place_order() {
        var formData = new FormData();

        // Append other order data to formData
        formData.append('user_data', JSON.stringify(user_data));
        formData.append('user_cart', JSON.stringify(user_cart));
        formData.append('grand_total', grand_total);
        formData.append('shipping_method', shipping_method);
        formData.append('payment_data', JSON.stringify(payment_data));

        // Log FormData entries
        // for (let [key, value] of formData.entries()) {
        //     console.log(`check11`, value);
        // }

        $.ajax({
            url: '<?= base_url('/api/order/confirm') ?>',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false, // Prevent jQuery from processing the data
            beforeSend: function () {},
            success: function (resp) {
                console.log('user_Data', resp);
                if (resp.status) {
                    let order_id = resp.data.order_id;
                    Toastify({
                        text: resp.message.toUpperCase(),
                        duration: 3000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background: resp.status ? 'darkgreen' : 'darkred',
                        },
                    }).showToast();

                    // Redirect after 2 seconds
                    setTimeout(function () {
                        window.location.href = `<?= base_url('/order/success?o_id=') ?>${order_id}`;
                    }, 2000);
                } else {
                    Toastify({
                        text: resp.message.toUpperCase(),
                        duration: 3000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background: 'darkred',
                        },
                    }).showToast();
                }
            },
            error: function (err) {
                console.error(err);
            }
        });
    }


</script>