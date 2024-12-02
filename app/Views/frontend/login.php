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

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-ROBdErehxIu+Y/Bgy5ZsEgGQJ14gwYpS7YCS4xGOEl0x2TRccKoE+LYhCFOShXsO" crossorigin="anonymous"> -->

    <!-- CUSTOM CSS- -->
    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/style.css" />
    <!-- Registration css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Registration.css" />
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
            <h1 class="registration-title">Registration</h1>
            <p>Enter your phone number to <br/> verify your account</p>
            <div class="input-container">
                <div class="dropdown">
                    <div class="selected-flag" id="selected-flag">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/41/Flag_of_India.svg/640px-Flag_of_India.svg.png" alt="India Flag">
                    </div>
                    <div class="dropdown-content" id="dropdown-content">
                        <div class="dropdown-item" data-code="(+91)" onclick="selectCountry(this)">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/41/Flag_of_India.svg/640px-Flag_of_India.svg.png" alt="India Flag"> India
                        </div>
                        <div class="dropdown-item" data-code="(+1)" onclick="selectCountry(this)">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg" alt="USA Flag"> USA
                        </div>
                        <div class="dropdown-item" data-code="(+44)" onclick="selectCountry(this)">
                            <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg" alt="UK Flag"> UK
                        </div>
                        <!-- Add more countries as needed -->
                    </div>
                </div>
                <span>⮟</span>
                <input type="text" id="phone" value="(+91) ">
            </div>
            <!-- <div class="input-container">
                <input type="text" id="vendor-pin" placeholder="Enter vendor pin">
            </div> -->
            <div class="btn-wrapper">
                <a href="javascript:void(0)">
                    <button id="confirm-button" onclick="login()">Confirm</button>
                </a>
            </div>
            <span style="font-size:16px; display:block; text-align:center; margin-top: 15px;">
                <a href="<?= base_url('vendor/sign-up')?>">Sign-up</a> as a vendor
            </span>
            <span style="font-size:16px; display:block; text-align:center; margin-top: 15px;">
                Already Sign Up please <a href="<?= base_url('seller') ?>">Sign-in</a> in as a vendor
            </span>
        </div>
    </div>

    <!-- jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Custom script -->
    <script src="<?=base_url()?>public/assets/js/Pages_custom_JS/registration_script.js"></script>
    <script>
        function login(){
            
            const phoneNumber = document.getElementById('phone').value;
            // const vendorCode = document.getElementById('vendor-pin').value;
            const countryCodeMatch = phoneNumber.match(/\(\+\d+\)/);
            let countryCodeClean = "";
            let number = phoneNumber;

            if (countryCodeMatch) {
                countryCodeClean = countryCodeMatch[0].replace(/[()]/g, '');
                number = phoneNumber.replace(/\(\+\d+\)\s*/, '');
            }
            

            if(countryCodeClean == ""){
                $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                <i class="ri-mail-send-fill label-icon"></i><strong>Mail Send</strong> - Country Code Not Found.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>`)
            } else if(number == ""){
                alert(number);
                $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                <i class="ri-mail-send-fill label-icon"></i><strong>Mail Send</strong> - Please Enter Valid Phone No..
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>`)
            }else{
                $.ajax({
                    url: '<?= base_url('sign-up-action') ?>',
                    method: 'POST',
                    data: {
                        countryCodeClean: countryCodeClean,
                        number: number,
                        // vendorPin:vendorCode
                    },
                    beforeSend: function () {
                        $('#confirm-button').html(`<div class="spinner-border text-light" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>`)
                        $('#confirm-button').attr('disabled', true);

                    },
                    success: function (resp) {
                        // console.log(resp)
                        resp = JSON.parse(resp)
                        console.log(resp)
                        if (resp.status == true) {
                            $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                    <i class="ri-mail-send-fill label-icon"></i><strong>Mail Send</strong> - OTP sent To Your Email
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`)
                            window.location.href = `<?= base_url('verify-otp?user_id=')?>${resp.user_id}`;
                        } else {
                            $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>`)
                        }
                        $('#confirm-button').attr('disabled', false);

                    },
                    complete :function(){
                        $('#confirm-button').html(`Sign Up`)
                        $('#confirm-button').attr('disabled', false);
                    },
                    error: function(){
                        $('#confirm-button').html(`Sign Up`)
                        $('#confirm-button').attr('disabled', false);
                        $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Srver Error
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>`)
                    }
                })
            }
        }
        // function login(){
        //     alert('number');
            // const phoneNumber = document.getElementById('phone').value;
            // const countryCodeMatch = phoneNumber.match(/\(\+\d+\)/);
            // let countryCodeClean = "";
            // let number = phoneNumber;

            // if (countryCodeMatch) {
            //     countryCodeClean = countryCodeMatch[0].replace(/[()]/g, '');
            //     number = phoneNumber.replace(/\(\+\d+\)\s*/, '');
            // }
        //     // console.log("Country Code:", countryCodeClean);
        //     // console.log("Phone Number:", number);
        //     // alert(number);
        //     if(countryCodeClean = ""){
        //         $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
        //                                         <i class="ri-mail-send-fill label-icon"></i><strong>Mail Send</strong> - Country Code Not Found.
        //                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                                     </div>`)
        //     } else if(){
        //         $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
        //                                         <i class="ri-mail-send-fill label-icon"></i><strong>Mail Send</strong> - Please Enter Valid Phone No..
        //                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                                     </div>`)
        //     } else{
        //         $.ajax({
        //             url: '<?= base_url('sign-up-action') ?>',
        //             method: 'POST',
        //             data: {
        //                 countryCodeClean: countryCodeClean,
        //                 number: phone
        //             },
        //             beforeSend: function () {
        //                 $('#confirm-button').html(`<div class="spinner-border text-light" role="status">
        //                                         <span class="sr-only">Loading...</span>
        //                                     </div>`)
        //                 $('#confirm-button').attr('disabled', true);

        //             },
        //             success: function (resp) {
        //                 resp = JSON.parse(resp)
        //                 console.log(resp)
        //                 if (resp.status == true) {
        //                     $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
        //                                             <i class="ri-mail-send-fill label-icon"></i><strong>Mail Send</strong> - OTP sent To Your Email
        //                                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                                         </div>`)
        //                     window.location.href = `<?= base_url('verify-otp?user_id=')?>${resp.user_id}`;
        //                 } else {
        //                     $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
        //                                         <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
        //                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                                     </div>`)
        //                 }
        //                 $('#confirm-button').attr('disabled', false);

        //             },
        //             complete :function(){
        //                 $('#confirm-button').html(`Sign Up`)
        //                 $('#confirm-button').attr('disabled', false);
        //             },
        //             error: function(){
        //                 $('#confirm-button').html(`Sign Up`)
        //                 $('#confirm-button').attr('disabled', false);
        //                 $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
        //                                         <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Srver Error
        //                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                                     </div>`)
        //             }
        //         })
        //     }
        // }

    </script>
  </body>
</html>
