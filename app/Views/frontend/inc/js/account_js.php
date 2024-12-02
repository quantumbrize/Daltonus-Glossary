<script>
    $(document).ready(function () {
        // alert("hello")
        get_user_data();
    })

    function get_user_data() {
        $.ajax({
            url: "<?= base_url('api/user') ?>",
            type: "GET",
            success: function (resp) {
                // resp = JSON.parse(resp)
                console.log(resp.user_data)
                if (resp.status == true) {
                    // console.log(resp)



                    $(".profile-name").text(resp.user_data.user_name != '' ? resp.user_data.user_name : 'Update your name');
                    // $("#user_id").val(resp.user_id)
                    $(".profile-email").text(resp.user_data.email != '' ? resp.user_data.email : 'Update email')

                    if (resp.user_img != null) {
                        $(".profile-pic").attr("src", "<?= base_url('public/uploads/user_images/') ?>" + resp.user_img.img);
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
                $('#userImage').append(`<img src="${e.target.result}" height="100" id="user_img"/>`);
            };

            reader.readAsDataURL(files[i]);
        }
    });

    function logout() {;
        $.ajax({
            url: "<?= base_url('logout') ?>",
            type: "GET",
            success: function (resp) {
                window.location.href = '<?= base_url('login')?>';
            },
            error: function () {
            }
        })
    }



</script>