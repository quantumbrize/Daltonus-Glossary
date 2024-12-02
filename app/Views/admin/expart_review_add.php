<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Add  Expert Review</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Banner Title</label>
                                <input type="text" class="form-control" id="bannerTitle" value=""
                                    placeholder="Enter product title" required="">
                                <div class="invalid-feedback">Please Enter a banner title.</div>
                            </div>
                            <div>
                                <label>Description</label>

                                <div id="ckeditor-classic">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <label class="form-label" for="product-title-input">Select Product</label>
                                        <!-- <select name="" id="" class="form-control">
                                            <option value="">Select-a-product</option>
                                            <option value="">Select-a-product</option>
                                            <option value="">Select-a-product</option>
                                        </select> -->
                                        <select class="form-control choices-single" id="selectProduct">
                                        <!-- <option></option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option> -->
                                        </select>
                                    <div class="invalid-feedback">Please Enter a banner title.</div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="card-body">
                                    <label class="form-label" for="product-title-input">Select Varient</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Select-a-product</option>
                                            <option value="">Select-a-product</option>
                                            <option value="">Select-a-product</option>
                                        </select>
                                    <div class="invalid-feedback">Please Enter a banner title.</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <label class="form-label" for="product-title-input">User Name </label>
                                    <input type="text" class="form-control" id="userName" value=""
                                        placeholder="Enter product title" required="">
                                    <div class="invalid-feedback">Please Enter a banner title.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <label class="form-label" for="product-image-input">User Image</label>
                                    <input type="file" id="file-input"  multiple>
                                    <label for="file-input" id="btn_upload" class="btn btn-success">
                                        <i class="fas fa-upload"></i> &nbsp; Select Banner Image
                                    </label>
                                    <p id="num-of-files"></p>
                                    <div id="images"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <label class="form-label" for="product-title-input">Rateing</label><br>
                                    <div class="star-rating">
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <label class="form-label" for="product-title-input">Review</label>
                                    <div id="ckeditor-classic">

                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->

                
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="expart_review_add_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>