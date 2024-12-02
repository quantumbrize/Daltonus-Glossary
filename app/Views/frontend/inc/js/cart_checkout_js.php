<script>
    let user_id = '<?= isset($_SESSION['USER_user_id']) ? $_SESSION['USER_user_id'] : '' ?>'


    if (user_id != '') {
        get_user();
        get_cart();
    }



    $("#update_profile").click(function () {
            var name = $("#billinginfo-name").val()
            var number = $("#billinginfo-phone").val()
            var email = $("#billinginfo-email").val()

            var city = $("#billinginfo-city").val()
            var country = $("#billinginfo-country").val()
            var zip = $("#billinginfo-zip").val()
            var district = $("#billinginfo-district").val()
            var state = $("#billinginfo-state").val()
            var locality = $("#billinginfo-locality").val()

            if (name == "") {
                $("#name_val").text("Please enter name!")
            } else {
                $("#name_val").text("")
            }
            if (email == "") {
                $("#email_val").text("Please enter email!")
            } else {
                $("#email_val").text("")
            }
            if (number == "") {
                $("#number_val").text("Please enter number!")
            } else {
                $("#number_val").text("")
            }
            if (city == "") {
                $("#city_val").text("Please enter city!")
            } else {
                $("#city_val").text("")
            }
            if (country == "") {
                $("#country_val").text("Please enter country!")
            } else {
                $("#country_val").text("")
            }
            if (zip == "") {
                $("#zip_val").text("Please enter postal code!")
            } else {
                $("#zip_val").text("")
            }
            if (district == "") {
                $("#district_val").text("Please enter street address!")
            } else {
                $("#district_val").text("")
            }
            if (state == "") {
                $("#state_val").text("Please enter state!")
            } else {
                $("#state_val").text("")
            }
            if (locality == "") {
                $("#locality_val").text("Please enter landmark!")
            } else {
                $("#locality_val").text("")
            }

            if (name != "" && number != "" && email != "" && city != "" && country != "" && zip != "" && district != "" && state != "" && locality != "") {
                // alert("hello")
                var formData = new FormData();

                formData.append('name', name);
                formData.append('number', number);
                formData.append('email', email);
                formData.append('city', city);
                formData.append('country', country);
                formData.append('zip', zip);
                formData.append('district', district);
                formData.append('state', state);
                formData.append('locality', locality);
                formData.append('user_id', user_id);
                $.ajax({
                    url: "<?= base_url('/api/user/update') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#update_profile').html(`<div class="spinner-border" role="status"></div>`)
                        $('#update_profile').attr('disabled', true)

                    },
                    success: function (resp) {
                        console.log(resp)

                        if (resp.status) {
                            // window.location.href = "<?= base_url('/user/account') ?>";
                            Toastify({
                                text: resp.message.toUpperCase(),
                                duration: 3000,
                                position: "center",
                                stopOnFocus: true,
                                style: {
                                    background: resp.status ? 'darkgreen' : 'darkred',
                                },

                            }).showToast();
                            get_user();
                        } else {
                            console.log(resp.status)
                            Toastify({
                                text: resp.message.toUpperCase(),
                                duration: 3000,
                                position: "center",
                                stopOnFocus: true,
                                style: {
                                    background: resp.status ? 'darkgreen' : 'darkred',
                                },

                            }).showToast();
                        }


                        $('#alert').html(html)
                        console.log(resp)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                    complete: function () {
                        $('#update_profile').html(`<i class="ri-edit-box-line align-middle me-2"></i> Update Address`)
                        $('#update_profile').attr('disabled', false)
                    }
                })
            }
        });



































    let user_data = {};
    let user_cart = {};
    let payment_data = { method: 'cod' }

    $('#place_order_btn').on('click', function () {

        user_data.name = $('#billinginfo-name').val()
        user_data.email = $('#billinginfo-email').val()
        user_data.number = $('#billinginfo-phone').val()
        $.ajax({
            url: '<?= base_url('/api/order/confirm') ?>',
            type: "POST",
            contentType: 'application/json',
            data: JSON.stringify({
                user_data: user_data,
                user_cart: user_cart,
                payment_data: payment_data
            }),
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    let order_id = resp.data.order_id
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
                            background: resp.status ? 'darkgreen' : 'darkred',
                        },
                    }).showToast();
                }
            },
            error: function (err) {
                console.error(err)
            }
        })
    })




    $('#pills-bill-info-tab').on('click', function () {
        $('#pills-bill-address-tab').removeClass('done')
    })
    $('#pills-bill-address-tab').on('click', function () {
        $('#pills-bill-info-tab').addClass('done')
        $('#pills-bill-address-tab').addClass('active')
    })

    $('#pills-payment-tab').on('click', function () {
        $('#pills-bill-info-tab').addClass('done')
        $('#pills-bill-address-tab').addClass('done')
        $('#pills-payment-tab').addClass('active')
    })



    $('#personal_info_btn').on('click', function () {
        $('#pills-bill-info-tab').addClass('done')
        $('#pills-bill-info-tab').removeClass('active')
        $('#pills-bill-info').removeClass('active')
        $('#pills-bill-info').removeClass('show')

        $('#pills-bill-address').addClass('active')
        $('#pills-bill-address').addClass('show')
        $('#pills-bill-address-tab').addClass('active')
    })

    $('#payment_info_btn').on('click', function () {
        $('#pills-bill-address-tab').addClass('done')
        $('#pills-bill-address-tab').removeClass('active')
        $('#pills-bill-address').removeClass('active')
        $('#pills-bill-address').removeClass('show')

        $('#pills-payment').addClass('active')
        $('#pills-payment').addClass('show')
        $('#pills-payment-tab').addClass('active')
    })


    function get_cart() {


        $.ajax({
            url: '<?= base_url('/api/user/cart') ?>',
            type: "GET",
            data: {
                'user_id': user_id
            },
            beforeSend: function () { },
            success: function (resp) {
                let subTotal = 0
                let discountPercentage = 0
                let total = 0
                let discount_amount = 0
                console.log(resp)
                if (resp.status) {
                    let html = ``
                    user_cart.cart = resp.data
                    let total_discount = 0
                    $.each(resp.data, function (index, item) {
                        subTotal += calculateFinalPrice(item.product.base_price, item.product.base_discount) * item.qty
                        html += ` <tr>
                                        <td>
                                            <div class="avatar-md bg-light rounded p-1">
                                                <img 
                                                    src="<?= base_url() ?>${item.img_url}${item.product.product_img[0].src}" 
                                                    alt=""
                                                    class="img-fluid d-block">
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="fs-14"><a href="<?= base_url('/product/details?id=') ?>${item.product.product_id}"
                                                    class="text-body">${item.product.name}</a></h5>
                                            <p class="text-muted mb-0">₹${calculateFinalPrice(item.product.base_price, item.product.base_discount).toFixed(2)} x ${item.qty}</p>
                                        </td>
                                        <td>
                                            
                                            <p class="text-muted mb-0">${item.size}</p>
                                        </td>
                                        <td class="text-end">₹${(calculateFinalPrice(item.product.base_price, item.product.base_discount) * item.qty).toFixed(2)}</td>
                                    </tr>`

                                    total_discount += parseInt(item.product.base_discount, 10);
                    })

                    $.ajax({
                        url: '<?= base_url('/api/discounts') ?>',
                        type: 'GET',
                        beforeSend: function () { },
                        success: function (resp) {
                            let discount = [];
                            if (resp.status) {
                                discounts = resp.data
                                let disc = []
                                if (discounts.length > 0) {
                                    $.each(discounts, function (index, item) {
                                        if (item.minimum_purchase <= subTotal) {
                                            disc[index] = item
                                        }
                                    })
                                }
                                discount = disc[disc.length - 1]
                            } else {
                                discount = null
                            }
                            discount = discount != null ? discount : { "discount_percentage": 0, "minimum_purchase": 0 }
                            discountPercentage = discount.discount_percentage
                            discount_amount = get_discounts_amount(subTotal, discount.discount_percentage).toFixed(2)
                            total = (subTotal - discount_amount).toFixed(2);

                            user_cart.total = total
                            user_cart.discountPercentage = discountPercentage
                            user_cart.discountAmount = discount_amount
                            user_cart.subTotal = subTotal
                            html += ` <tr>
                                    <td class="fw-semibold" colspan="3">Sub Total :</td>
                                    <td class="fw-semibold fs-14 text-end">₹${subTotal.toFixed(2)}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Discount : </td>
                                    <td class="text-end fs-14">${total_discount}%</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Shipping Charge :</td>
                                    <td class="text-end fs-14">free</td>
                                </tr>
                                <tr class="table-active">
                                    <th colspan="3">Total (INR) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold fs-14">
                                            ₹${total}
                                        </span>
                                    </td>
                                </tr>`
                            $('#product_con').html(html)
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    })
                }

            },
            error: function (err) {
                console.error(err)
            }
        })
    }



    function get_user() {
        $.ajax({
            url: '<?= base_url('/api/user') ?>',
            type: "GET",
            beforeSend: function () {

            },
            success: function (resp) {
                console.log(resp)
                if (resp.status == true) {
                    user_data.address = resp.address
                    user_data.allAddress = resp.all_address
                    user_data.user = resp.user_data
                    user_data.user_img = resp.user_img

                    // user
                    $('#billinginfo-name').val(resp.user_data.user_name)
                    $('#billinginfo-email').val(resp.user_data.email)
                    $('#billinginfo-phone').val(resp.user_data.number)
                    // address
                    $('#billinginfo-country').val(resp.address.country)
                    $('#billinginfo-state').val(resp.address.state)
                    $('#billinginfo-district').val(resp.address.district)
                    $('#billinginfo-city').val(resp.address.city)
                    $('#billinginfo-locality').val(resp.address.locality)
                    $('#billinginfo-zip').val(resp.address.zipcode)
                    // shipping
                    $('#addr_name').html(resp.user_data.user_name)
                    $('#addr_locality').html(resp.address.locality)
                    $('#addr_city').html(resp.address.city)
                    $('#addr_dist').html(resp.address.district)
                    $('#addr_state').html(resp.address.state)
                    $('#addr_contry').html(resp.address.country)
                    $('#addr_phone').html(resp.user_data.number)
                    // $('#update_button').html(`<button type="button" class="btn btn-success right ms-auto "
                    //                        id="update_profile">
                    //                         Update Address
                    //                     </button>`)
                }
            },
            error: function (err) {
                console.error(err)
            }
        })
    }


</script>