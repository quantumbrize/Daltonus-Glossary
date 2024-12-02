<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8" />
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>public/assets_admin/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="<?= base_url() ?>public/assets_admin/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>public/assets_admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>public/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>public/assets_admin/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url() ?>public/assets_admin/css/custom.min.css" rel="stylesheet" type="text/css" />
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
        #otp_bx{
            display: none;
        }
    </style>
</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div id="alert">

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="<?= base_url() ?>public/assets_admin/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <div class="avatar-lg mx-auto">
                                        <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                                            <i class="ri-mail-line"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2 mt-4">
                                    <div class="text-muted text-center mb-4 mx-lg-3">
                                        <h4>Verify Your Email</h4>
                                        <p>Please Enter The Email Of Your Account</p>
                                    </div>


                                    <div autocomplete="off">
                                        <div class="row" id="email_bx">
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="email"
                                                    placeholder="Enter Email">
                                            </div>
                                            <div class="mb-4 col-4">
                                                <button class="btn btn-success w-100" id="send-btn">Send OTP</button>
                                            </div>
                                        </div>
                                        <div class="row" id="otp_bx">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="digit1-input" class="visually-hidden">Digit 1</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg bg-light border-primary text-center"
                                                        onkeyup="moveToNext(1, event)" maxLength="1" id="digit1-input">
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="digit2-input" class="visually-hidden">Digit 2</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg bg-light border-primary text-center"
                                                        onkeyup="moveToNext(2, event)" maxLength="1" id="digit2-input">
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="digit3-input" class="visually-hidden">Digit 3</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg bg-light border-primary text-center"
                                                        onkeyup="moveToNext(3, event)" maxLength="1" id="digit3-input">
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="digit4-input" class="visually-hidden">Digit 4</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg bg-light border-primary text-center"
                                                        onkeyup="moveToNext(4, event)" maxLength="1" id="digit4-input">
                                                </div>
                                            </div><!-- end col -->
                                            <div class="mt-3">
                                                <button type="button" id="confirm-btn"
                                                    class="btn btn-success w-100">Confirm</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <!-- <div class="mt-4 text-center">
                            <p class="mb-0">Didn't receive a code ? <a href="auth-pass-reset-basic.html"
                                    class="fw-semibold text-primary text-decoration-underline">Resend</a> </p>
                        </div> -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> daltonusstore. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by daltonusstore
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>public/assets_admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?= base_url() ?>public/assets_admin/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= base_url() ?>public/assets_admin/js/pages/particles.app.js"></script>
    <!-- two-step-verification js -->
    <script src="<?= base_url() ?>public/assets_admin/js/pages/two-step-verification.init.js"></script>
    <!-- prismjs plugin -->
    <script src="<?= base_url() ?>public/assets_admin/libs/prismjs/prism.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        let user_id = ''
        $(document).ready(function () {
            $('#send-btn').on('click', function () {

                let email = $('#email').val()
                $.ajax({
                    url: "<?= base_url('send-otp') ?>",
                    data: {
                        email: email,
                    },
                    method: 'POST',
                    beforeSend: function () {
                        $('#send-btn').html(`<div class="spinner-border text-light" role="status" style="height: 18px;width: 18px;"></div>`)
                        $('#send-btn').attr('disabled', true);
                    },
                    success: function (resp) {
                        resp = JSON.parse(resp)
                        if(resp.status == true){
                            $('#otp_bx').css({
                                'display': 'flex'
                            });
                            $('#email_bx').hide(100);
                            user_id = resp.user_id
                        }

                        $('#alert').html(`<div class="alert ${resp.status ? 'alert-success' : 'alert-warning'} alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                        <i class="ri-mail-send-fill label-icon"></i><strong>${resp.message}</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`)
                    },
                    complete: function () {
                        $('#send-btn').html(`Send OTP`)
                        $('#send-btn').attr('disabled', false);

                    }
                })
            })

            $('#confirm-btn').on('click', function () {

                let otp1 = $('#digit1-input').val()
                let otp2 = $('#digit2-input').val()
                let otp3 = $('#digit3-input').val()
                let otp4 = $('#digit4-input').val()

                let otp = otp1 + otp2 + otp3 + otp4


                if (otp.length < 4) {
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Enter A Valid Otp
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`)
                } else {
                    $.ajax({
                        url: '<?= base_url('verify-otp-action') ?>',
                        method: 'POST',
                        data: {
                            otp: otp,
                            user_id: user_id,
                        },
                        beforeSend: function () {
                            $('#confirm-btn').html(`<div class="spinner-border text-light" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>`)
                            $('#confirm-btn').attr('disabled', true);
                        },
                        success: function (resp) {
                            resp = JSON.parse(resp)
                            if (resp.status == true) {
                                $('#alert').html(`<div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                        <i class="ri-mail-send-fill label-icon"></i><strong>OTP Matched</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`)
                                window.location.href = `<?= base_url('change-password?user_id=')?>${user_id}`;
                            } else {
                                $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`)
                            }
                            $('#confirm-btn').attr('disabled', false);
                        },
                        complete: function () {
                            $('#confirm-btn').html(`Confirm`)
                            $('#confirm-btn').attr('disabled', false);

                        }

                    })

                }

            })
        })

    </script>
</body>

</html>