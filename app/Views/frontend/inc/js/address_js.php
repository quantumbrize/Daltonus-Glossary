<script>
    user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'
    
    get_user_data()
    let address_will = 'insert'
    function get_user_data() {
        $.ajax({
            url: "<?= base_url('api/user') ?>",
            type: "GET",
            success: function (resp) {
                console.log(resp)
                if (resp.status == true) {
                    
                    // $('#full-name').val(resp.user_data.user_name)
                    // $('#mobile-number').val(resp.user_data.number)
                    // $('#email').val(resp.user_data.email)
                    if(resp.address != null && resp.address != ""){
                        $('#city').val(resp.address.city)
                        $('#country').val(resp.address.country)
                        $('#zip-code').val(resp.address.zipcode)
                        $('#district').val(resp.address.district)
                        $('#state').val(resp.address.state)
                        $('#locality').val(resp.address.locality)
                        address_will = 'update'
                    }
                } else {
                    console.log(resp.message)
                }
            },
            error: function () {
            }
        })
    }

    function update_billing_address() {
        // var name = $("#full-name").val()
        // var number = $("#mobile-number").val()
        // var email = $("#email").val()

        var city = $("#city").val()
        var country = $("#country").val()
        var zip = $("#zip-code").val()
        var district = $("#district").val()
        var state = $("#state").val()
        var locality = $("#locality").val()

        // if (name == "") {
        //     $("#name_val").text("Please enter name!")
        // } else {
        //     $("#name_val").text("")
        // }
        // if (number == "") {
        //     $("#number_val").text("Please enter number!")
        // } else {
        //     $("#number_val").text("")
        // }
        // if (email == "") {
        //     $("#email_val").text("Please enter email!")
        // } else {
        //     $("#email_val").text("")
        // }

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

        if (city != "" && country != "" && zip != "" && district != "" && state != "" && locality != "") {
            // alert("hello")
            var formData = new FormData();

            // formData.append('name', name);
            // formData.append('number', number);
            // formData.append('email', email);
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
                url: "<?= base_url('/api/user/address/update') ?>",
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


                    // $('#alert').html(html)
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


</script>