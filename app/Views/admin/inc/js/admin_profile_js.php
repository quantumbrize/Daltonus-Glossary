<script>
    $(document).ready(function() {
        let user_id = '<?= isset($_SESSION['ADMIN_user_id']) ? $_SESSION['ADMIN_user_id'] : $_SESSION['STAFF_user_id'] ?>'
        get_profile_section (user_id);
        get_social_link();
        get_notice_bar();

        $("#update_profile").click(function () {
            var user_id = $("#userId").val()
            var nameInput = $("#nameInput").val()
            var emailInput = $("#emailInput").val()
            var phonenumberInput = $("#phonenumberInput").val()

            if (nameInput == "") {
                $("#name_val").text("Please enter name!")
            } else {
                $("#name_val").text("")
            }
            if (emailInput == "") {
                $("#number_val").text("Please enter number!")
            } else {
                $("#number_val").text("")
            }
            if (phonenumberInput == "") {
                $("#email_val").text("Please enter email!")
            } else {
                $("#email_val").text("")
            }
            


            if (nameInput != "" && emailInput != "" && phonenumberInput != "") {
                // alert("hello")
                var formData = new FormData();

                formData.append('nameInput', nameInput);
                formData.append('emailInput', emailInput);
                formData.append('phonenumberInput', phonenumberInput);
                formData.append('user_id', user_id);
                $.ajax({
                    url: "<?= base_url('/api/update/admin') ?>",
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
                        var html = ``;
                        if (resp.status) {
                            // window.location.href = "<?= base_url('/user/account') ?>";
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            location.reload();
                        } else {
                            console.log(resp.status)
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
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
        });

        $("#change_password").click(function () {
            var user_id = $("#userId").val()
            var old_password = $("#oldpasswordInput").val()
            var new_password = $("#newpasswordInput").val()
            var confirm_password = $("#confirmpasswordInput").val()
            // alert(user_id)
            flag1 = true
            flag2 = true

            if (old_password == "") {
                $('#changeOldPass').text('Please enter old password.')
            } else {
                $('#changeOldPass').text('')
            }

            if (new_password == "") {
                $('#changeNewPass').text('Please enter new password.')
            } else if (new_password.length < 6) {
                $('#changeNewPass').text('New password must be 6 digits.')
                flag1 = false
            } else {
                $('#changeNewPass').text('')
            }

            if (confirm_password == "") {
                $('#changeConfirmPass').text('Please enter confirm password.')
            } else if (confirm_password != new_password) {
                $('#changeConfirmPass').text('Does not match with new password!')
                flag2 = false
            } else {
                $('#changeConfirmPass').text('')
            }



            if (old_password != "" && new_password != "" && confirm_password != "" && flag1 && flag2) {
                var formData = new FormData();

                formData.append('user_id', user_id);
                formData.append('old_password', old_password);
                formData.append('new_password', new_password);
                formData.append('confirm_password', confirm_password);

                $.ajax({
                    url: "<?= base_url('/api/change/admin/password') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#change_password').html(`<div class="spinner-border" role="status"></div>`)
                        $('#change_password').attr('disabled', true)

                    },
                    success: function (resp) {
                        console.log(resp)
                        var html = ``;
                        if (resp.status) {
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            $("#oldpasswordInput").val("")
                            $("#newpasswordInput").val("")
                            $("#confirmpasswordInput").val("")
                        } else {
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`

                        }
                        $('#alert').html(html)


                        console.log(resp)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                    complete: function () {
                        $('#change_password').html(`<i class="ri-edit-box-line align-middle me-2"></i> Change Password`)
                        $('#change_password').attr('disabled', false)
                    }
                })
            }

        })
        $("#update_social").click(function () {
            var uid = $("#uid").val()
            var facebook = $("#facebooklink").val()
            var twitter = $("#twitterlink").val()
            var instagram = $("#instagramlink").val()
            var youtube = $("#youtubelink").val()

            if (facebook == "") {
                $("#facebook_val").text("Please enter Link!")
            } else {
                $("#facebook_val").text("")
            }
            if (twitter == "") {
                $("#twitter_val").text("Please enter link!")
            } else {
                $("#twitter_val").text("")
            }
            if (instagram == "") {
                $("#instagram_val").text("Please enter link!")
            } else {
                $("#instagram_val").text("")
            }
            if (youtube == "") {
                $("#youtube_val").text("Please enter link!")
            } else {
                $("#youtube_val").text("")
            }
            


            if (facebook != "" && twitter != "" && instagram != "" && youtube != "") {
                // alert("hello")
                var formData = new FormData();

                formData.append('facebook', facebook);
                formData.append('twitter', twitter);
                formData.append('instagram', instagram);
                formData.append('youtube', youtube);
                formData.append('uid', uid);
                $.ajax({
                    url: "<?= base_url('/api/link/admin') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#update_social').html(`<div class="spinner-border" role="status"></div>`)
                        $('#update_social').attr('disabled', true)

                    },
                    success: function (resp) {
                        console.log('pro1',resp)
                        var html = ``;
                        if (resp.status) {
                            // window.location.href = "<?= base_url('/user/account') ?>";
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            location.reload();
                        } else {
                            console.log(resp.status)
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
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
        });
    
        $("#update_notice").click(function () 
        {
            var uid = $("#nuid").val()
            var notice = $("#notice_txt").val()
            

            if (notice == "") {
                $("#notice_txt").text("Please enter Notice!")
            } else {
                $("#notice_txt").text("")
            }
            
            


            if (notice != "") {
                // alert("hello")
                var formData = new FormData();

                formData.append('notice', notice);
                formData.append('uid', uid);
                // formData.append('twitter', twitter);
                // formData.append('instagram', instagram);
                // formData.append('youtube', youtube);
                // formData.append('uid', uid);
                $.ajax({
                    url: "<?= base_url('/api/notice/admin') ?>",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#update_notice').html(`<div class="spinner-border" role="status"></div>`)
                        $('#update_notice').attr('disabled', true)

                    },
                    success: function (resp) {
                        console.log('pro2',resp)
                        var html = ``;
                        if (resp.status) {
                            // window.location.href = "<?= base_url('/user/account') ?>";
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            location.reload();
                        } else {
                            console.log(resp.status)
                            html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        }


                        $('#alert').html(html)
                        console.log(resp)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                    complete: function () {
                        $('#update_notice').html(`<i class="ri-edit-box-line align-middle me-2"></i> Update Profile`)
                        $('#update_notice').attr('disabled', false)
                    }
                })
            }
        });
    });
    function get_profile_section(user_id){
        $.ajax({
            url: "<?= base_url('api/get/admin') ?>",
            type: "GET",
            data: {user_id:user_id},
            success: function (resp) {
                // resp = JSON.parse(resp)
                // console.log(resp.user_data.number)
                if (resp.status) {
                    console.log(resp)
                    var user_img = `<?= base_url() ?>public/assets_admin/images/users/avatar-1.jpg`
                    if(resp.user_data.type == 'staff'){
                        var user_img = `<?= base_url() ?>public/uploads/user_images/${resp.user_image.img}`
                    }

                    $('#profile_image').html(`<img src="${user_img}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">`)
                    $('#nameInput').val(resp.user_data.user_name)
                    $('#emailInput').val(resp.user_data.email)
                    $('#phonenumberInput').val(resp.user_data.number)
                    $('#userId').val(resp.user_data.uid)
                    $('#user_name').text(resp.user_data.user_name)
                    $('#user_role').text(resp.user_data.type)
                    // var image_url = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
                   
                } else {
                    console.log(resp)
                }
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function get_social_link(){
        $.ajax({
            url: "<?= base_url('api/get/social') ?>",
            type: "GET",
            data: {},
            success: function (resp) {
                // resp = JSON.parse(resp)
                // console.log(resp.user_data.number)
                if (resp.status) {
                    console.log('pro',resp);
                   

                    // $('#profile_image').html(`<img src="${user_img}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">`)
                    $('#facebooklink').val(resp.user_data.facebook)
                    $('#twitterlink').val(resp.user_data.twitter)
                    $('#instagramlink').val(resp.user_data.instagram)
                    $('#youtubelink').val(resp.user_data.youtube)
                    $('#uid').val(resp.user_data.uid)
                    // $('#user_name').text(resp.user_data.user_name)
                    // $('#user_role').text(resp.user_data.type)
                    // var image_url = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
                   
                } else {
                    console.log('err',resp)
                }
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function get_notice_bar(){
        $.ajax({
            url: "<?= base_url('api/get/notice') ?>",
            type: "GET",
            data: {},
            success: function (resp) {
                // resp = JSON.parse(resp)
                // console.log(resp.user_data.number)
                if (resp.status) {
                    console.log('not',resp);
                   

                    // $('#profile_image').html(`<img src="${user_img}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">`)
                    $('#notice_txt').val(resp.user_data.notice)
                    $('#nuid').val(resp.user_data.uid)
                    // $('#twitterlink').val(resp.user_data.twitter)
                    // $('#instagramlink').val(resp.user_data.instagram)
                    // $('#youtubelink').val(resp.user_data.youtube)
                    // $('#uid').val(resp.user_data.uid)
                    // $('#user_name').text(resp.user_data.user_name)
                    // $('#user_role').text(resp.user_data.type)
                    // var image_url = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
                   
                } else {
                    console.log('err',resp)
                }
            },
            error: function (err) {
                console.log(err)
            }
        })
    }
</script>