<script>
    
    user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'
    // console.log(user_id)
    get_cart()
    // function get_cart() {
    //     $.ajax({
    //         url: '<?= base_url('/api/user/cart') ?>',
    //         type: "GET",
    //         data: {
    //             user_id: user_id
    //         },
    //         beforeSend: function () { },
    //         success: function (resp) {
    //             console.log('error_Scan', resp);
    //             if (resp.status) {
    //                 let html = ``;
    //                 let subTotal = 0;
    //                 let totalDeliveryCharge = 0; // Initialize total delivery charge
    //                 $.each(resp.data, function(index, item) {
    //                 console.log('error_Scan1', item);

    //                     let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg';
    //                     if(item.product.product_img != ""){
    //                         product_image = `<?= base_url()?>${item.img_url}${item.product.product_img[0].src}`;
    //                     }

    //                     // Calculate original price and discounted price
    //                     var original_price = item.product.base_discount ? 
    //                         (item.product.base_price - (item.product.base_price * (item.product.base_discount / 100))).toFixed(2) : item.product.base_price;
    //                     var discounted_price = item.product.base_discount ? 
    //                         (item.product.base_price - (item.product.base_price * (item.product.base_discount / 100))).toFixed(2) : item.product.base_price;
                        
    //                     // Calculate total price for this item (discounted price * quantity)
    //                     subTotal += parseInt(discounted_price, 10) * parseInt(item.qty, 10);

    //                     // Calculate delivery charge for this item
    //                     let itemDeliveryCharge = item.product.delivery_charge ? item.product.delivery_charge : 0;
    //                     totalDeliveryCharge += parseInt(itemDeliveryCharge, 10);

    //                     // Calculate tax (if available in the response) or assume a fixed rate
    //                     let itemTax = item.product.tax ? item.product.tax : 0; // Replace with actual logic for tax calculation if needed

    //                     console.log('charge', item.product.delivery_charge);
    //                     console.log('tax', itemTax);

    //                     let truncatedDescription = truncateText(item.product.description, 15);
    //                     html += `<div class="cart-item">
    //                                 <div class="item-image" style="background-image: url('${product_image}');"></div>
    //                                 <div class="item-info">
    //                                     <h4>${item.product.name}</h4>
    //                                     <p>${truncatedDescription}</p>
    //                                     <div class="item-controls">
    //                                         <span>₹${item.product.base_price}</span>
    //                                         <div class="item-quantity">
    //                                             <button class="minus" onClick="updateCartItem('${item.cart_id}', '${item.qty == 1 ? 1 : parseInt(item.qty) - 1}', ${item.product.quantity})">-</button>
    //                                             <input type="number" value="${item.qty}" min="1" readonly>
    //                                             <button class="plus" onClick="updateCartItem('${item.cart_id}', '${parseInt(item.qty) + 1}', ${item.product.quantity})">+</button>
    //                                         </div>
    //                                     </div>
    //                                     <!-- Display discounted price, tax, and delivery charge -->
    //                                     <div class="item-details">
    //                                         <p>Discounted Price: ₹${discounted_price}</p>
    //                                         <p>Tax: ₹${itemTax}</p>
    //                                         <p>Delivery Charge: ₹${itemDeliveryCharge}</p>
    //                                     </div>
    //                                 </div>
    //                                 <button class="remove-item" onclick="remove_cart_item('${item.cart_id}')">×</button>
    //                             </div>`;
    //                 });

    //                 $('#cart_item').html(html);
    //                 $('.subtotal_amount').html(`₹${subTotal}`);
    //                 let grand_total = subTotal + totalDeliveryCharge; // Add delivery charge to the grand total

    //                 // Set the total delivery charge
    //                 if (totalDeliveryCharge > 0) {
    //                     $('#delivary_charge').html(`₹${totalDeliveryCharge}`);
    //                 } else {
    //                     $('#delivary_charge').html(`<p style="color: green;">Free</p>`);
    //                 }

    //                 // Checkout Button Logic
    //                 $('.checkout_button').html(`<p class="total-price">₹${grand_total} </p>
    //                                                 <a href="<?= base_url('billing')?>">
    //                                                 <button class="checkout">Checkout</button>
    //                                                 </a>`);
    //             } else {
    //                 $('#cart_item').html("");
    //                 $('.subtotal_amount').html(`₹0`);
    //                 $('.checkout_button').html(`<p class="total-price">₹0 </p>
    //                                                 <a href="javascript:void(0)" onclick="billing_icomplete()">
    //                                                 <button class="checkout btn_disabled">Checkout</button>
    //                                                 </a>`);
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err);
    //         }
    //     });
    // }

    // function get_cart() {
    //     $.ajax({
    //         url: '<?= base_url('/api/user/cart') ?>',
    //         type: "GET",
    //         data: {
    //             user_id: user_id
    //         },
    //         beforeSend: function () { },
    //         success: function (resp) {
    //             console.log('error_Scan', resp);
    //             if (resp.status) {
    //                 let html = ``;
    //                 let subTotal = 0;
    //                 let totalDeliveryCharge = 0; // Initialize total delivery charge
    //                 $.each(resp.data, function (index, item) {
    //                     console.log('error_Scan1', item);

    //                     let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg';
    //                     if (item.product.product_img != "") {
    //                         product_image = `<?= base_url()?>${item.img_url}${item.product.product_img[0].src}`;
    //                     }

    //                     // Calculate original price and discounted price
    //                     var original_price = item.product.base_discount ?
    //                         (item.product.base_price - (item.product.base_price * (item.product.base_discount / 100))).toFixed(2) : item.product.base_price;
    //                     var discounted_price = item.product.base_discount ?
    //                         (item.product.base_price - (item.product.base_price * (item.product.base_discount / 100))).toFixed(2) : item.product.base_price;
                        
    //                     // Calculate total price for this item (discounted price * quantity)
    //                     subTotal += parseInt(discounted_price, 10) * parseInt(item.qty, 10);

    //                     // Calculate delivery charge for this item
    //                     let itemDeliveryCharge = item.product.delivery_charge ? item.product.delivery_charge : 0;
    //                     totalDeliveryCharge += parseInt(itemDeliveryCharge, 10);

    //                     // Calculate tax (if available in the response) or assume a fixed rate
    //                     let itemTax = item.product.tax ? item.product.tax : 0; // Replace with actual logic for tax calculation if needed

    //                     console.log('charge', item.product.delivery_charge);
    //                     console.log('tax', itemTax);

    //                     // Calculate total quantity based on the available stock for each size
    //                     let totalQuantity = 0;
    //                     if (item.product.product_sizes && Array.isArray(item.product.product_sizes)) {
    //                         for (let i = 0; i < item.product.product_sizes.length; i++) {
    //                             totalQuantity += parseInt(item.product.product_sizes[i].stocks,10);  // Sum up the stock from all sizes
    //                         }
    //                     }
    //                     console.log('quantity', totalQuantity);
                        

    //                     let truncatedDescription = truncateText(item.product.description, 15);
    //                     html += `<div class="cart-item">
    //                                 <div class="item-image" style="background-image: url('${product_image}');"></div>
    //                                 <div class="item-info">
    //                                     <h4>${item.product.name}</h4>
    //                                     <p>${truncatedDescription}</p>
    //                                     <div class="item-controls">
    //                                         <span>₹${item.product.base_price}</span>
    //                                         <div class="item-quantity">
    //                                             <button class="minus" onClick="updateCartItem('${item.cart_id}', '${item.qty == 1 ? 1 : parseInt(item.qty) - 1}', ${totalQuantity})">-</button>
    //                                             <input type="number" value="${item.qty}" min="1" readonly>
    //                                             <button class="plus" onClick="updateCartItem('${item.cart_id}', '${parseInt(item.qty) + 1}', ${totalQuantity})">+</button>
    //                                         </div>
    //                                     </div>
    //                                     <!-- Display discounted price, tax, and delivery charge -->
    //                                     <div class="item-details">
    //                                         <p>Discounted Price: ₹${discounted_price}</p>
    //                                         <p>Tax: ₹${itemTax}</p>
    //                                         <p>Delivery Charge: ₹${itemDeliveryCharge}</p>
    //                                     </div>
    //                                 </div>
    //                                 <button class="remove-item" onclick="remove_cart_item('${item.cart_id}')">×</button>
    //                             </div>`;
    //                 });

    //                 $('#cart_item').html(html);
    //                 $('.subtotal_amount').html(`₹${subTotal}`);
    //                 let grand_total = subTotal + totalDeliveryCharge; // Add delivery charge to the grand total

    //                 // Set the total delivery charge
    //                 if (totalDeliveryCharge > 0) {
    //                     $('#delivary_charge').html(`₹${totalDeliveryCharge}`);
    //                 } else {
    //                     $('#delivary_charge').html(`<p style="color: green;">Free</p>`);
    //                 }

    //                 // Checkout Button Logic
    //                 $('.checkout_button').html(`<p class="total-price">₹${grand_total} </p>
    //                                                 <a href="<?= base_url('billing')?>">
    //                                                 <button class="checkout">Checkout</button>
    //                                                 </a>`);
    //             } else {
    //                 $('#cart_item').html("");
    //                 $('.subtotal_amount').html(`₹0`);
    //                 $('.checkout_button').html(`<p class="total-price">₹0 </p>
    //                                                 <a href="javascript:void(0)" onclick="billing_icomplete()">
    //                                                 <button class="checkout btn_disabled">Checkout</button>
    //                                                 </a>`);
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err);
    //         }
    //     });
    // }
    function get_cart() {
        $.ajax({
            url: '<?= base_url('/api/user/cart') ?>',
            type: "GET",
            data: {
                user_id: user_id
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log('error_Scan', resp);
                if (resp.status) {
                    let html = ``;
                    let subTotal = 0;
                    let totalDeliveryCharge = 0; // Initialize total delivery charge
                    $.each(resp.data, function (index, item) {
                        console.log('error_Scan1', item);

                        let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg';
                        if (item.product.product_img != "") {
                            product_image = `<?= base_url()?>${item.img_url}${item.product.product_img[0].src}`;
                        }

                        // Calculate original price and discounted price
                        var original_price = item.product.base_discount ? 
                            (item.product.base_price - (item.product.base_price * (item.product.base_discount / 100))).toFixed(2) : item.product.base_price;
                        var discounted_price = item.product.base_discount ? 
                            (item.product.base_price - (item.product.base_price * (item.product.base_discount / 100))).toFixed(2) : item.product.base_price;

                        // Calculate total price for this item (discounted price * quantity)
                        subTotal += parseInt(discounted_price, 10) * parseInt(item.qty, 10);

                        // Calculate delivery charge for this item
                        let itemDeliveryCharge = item.product.delivery_charge ? item.product.delivery_charge : 0;
                        totalDeliveryCharge += parseInt(itemDeliveryCharge, 10);

                        // Calculate tax (if available in the response) or assume a fixed rate
                        let itemTax = item.product.tax ? item.product.tax : 0; // Replace with actual logic for tax calculation if needed

                        console.log('charge', item.product.delivery_charge);
                        console.log('tax', itemTax);

                        // Calculate total quantity based on the available stock for each size
                        let totalQuantity = 0;
                        if (item.product.product_sizes && Array.isArray(item.product.product_sizes)) {
                            for (let i = 0; i < item.product.product_sizes.length; i++) {
                                totalQuantity += parseInt(item.product.product_sizes[i].stocks, 10);  // Sum up the stock from all sizes
                            }
                        }
                        console.log('quantity', totalQuantity);

                        let truncatedDescription = truncateText(item.product.description, 15);
                        html += `<div class="cart-item">
                                    <div class="item-image" style="background-image: url('${product_image}');"></div>
                                    <div class="item-info">
                                        <h4>${item.product.name}</h4>
                                        <p>${truncatedDescription}</p>
                                        <div class="item-controls">
                                            <span>₹${item.product.base_price}</span>
                                            <div class="item-quantity">
                                                <button class="minus" onClick="updateCartItem('${item.cart_id}', '${item.qty == 1 ? 1 : parseInt(item.qty) - 1}', ${totalQuantity})">-</button>
                                                <input type="number" value="${item.qty}" min="1" readonly>
                                                <button class="plus" onClick="checkAndUpdateQuantity('${item.cart_id}', '${parseInt(item.qty) + 1}', ${totalQuantity})">+</button>
                                            </div>
                                        </div>
                                        <!-- Display discounted price, tax, and delivery charge -->
                                        <div class="item-details">
                                            <p>Discounted Price: ₹${discounted_price}</p>
                                            <p>Tax: ₹${itemTax}</p>
                                            <p>Delivery Charge: ₹${itemDeliveryCharge}</p>
                                        </div>
                                    </div>
                                    <button class="remove-item" onclick="remove_cart_item('${item.cart_id}')">×</button>
                                </div>`;
                    });

                    $('#cart_item').html(html);
                    $('.subtotal_amount').html(`₹${subTotal}`);
                    let grand_total = subTotal + totalDeliveryCharge; // Add delivery charge to the grand total

                    // Set the total delivery charge
                    if (totalDeliveryCharge > 0) {
                        $('#delivary_charge').html(`₹${totalDeliveryCharge}`);
                    } else {
                        $('#delivary_charge').html(`<p style="color: green;">Free</p>`);
                    }

                    // Checkout Button Logic
                    $('.checkout_button').html(`<p class="total-price">₹${grand_total} </p>
                                                    <a href="<?= base_url('billing')?>">
                                                    <button class="checkout">Checkout</button>
                                                    </a>`);
                } else {
                    $('#cart_item').html("");
                    $('.subtotal_amount').html(`₹0`);
                    $('.checkout_button').html(`<p class="total-price">₹0 </p>
                                                    <a href="javascript:void(0)" onclick="billing_icomplete()">
                                                    <button class="checkout btn_disabled">Checkout</button>
                                                    </a>`);
                }
            },
            error: function (err) {
                console.error(err);
            }
        });
    }

    // Function to check stock before updating quantity
    function checkAndUpdateQuantity(cartId, newQty, totalQuantity) {
        if (newQty > totalQuantity) {
            // Show toast message if the requested quantity exceeds the available stock
            Toastify({
                text: "Not enough stock, please decrease quantity",
                duration: 3000,
                backgroundColor: "red",
                close: true,
                position:"center"
            }).showToast();
        } else {
            // Proceed to update cart item if stock is sufficient
            updateCartItem(cartId, newQty, totalQuantity);
        }
    }

    // Function to update cart item (existing code)
    function updateCartItem(cartId, qty, totalQuantity) {
        $.ajax({
            url: '<?= base_url('/api/user/update_cart') ?>',
            type: "POST",
            data: {
                cart_id: cartId,
                qty: qty
            },
            success: function (response) {
                get_cart(); // Refresh the cart after updating
            },
            error: function (err) {
                console.error(err);
            }
        });
    }





    

    function truncateText(text, maxLength) {
        if (text.length > maxLength) {
            return text.substring(0, maxLength) + '...';
        } else {
            return text;
        }
    }

    function updateCartItem(cartId, qty, product_quantity) {
        console.log(cartId , qty, product_quantity)
        if(qty <= product_quantity){
            $.ajax({
                url: '<?= base_url('/api/user/cart/item/update') ?>',
                data: {
                    cart_id: cartId,
                    qty: qty
                },
                beforeSend: function () { },
                success: function (resp) { get_cart(); },
                error: function (err) { console.error(err) }
            })
        } else {
            Toastify({
                text: 'Stock Does not exist!'.toUpperCase(),
                duration: 3000,
                position: "center",
                stopOnFocus: true,
                style: {
                    background:'darkred',
                },
            }).showToast();
        }
        

    }

    let cart_item_id = ""
    function remove_cart_item(cart_id) {
        $('#removeItemModal').modal('show')
        cart_item_id = cart_id;
        // console.log(cart_item_id)
    }

    function delete_the_cart_item() {
        $.ajax({
            url: "<?= base_url('/api/user/cart/remove') ?>",
            type: "GET",
            data: { cart_id: cart_item_id },
            success: function (resp) {

                if (resp.status) {
                    // console.log(resp)
                    Toastify({
                        text: resp.message.toUpperCase(),
                        duration: 2000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background: resp.status ? 'gray' : 'darkred',
                        },

                    }).showToast();

                    cart_item_id = "";
                    $('#removeItemModal').modal('hide')
                } else {
                    Toastify({
                        text: resp.message.toUpperCase(),
                        duration: 2000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background: resp.status ? 'gray' : 'darkred',
                        },

                    }).showToast();
                    // console.log(resp)
                }
                get_cart_header()
                get_cart()

            },
            error: function (err) {
                console.log(err)
            },
        })


    }

    function billing_icomplete(){
        Toastify({
            text: 'Your Cart is empty!'.toUpperCase(),
            duration: 3000,
            position: "center",
            stopOnFocus: true,
            style: {
                background: 'darkred',
            },

        }).showToast();
    }
</script>