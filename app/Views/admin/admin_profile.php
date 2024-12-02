 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
            <div class="page-content">
                <div class="container-fluid">

                   

                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card mt-n5">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4" id="profile_image">
                                            <!-- <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image"> -->
                                            <!-- <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body material-shadow">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div> -->
                                        </div>
                                        <h5 class="fs-16 mb-1" id="user_name"></h5>
                                        <p class="text-muted mb-0" id="user_role"></p>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="flex-grow-1">
                                            <h5 class="card-title mb-0">Hi Admin</h5>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-body text-body material-shadow">
                                                <i class="ri-github-fill"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" id="gitUsername" placeholder="Username" value="@daveadame">
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-primary material-shadow">
                                                <i class="ri-global-fill"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com" value="www.velzon.com">
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-success material-shadow">
                                                <i class="ri-dribbble-fill"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="dribbleName" placeholder="Username" value="@dave_adame">
                                    </div>
                                    <div class="d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-danger material-shadow">
                                                <i class="ri-pinterest-fill"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="pinterestName" placeholder="Username" value="Advance Dave">
                                    </div> -->
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                                <i class="fas fa-home"></i> Personal Details
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#socialLink" role="tab">
                                                <i class="fas fa-home"></i> Social Media
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#noticebar" role="tab">
                                                <i class="fas fa-home"></i> Notice Bar
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                                <i class="far fa-user"></i> Change Password
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab">
                                                <i class="far fa-envelope"></i> Experience
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                            <form action="javascript:void(0);">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="nameInput">
                                                            <span style="color:red" id="name_val"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="emailInput" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="emailInput">
                                                            <span style="color:red" id="number_val"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control" id="phonenumberInput">
                                                            <span style="color:red" id="email_val"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <input type="hidden" class="form-control" id="userId">
                                                </div>
                                                <!--end row-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" id="update_profile" class="btn btn-success"><i class="ri-edit-box-line align-middle me-2"></i> Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--end tab-pane-->

                                        <div class="tab-pane" id="socialLink" role="tabpanel">
                                            <form action="javascript:void(0);">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="facebooklink" class="form-label">Facebook</label>
                                                            <input type="text" class="form-control" id="facebooklink">
                                                            <span style="color:red" id="facebook_val"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="twitterlink" class="form-label">Twitter</label>
                                                            <input type="email" class="form-control" id="twitterlink">
                                                            <span style="color:red" id="twitter_val"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="instagramlink" class="form-label">Instagram</label>
                                                            <input type="text" class="form-control" id="instagramlink">
                                                            <span style="color:red" id="instagram_val"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="youtubelink" class="form-label">Youtube</label>
                                                            <input type="text" class="form-control" id="youtubelink">
                                                            <span style="color:red" id="youtube_val"></span>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="uid">
                                                    </div>
                                                    <!--end col-->
                                                    
                                                </div>
                                                <!--end row-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" id="update_social" class="btn btn-success"><i class="ri-edit-box-line align-middle me-2"></i> Update Links</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="noticebar" role="tabpanel">
                                            <form action="javascript:void(0);">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="facebooklink" class="form-label">Notice</label>
                                                            <input type="text" class="form-control" id="notice_txt">
                                                            <span style="color:red" id="notice_val"></span>
                                                        </div>
                                                        <input type="hidden" id="nuid">
                                                    </div>
                                                    
                                                </div>
                                                <!--end row-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" id="update_notice" class="btn btn-success"><i class="ri-edit-box-line align-middle me-2"></i> Update Notice</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        
                                        <div class="tab-pane" id="changePassword" role="tabpanel">
                                            <form action="javascript:void(0);">
                                                <div class="row g-2">
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="oldpasswordInput" class="form-label">Old Password*</label>
                                                            <input type="password" class="form-control" id="oldpasswordInput" placeholder="Enter current password">
                                                            <span style="color:red" id="changeOldPass"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="newpasswordInput" class="form-label">New Password*</label>
                                                            <input type="password" class="form-control" id="newpasswordInput" placeholder="Enter new password">
                                                            <span style="color:red" id="changeNewPass"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                                                            <input type="password" class="form-control" id="confirmpasswordInput" placeholder="Confirm password">
                                                            <span style="color:red" id="changeConfirmPass"></span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <!-- <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                                        </div>
                                                    </div> -->
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" id="change_password" class="btn btn-success">Change Password</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        <!--end tab-pane-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div><!-- End Page-content -->
        <!-- end main content-->