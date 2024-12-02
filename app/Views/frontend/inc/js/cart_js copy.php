<script>
    
    user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'
    // console.log(user_id)
    get_cart()
    function get_cart() {
        $.ajax({
            url: '<?= base_url('/api/user/cart') ?>',
            type: "GET",
            data: {
                user_id: user_id
            },
            beforeSend: function () { },
            success: function (resp) {
                // alert('hello')
                console.log('error_Scan',resp)
                if (resp.status) {
                    let html = ``
                    let subTotal = 0
                    $.each(resp.data, function(index, item) {
                        let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg'
                            if(item.product.product_img != ""){
                                product_image = `<?= base_url()?>${item.img_url}${item.product.product_img[0].src}`
                            }
                        // let truncatedDescription = ''
                        var original_price = item.product.base_discount ? (item.product.base_price - (item.product.base_price * (item.product.base_discount / 100))).toFixed(2) : item.product.base_price;
                        var base_price = item.product.base_discount ? item.product.base_discount : "";
                        subTotal += parseInt(original_price, 10) * parseInt(item.qty, 10)
                        console.log(subTotal)
                        let truncatedDescription = truncateText(item.product.description, 150);
                        html += `<div class="cart-item">
                                    <div class="item-image" style="background-image: url('${product_image}');"></div>
                                    <div class="item-info">
                                        <h4>${item.product.name}</h4>
                                        <p>${truncatedDescription}</p>
                                        <div class="item-controls">
                                            <span>₹${original_price}</span>
                                            <div class="item-quantity">
                                                <button class="minus"  onClick="updateCartItem('${item.cart_id}', '${item.qty == 1 ? 1 : parseInt(item.qty) - 1}', ${item.product.quantity})">-</button>
                                                <input type="number" value="${item.qty}" min="1" readonly>
                                                <button class="plus" onClick="updateCartItem('${item.cart_id}', '${parseInt(item.qty) + 1}', ${item.product.quantity})">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="remove-item" onclick="remove_cart_item('${item.cart_id}')">×</button>
                                </div>`
                    })
                    $('#cart_item').html(html)
                    $('.subtotal_amount').html(`₹`+subTotal)
                    let grand_total = subTotal
                    $.ajax({
                        url: "<?= base_url('/api/taxes') ?>",
                        type: "GET",
                        success: function (response) {
                            if (response.status) {
                                console.log(response);
                                if (response.data.tax != '0' && response.data.tax != null && response.data.tax != "") {
                                    $('#tax_fee').html(`₹` + response.data.tax);
                                    grand_total +=  parseInt(response.data.tax, 10);
                                } else {
                                    $('#tax_fee').html(`<p style="color: green;">Free</p>`);
                                }

                                if (response.data.delivary_charge != '0' && response.data.delivary_charge != null && response.data.delivary_charge != "") {
                                    $('#delivary_charge').html(`₹` + response.data.delivary_charge);
                                    grand_total +=  parseInt(response.data.delivary_charge, 10);
                                } else {
                                    $('#delivary_charge').html(`<p style="color: green;">Free</p>`);
                                }
                                $('.checkout_button').html(`<p class="total-price">₹${grand_total} </p>
                                                <a href="<?= base_url('billing')?>">
                                                <button class="checkout">Checkout</button>
                                                </a>`)
                            } else {
                                console.log(response);
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        },
                    });

                    

                    // total_cart_item = resp.data.length
                    
                    // $('#total_cart_items').html(total_cart_item)
                    // console.log(total_cart_item)
                }else{
                    $('#cart_item').html("")
                    $('.subtotal_amount').html(`₹`+ 0)
                    $('.checkout_button').html(`<p class="total-price">₹0 </p>
                                                <a href="javascript:void(0)" onclick="billing_icomplete()">
                                                <button class="checkout btn_disabled">Checkout</button>
                                                </a>`)
                }

            },
            error: function (err) {
                console.error(err)
            }
        })
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