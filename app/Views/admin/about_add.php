<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Add  About</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                           
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-label" for="product-image-input">Logo Image</label>
                                    <input type="file" id="file-input"  multiple>
                                    <label for="file-input" id="btn_upload" class="btn btn-success">
                                        <i class="fas fa-upload"></i> &nbsp; Select Logo Image
                                    </label>
                                    <p id="num-of-files"></p>
                                    <div id="images"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Company Name</label>
                                <input type="text" class="form-control" id="companyName" value=""
                                    placeholder="Enter company name" required="">
                                <div class="invalid-feedback">Please Enter Address.</div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="frontend-meta-description">meta-description</label>
                                <input type="text" class="form-control" id="frontend-meta-description" value=""
                                    placeholder="Enter meta-description" required="">
                                <div class="invalid-feedback">Please Enter meta-description.</div>
                                
                               
                                
                                
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                            <label class="form-label" for="frontend-meta-author">meta-author</label>
                                <input type="text" class="form-control" id="frontend-meta-author" value=""
                                    placeholder="Enter meta-author" required="">
                                <div class="invalid-feedback">Please Enter meta-author.</div>

                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                            <label class="form-label" for="frontend-copyright">copyright</label>
                                <input type="text" class="form-control" id="frontend-copyright" value=""
                                    placeholder="Enter meta-author" required="">
                                <div class="invalid-feedback">Please Enter copyright</div>

                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                            <div class="frontend-tag-input-section">
                                <input type="text" id="frontend-tag-input" placeholder="Enter a tag" class="form-control"><br>
                                <button id="add-frontend-tag" class="btn btn-primary">Add Tag</button>

                                <div id="selected-frontend-tags" class="selected-frontend-tags">
                                    <!-- Selected tags will appear here -->
                                </div>

                                <button id="submit-frontend-tags" class="btn btn-success mt-3">Submit Tags</button>
                            </div>

                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div>
                                <label>About Us</label>
                                <div id="ckeditor-classic">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Address</label>
                                <input type="text" class="form-control" id="address" value=""
                                    placeholder="Enter address" required="">
                                <div class="invalid-feedback">Please Enter Address.</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Phone No 1</label>
                                        <input type="text" class="form-control" id="phoneNo1" value=""
                                            placeholder="Enter Phone no 1" required="">
                                        <div class="invalid-feedback">Please Enter Phone no 1.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">WhatsApp</label>
                                        <input type="text" class="form-control" id="phoneNo2" value=""
                                            placeholder="Enter Phone no " required="">
                                        <div class="invalid-feedback">Please Enter WhatsApp Number</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">MAP</label>
                                <input type="text" class="form-control" id="map" value=""
                                    placeholder="Enter Map Url" required="">
                                <div class="invalid-feedback">Please Enter MAP URL</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Email</label>
                                <input type="text" class="form-control" id="email" value=""
                                    placeholder="Enter Email" required="">
                                <div class="invalid-feedback">Please Enter Email</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <label>Mission</label>
                                <div id="ckeditor-classic1">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <label>Vision</label>
                                <div id="ckeditor-classic2">

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
            <button class="btn btn-success w-sm" id="about_update_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>