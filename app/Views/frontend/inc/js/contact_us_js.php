<script>
     $(document).ready(function () {
        $("#getInTouchSubmit").click(function(){
            // alert("hello")
            var name = $("#nameInput").val()
            var email = $("#emailInput").val()
            var phone = $("#phoneInput").val()
            var subject = $("#subjectInput").val()
            var message = $("#messageInput").val()
            flag1 = true
            flag2 = true
            var re = /\S+@\S+\.\S+/;
            valid_email = re.test(email);

            // alert(valid_email)
            if(name == ""){
                $('#nameInput_val').text('Please enter your name.')
            }else{
                $('#nameInput_val').text('')
            }
            if(email == ""){
                $('#emailInput_val').text('Please enter email.')
            }else if(!valid_email){
                $('#emailInput_val').text('Please enter valid email.')
            }else{
                $('#emailInput_val').text('')
            }
            if(phone == ""){
                $('#phoneInput_val').text('Please enter phone no..')
            }else{
                $('#phoneInput_val').text('')
            }
            if(subject == ""){
                $('#subjectInput_val').text('Please enter a subject.')
            }else{
                $('#subjectInput_val').text('')
            }
            if(message == ""){
                $('#messageInput_val').text('Please enter a message.')
            }else{
                $('#messageInput_val').text('')
            }

            if(name != "" && email != "" && phone != "" && subject != "" && message != "" && valid_email){
                var formData = new FormData();

                formData.append('name', name);
                formData.append('email', email);
                formData.append('phone', phone);
                formData.append('subject', subject);
                formData.append('message', message);

                    $.ajax({
                        url: "<?= base_url('/api/message') ?>",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#getInTouchSubmit').html(`<div class="spinner-border" role="status"></div>`)
                            $('#getInTouchSubmit').attr('disabled', true)

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
                                $("#nameInput").val("")
                                $("#emailInput").val("")
                                $("#phoneInput").val("")
                                $("#subjectInput").val("")
                                $("#messageInput").val("")
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
                            console.log(resp)
                        },
                        error: function (err) {
                            console.log(err)
                        },
                        complete: function () {
                            $('#getInTouchSubmit').html(`Send Message <i class="bi bi-arrow-right-short align-middle fs-16 ms-1"></i>`)
                            $('#getInTouchSubmit').attr('disabled', false)
                        }
                    })
            }

        })
    })

        $.ajax({
            url: "<?= base_url('/api/about') ?>",
            type: "GET",
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                $('#address').text(resp.data.address)
                $('#phone1').text(resp.data.phone1)
                $('#phone2').text(resp.data.phone2)
                $('#fax').text('hbkjhkxjvhbkvjhbzkjvbzjb')
                $('#about_email').text(resp.data.email)
                $('#daltonus_store_map').attr('src', resp.data.map);
                
                
                }else{
                    console.log(resp)
                }
            },
            error: function (err) {
                console.log(err)
            },
        })
    
</script>