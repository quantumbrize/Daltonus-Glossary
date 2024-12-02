<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Zettkart" />
    <meta name="keywords" content="Zettkart" />
    <meta name="author" content="Zettkart" />
    <link rel="manifest" href="<?=base_url()?>public/manifest.json" />

    <link
      rel="icon"
      href="<?=base_url()?>public/assets/images/logo/favicon.png"
      type="image/x-icon"
    />
    <title>Daltonus Glossary</title>
    <link rel="apple-touch-icon" href="<?=base_url()?>public/assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#ff8d2f" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Zettkart" />
    <meta
      name="msapplication-TileImage"
      content="<?=base_url()?>public/assets/images/logo/favicon.png"
    />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

   <!-- CUSTOM CSS- -->
    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/style.css" />
    <!-- Otp verification css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Otp_verification.css" />
    <!-- Authentication bg css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Authentication_bg_style.css" />
  </head>
<style>
    #alert {
        position: fixed;
        top: 10px;
        z-index: 1000;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        left: 0px;
    }
    #confirm-button {
    width: 200px;
    padding: 8px 13px;
    background-color: #f58d1d;
    border: none;
    border-radius: 8px;
    box-shadow: 0px 4px 4px 0px #00000040;
    cursor: pointer;
    margin: 0 auto;
    border: 1px solid #f58d1d;
  
    color: white;
    font-size: 18px;
    font-weight: 500;
    line-height: 27px;
  }
  
  #confirm-button:hover {
    background-color: #fff;
    color: #f58d1d;
    border: 1px solid #f58d1d;
  }

  #confirm-button {
    font-size: 20px;
    /* padding: 18px; */
  }
</style>
  <body>
    <div class="container">
        <!-- bg-style -->
        <div class="form-style-circle-right"></div>
        <div class="form-style-circle-left1"></div>
        <div class="form-style-circle-left2"></div>
        <!-- form section -->
        <div id="alert"></div>
        <div class="form-container">
            <a href="Registration.html">
                <button class="back-button">‹</button>
            </a>
            <h1 class="registration-title">Verification Code</h1>
            <p>Please type the verification code sent to  <br/> <strong>example@gmail.com</strong></p>
            <div class="input-container">
                <div class="otp-inputs">
                    <input type="text" maxlength="1" id="otp-1">
                    <input type="text" maxlength="1" id="otp-2">
                    <input type="text" maxlength="1" id="otp-3">
                    <input type="text" maxlength="1" id="otp-4">
                </div>
                
            </div>
            <div class="btn-wrapper">
                <a href="javascript:void(0)">
                    <button id="confirm-button" onclick="login()">Verify</button>
                </a>
            </div>
            <div class="resend-wrap">
                <p class="resend-text">I don’t receive a code! <a href="#" class="resend-link">Please resend</a></p>
            </div>
        </div>
    </div>



    <!-- Custom script -->
    <script src="<?=base_url()?>public/assets/js/Pages_custom_JS/otp_verification_script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {
            // $('#resend_btn').on('click', function () {
            //     $.ajax({
            //         url: '<?= base_url('resend-otp') ?>',
            //         method: 'GET',
            //         data: {
            //             user_id: '<?= $_GET['user_id'] ?>',
            //         },
            //         success: function (resp) {
            //             resp = JSON.parse(resp)
            //             if (resp.status == true) {
            //                 $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
            //                                             <i class="ri-mail-send-fill label-icon"></i><strong>OTP send</strong>
            //                                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //                                         </div>`)
            //             }
            //         },
            //         error: function () {
            //             $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
            //                                         <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Srver Error
            //                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //                                     </div>`)
            //         }

            //     })


            // })

            $('#confirm-button').on('click', function () {

                let otp1 = $('#otp-1').val()
                let otp2 = $('#otp-2').val()
                let otp3 = $('#otp-3').val()
                let otp4 = $('#otp-4').val()

                let otp = otp1 + otp2 + otp3 + otp4
               

                if (otp.length < 4) {
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Enter A Valid Otp
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`)
                } else {
                    console.log(otp);
                    $.ajax({
                        url: '<?= base_url('login-action') ?>',
                        method: 'POST',
                        data: {
                            otp: otp,
                            user_id: '<?= $_GET['user_id'] ?>',
                        },
                        beforeSend: function () {
                            $('#confirm-button').html(`<div class="spinner-border text-light" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>`)
                            $('#confirm-button').attr('disabled', true);
                        },
                        success: function (resp) {
                            resp = JSON.parse(resp)
                            if (resp.status == true) {
                                $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                        <i class="ri-mail-send-fill label-icon"></i><strong>OTP Matched</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`)
                                window.location.href = `<?= base_url() ?>`;
                            } else {
                                $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`)
                            }
                            $('#confirm-button').attr('disabled', false);
                        },
                        complete :function(){
                            $('#confirm-button').html(`Verify`)
                            $('#confirm-button').attr('disabled', false);

                        }

                    })

                }

            })
        })

    </script>
</body>

</html>