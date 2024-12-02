<script>
    user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'
    // console.log(user_id)
    get_cart()
    let grand_total = ''

    function get_cart() {
        $.ajax({
            url: '<?= base_url('/api/user/cart') ?>',
            type: "GET",
            data: {
                user_id: user_id
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp);
                if (resp.status) {
                    let subTotal = 0;
                    let totalDeliveryCharge = 0; // Initialize total delivery charge

                    // Loop through cart items and calculate subtotal and delivery fees
                    $.each(resp.data, function (index, item) {
                        // Calculate the discounted price for each item
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
                    $('#payment_btn_mob').html(`
                        <p class="total-price">₹${grand_total}</p>
                        <button class="checkout mobile-checkout-btn" type="button" onclick="window.location.href='<?= base_url() ?>payment'">Payment</button>
                    `);
                    $('#payment_btn').html(`
                        <p class="total-price">₹${grand_total}</p>
                        <button class="checkout desktop-checkout-btn" type="button" onclick="window.location.href='<?= base_url() ?>payment'">Payment</button>
                    `);

                    // Check if user data is complete to enable the payment button
                    get_user_data();
                } else {
                    console.log("Cart is empty or error in response.");
                }
            },
            error: function (err) {
                console.error("Error fetching cart data:", err);
            }
        });
    }

    let address_will = 'insert';

    function get_user_data() {
        $.ajax({
            url: "<?= base_url('api/user') ?>",
            type: "GET",
            success: function (resp) {
                console.log(resp);
                if (resp.status == true) {
                    $('#full-name').val(resp.user_data.user_name);
                    $('#mobile-number').val(resp.user_data.number);
                    $('#email').val(resp.user_data.email);

                    if (resp.address != null && resp.address != "") {
                        // Populate address fields
                        $('#city').val(resp.address.city);
                        $('#country').val(resp.address.country);
                        $('#zip-code').val(resp.address.zipcode);
                        $('#district').val(resp.address.district);
                        $('#state').val(resp.address.state);
                        $('#locality').val(resp.address.locality);
                        address_will = 'update';

                        // Enable payment button if all fields are filled
                        if (resp.user_data.user_name != "" && resp.user_data.number != "" && resp.user_data.email != "" &&
                            resp.address.city != "" && resp.address.country != "" && resp.address.zipcode != "" &&
                            resp.address.district != "" && resp.address.state != "" && resp.address.locality != "") {
                            
                            $('#payment_btn_mob').html(`
                                <p class="total-price">₹ ${grand_total}</p>
                                <button class="checkout mobile-checkout-btn" type="button" onclick="window.location.href='<?= base_url() ?>payment'">Payment</button>
                            `);
                            $('#payment_btn').html(`
                                <p class="total-price">₹ ${grand_total}</p>
                                <button class="checkout desktop-checkout-btn" type="button" onclick="window.location.href='<?= base_url() ?>payment'">Payment</button>
                            `);
                        } else {
                            // Disable payment button if any address or user info is missing
                            $('#payment_btn_mob').html(`
                                <p class="total-price">₹ ${grand_total}</p>
                                <button class="checkout mobile-checkout-btn btn_disabled" type="button" onclick="billing_icomplete()">Payment</button>
                            `);
                            $('#payment_btn').html(`
                                <p class="total-price">₹ ${grand_total}</p>
                                <button class="checkout desktop-checkout-btn btn_disabled" type="button" onclick="billing_icomplete()">Payment</button>
                            `);
                        }
                    } else {
                        // Disable payment button if no address is available
                        $('#payment_btn_mob').html(`
                            <p class="total-price">₹ ${grand_total}</p>
                            <button class="checkout mobile-checkout-btn btn_disabled" type="button" onclick="billing_icomplete()">Payment</button>
                        `);
                        $('#payment_btn').html(`
                            <p class="total-price">₹ ${grand_total}</p>
                            <button class="checkout desktop-checkout-btn btn_disabled" type="button" onclick="billing_icomplete()">Payment</button>
                        `);
                    }
                } else {
                    console.log(resp.message);
                }
            },
            error: function () {
                console.error("Error fetching user data.");
            }
        });
    }


    function update_billing_address() {
        var name = $("#full-name").val()
        var number = $("#mobile-number").val()
        var email = $("#email").val()

        var city = $("#city").val()
        var country = $("#country").val()
        var zip = $("#zip-code").val()
        var district = $("#district").val()
        var state = $("#state").val()
        var locality = $("#locality").val()

        if (name == "") {
            $("#name_val").text("Please enter name!")
        } else {
            $("#name_val").text("")
        }
        if (number == "") {
            $("#number_val").text("Please enter number!")
        } else {
            $("#number_val").text("")
        }
        if (email == "") {
            $("#email_val").text("Please enter email!")
        } else {
            $("#email_val").text("")
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
            $("#zip_val").text("Please enter zip-code!")
        } else {
            $("#zip_val").text("")
        }

        if (district == "") {
            $("#district_val").text("Please enter district!")
        } else {
            $("#district_val").text("")
        }
        if (state == "") {
            $("#state_val").text("Please enter state!")
        } else {
            $("#state_val").text("")
        }

        if (locality == "") {
            $("#locality_val").text("Please enter locality!")
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
            formData.append('address_will', address_will);
            console.log(formData.get('name'));

            $.ajax({
                url: "<?= base_url('/api/user/billing-address/update') ?>",
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
                        Toastify({
                            text: resp.message.toUpperCase(),
                            duration: 3000,
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: resp.status ? 'darkgreen' : 'darkred',
                            },

                        }).showToast();
                        get_user_data();
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
                    $('#update_profile').html(`<i class="ri-edit-box-line align-middle me-2"></i> Update Profile`)
                    $('#update_profile').attr('disabled', false)
                }
            })
        }
    }

    function billing_icomplete(){
        Toastify({
            text: 'Complete your billing details'.toUpperCase(),
            duration: 3000,
            position: "center",
            stopOnFocus: true,
            style: {
                background: 'darkred',
            },

        }).showToast();
    }


</script>