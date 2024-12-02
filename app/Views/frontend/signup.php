<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8" />
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="" id="daltonus_logo_meta">

    <!-- Layout config Js -->
    <script src="<?= base_url() ?>public/assets_admin<?= base_url() ?>public/assets_admin/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>public/assets_admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>public/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>public/assets_admin/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url() ?>public/assets_admin/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
                <div class="row justify-content-center">
                    <div id="alert">

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mt-sm-5 mb-4 text-white-50">
                                <!-- <div>
                                    <a href="index.html" class="d-inline-block auth-logo">
                                        <img src="<?= base_url() ?>public/assets_admin/images/logo-light.png" alt=""
                                            height="20">
                                    </a>
                                </div>
                                <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p> -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free daltonusstore account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <div class="needs-validation" novalidate>

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="useremail"
                                                placeholder="Enter email address" required>
                                            <div class="invalid-feedback">
                                                Please enter email
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="username"
                                                placeholder="Enter username" required>
                                            <div class="invalid-feedback">
                                                Please enter username
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="phone"
                                                placeholder="Enter Phone Number" required>
                                            <div class="invalid-feedback">
                                                Please enter Phone Number
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5" onpaste="return false"
                                                    placeholder="Enter password" id="password-input"
                                                    aria-describedby="passwordInput" required>
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                    type="button" id="password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                                <div class="invalid-feedback">
                                                    Please enter password
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="confirm-password-input">Confirm
                                                Password</label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5" onpaste="return false"
                                                    placeholder="Confirm password" id="confirm-password-input"
                                                    aria-describedby="passwordInput" required>
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                    type="button" id="confirm-password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                                <div class="invalid-feedback">
                                                    Please enter password
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the
                                            daltonusstore <a href="#"
                                                    class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                    of Use</a></p>
                                        </div>

                                        <!-- <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                            <h5 class="fs-13">Password must contain:</h5>
                                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                        </div> -->

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" id="sign-up-btn">Sign Up</button>
                                        </div>

                                        <!-- <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                            </div>

                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="<?= base_url() ?>login"
                                    class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>

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
                            <!-- <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> daltonusstore. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by daltonusstore
                            </p> -->
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
    <!-- validation init -->
    <script src="<?= base_url() ?>public/assets_admin/js/pages/form-validation.init.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- prismjs plugin -->
    <script src="<?= base_url() ?>public/assets_admin/libs/prismjs/prism.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {

            // for show and hide password
            $('#password-addon').on('click', function () {
                if ($('#password-input').attr('type') == 'password') {
                    $('#password-input').attr('type', 'text')
                } else {
                    $('#password-input').attr('type', 'password')

                }
            })

            $('#confirm-password-addon').on('click', function () {
                if ($('#confirm-password-input').attr('type') == 'password') {
                    $('#confirm-password-input').attr('type', 'text')
                } else {
                    $('#confirm-password-input').attr('type', 'password')

                }
            })
            // for show and hide password


            
            $('#sign-up-btn').on('click', function () {
                let userEmail = $('#useremail').val();
                let userName = $('#username').val();
                let phone = $('#phone').val();
                let password = $('#password-input').val();
                let confirmPassword = $('#confirm-password-input').val();

                console.log(userEmail);
                console.log(userName);
                console.log(password);
                console.log(confirmPassword);
                if (userEmail.length < 1) {
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Enter Your Email
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`)
                } else if (phone < 10) {
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Enter a valid Number
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`)
                } else if (userName.length < 1) {
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Enter User Name
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`)
                } else if (password.length < 6) {
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Password Must Be Six Characters Long
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`)
                } else if (password != confirmPassword) {
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Passwords Dont Match
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`)
                } else {

                    $.ajax({
                        url: '<?= base_url('sign-up-action') ?>',
                        method: 'POST',
                        data: {
                            user_name: userName,
                            email: userEmail,
                            password: confirmPassword,
                            number: phone
                        },
                        beforeSend: function () {
                            $('#sign-up-btn').html(`<div class="spinner-border text-light" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>`)
                            $('#sign-up-btn').attr('disabled', true);

                        },
                        success: function (resp) {
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
                            $('#sign-up-btn').attr('disabled', false);

                        },
                        complete :function(){
                            $('#sign-up-btn').html(`Sign Up`)
                            $('#sign-up-btn').attr('disabled', false);
                        },
                        error: function(){
                            $('#sign-up-btn').html(`Sign Up`)
                            $('#sign-up-btn').attr('disabled', false);
                            $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Srver Error
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`)
                        }
                    })

                }

            })

            $.ajax({
                url: "<?= base_url('/api/about') ?>",
                type: "GET",
                success: function (resp) {
                    // console.log(resp)
                    if (resp.status) {
                    let newLogoSrc = `<?=base_url()?>public/uploads/logo/${resp.data.logo}`;
                    $('#daltonus_logo_meta').attr('href', newLogoSrc);


                    }else{
                        console.log(resp)
                    }
                },
                error: function (err) {
                    console.log(err)
                },
            })

        })


    </script>




</body>

</html>