<script>
    $(document).ready(function () {
        // alert("hello")
        get_user_data();

        $("#confirmButton").click(function () {
            var user_id = $("#user_id").val()
            var name = $("#fullName").val()
            var number = $("#mobileNumber").val()
            var email = $("#email").val()

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

            if (name != "" && number != "" && email != "") {
                // alert("hello")
                var formData = new FormData();

                formData.append('name', name);
                formData.append('number', number);
                formData.append('email', email);
                formData.append('user_id', user_id);
                console.log(formData.get('name'));

                $.each($('#user_img_input')[0].files, function (index, file) {
                    formData.append('images[]', file);
                });
                $.ajax({
                    url: "<?= base_url('/api/user/update') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#confirmButton').html(`<div class="spinner-border" role="status"></div>`)
                        $('#confirmButton').attr('disabled', true)

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
                        $('#confirmButton').html(`Confirm`)
                        $('#confirmButton').attr('disabled', false)
                    }
                })
            }
        });
    })

    function get_user_data() {
        $.ajax({
            url: "<?= base_url('api/user') ?>",
            type: "GET",
            success: function (resp) {
                // resp = JSON.parse(resp)
                console.log(resp.user_data)
                if (resp.status == true) {
                    console.log(resp)



                    $("#fullName").val(resp.user_data.user_name)
                    $("#mobileNumber").val(resp.user_data.number)
                    $("#email").val(resp.user_data.email)
                    $("#user_id").val(resp.user_id)

                    if (resp.user_img != null) {
                        $("#userImage").html(`<img src="<?= base_url('public/uploads/user_images/') ?>${resp.user_img.img}" alt="Profile Picture">`);
                    }

                    var dateParts = resp.user_data.created_at.split(" ")[0].split("-");
                    var year = dateParts[0];
                    var month = dateParts[1];
                    var day = dateParts[2];
                    var formattedDate = day + "/" + month + "/" + year;
                    $("#customer_since_member").text(formattedDate)



                } else {
                    console.log(resp.message)
                }
            },
            error: function () {
            }
        })
    }

    $(document).on('change', 'input[name="user_img[]"]', function (e) {
        console.log(1)
        var files = e.target.files;
        $('#userImage').html(''); // Clear existing previews

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#userImage').append(`<img src="${e.target.result}" alt="Profile Picture"/>`);
            };

            reader.readAsDataURL(files[i]);
        }
    });



</script>