<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Sellers</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card">
            <div class="card-header border-0 rounded">
                <div class="row g-2">
                    <div class="col-lg-auto">
                        <div class="hstack gap-2">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSeller"><i
                                    class="ri-add-fill me-1 align-bottom"></i> Add Seller</button>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <div class="card-body">
                <div class="table-responsive table-card mb-1 p-4">
                    <table class="table align-middle" id="vendor_table">
                        <thead class="table-light text-muted">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>User Image</th>
                                <th>Drug Licence</th>
                                <th>Pan Card</th>
                                <th>GST</th>
                                <th>Pin</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all" id="vendor_table_data">

                        </tbody>
                    </table>
                </div>
            </div>

            <!--end row-->

            <!-- Vendor Add Modal -->
            <div class="modal fade zoomIn" id="addSeller" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true" id="model_vendor_add">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSellerLabel">Add Seller</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-content border-0 mt-3">
                            <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                        aria-selected="true">
                                        Personal Details
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab"
                                        aria-selected="false">
                                        Business Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#bankDetails" role="tab"
                                        aria-selected="false">
                                        Bank Details
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <!-- <form action="#"> -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="user_name" class="form-label">User Name</label>
                                                    <input type="text" class="form-control" id="user_name"
                                                        placeholder="Enter your firstname">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <!-- <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="lastnameInput" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="lastnameInput"
                                                        placeholder="Enter your lastname">
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <!-- <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="contactnumberInput" class="form-label">Contact
                                                        Number</label>
                                                    <input type="number" class="form-control" id="contactnumberInput"
                                                        placeholder="Enter your number">
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="number" class="form-label">Phone Number</label>
                                                    <input type="number" class="form-control" id="number"
                                                        placeholder="Enter your number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter your email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 1 *</label>
                                                    <input type="number" class="form-control" id="vendor-pin"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 2 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin2"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 3 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin3"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 4 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin4"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 5 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin5"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">password</label>
                                                    <input type="text" class="form-control" id="password"
                                                        placeholder="Enter your password">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">User Image</label>
                                                            <input type="file" id="file-input1"  multiple>
                                                            <label for="file-input1" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select User Image
                                                            </label>
                                                            <p id="num-of-files1"></p>
                                                            <div id="images1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">Drug Licence</label>
                                                            <input type="file" id="file-input2"  multiple>
                                                            <label for="file-input2" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select Signature
                                                            </label>
                                                            <p id="num-of-files2"></p>
                                                            <div id="images2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">Pan Card Image</label>
                                                            <input type="file" id="file-input3"  multiple>
                                                            <label for="file-input3" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select Pan Card
                                                            </label>
                                                            <p id="num-of-files3"></p>
                                                            <div id="images3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">GST</label>
                                                            <input type="file" id="file-input4"  multiple>
                                                            <label for="file-input4" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select Aadhar Image
                                                            </label>
                                                            <p id="num-of-files4"></p>
                                                            <div id="images4"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <!-- <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="birthdayidInput" class="form-label">Date of
                                                        Birth</label>
                                                    <input type="text" id="birthdayidInput" class="form-control"
                                                        data-provider="flatpickr"
                                                        placeholder="Enter your date of birth">
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <!-- <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="cityidInput" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="cityidInput"
                                                        placeholder="Enter your city">
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <!-- <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="countryidInput" class="form-label">Country</label>
                                                    <input type="text" class="form-control" id="countryidInput"
                                                        placeholder="Enter your country">
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <!-- <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="zipcodeidInput" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" id="zipcodeidInput"
                                                        placeholder="Enter your zipcode">
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <!-- <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="form-label">Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        rows="3" placeholder="Enter description"></textarea>
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button
                                                        class="btn btn-link link-success text-decoration-none fw-medium"
                                                        data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button class="btn btn-primary" id="add_vendor_btn"><i
                                                            class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    <!-- </form> -->
                                </div>
                                <!-- <div class="tab-pane" id="businessDetails" role="tabpanel">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="companynameInput" class="form-label">Company
                                                        Name</label>
                                                    <input type="text" class="form-control" id="companynameInput"
                                                        placeholder="Enter your company name">
                                                </div>
                                            </div>
                                          
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="choices-single-default" class="form-label">Company
                                                        Type</label>
                                                    <select class="form-control" data-trigger=""
                                                        name="choices-single-default" id="choices-single-default">
                                                        <option value="">Select type</option>
                                                        <option value="All" selected="">All</option>
                                                        <option value="Merchandising">Merchandising</option>
                                                        <option value="Manufacturing">Manufacturing</option>
                                                        <option value="Partnership">Partnership</option>
                                                        <option value="Corporation">Corporation</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="pancardInput" class="form-label">Pan Card Number</label>
                                                    <input type="text" class="form-control" id="pancardInput"
                                                        placeholder="Enter your pan-card number">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="websiteInput" class="form-label">Website</label>
                                                    <input type="url" class="form-control" id="websiteInput"
                                                        placeholder="Enter your URL">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="faxInput" class="form-label">Fax</label>
                                                    <input type="text" class="form-control" id="faxInput"
                                                        placeholder="Enter your fax">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="companyemailInput" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="companyemailInput"
                                                        placeholder="Enter your email">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="worknumberInput" class="form-label">Number</label>
                                                    <input type="number" class="form-control" id="worknumberInput"
                                                        placeholder="Enter your number">
                                                </div>
                                            </div>
                                          
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="companylogoInput" class="form-label">Company
                                                        Logo</label>
                                                    <input type="file" class="form-control" id="companylogoInput">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button
                                                        class="btn btn-link link-success text-decoration-none fw-medium"
                                                        data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                       
                                    </form>
                                </div>
                                <div class="tab-pane" id="bankDetails" role="tabpanel">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="banknameInput" class="form-label">Bank Name</label>
                                                    <input type="text" class="form-control" id="banknameInput"
                                                        placeholder="Enter your bank name">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="branchInput" class="form-label">Branch</label>
                                                    <input type="text" class="form-control" id="branchInput"
                                                        placeholder="Branch">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="accountnameInput" class="form-label">Account Holder
                                                        Name</label>
                                                    <input type="text" class="form-control" id="accountnameInput"
                                                        placeholder="Enter account holder name">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="accountnumberInput" class="form-label">Account
                                                        Number</label>
                                                    <input type="number" class="form-control" id="accountnumberInput"
                                                        placeholder="Enter account number">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="ifscInput" class="form-label">IFSC</label>
                                                    <input type="number" class="form-control" id="ifscInput"
                                                        placeholder="IFSC">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button
                                                        class="btn btn-link link-success text-decoration-none fw-medium"
                                                        data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                    </form>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal-->

            <!-- Vendor Update Modal -->
            <div class="modal fade zoomIn" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true" id="modal_vendor_update">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSellerLabel">Update Seller</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-content border-0 mt-3">
                            <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                        aria-selected="true">
                                        Personal Details
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <!-- <form action="#"> -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="user_name" class="form-label">User Name</label>
                                                    <input type="text" class="form-control" id="user_name_update"
                                                        placeholder="Enter your firstname">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="number" class="form-label">Phone Number</label>
                                                    <input type="number" class="form-control" id="number_update"
                                                        placeholder="Enter your number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email_update"
                                                        placeholder="Enter your email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 1 *</label>
                                                    <input type="number" class="form-control" id="vendor-pin-update"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 2 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin-update2"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 3 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin-update3"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 4 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin-update4"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Pin code 5 (optional)</label>
                                                    <input type="number" class="form-control" id="vendor-pin-update5"
                                                        placeholder="Enter your pin code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">User Image</label>
                                                            <input type="file" id="update_file-input1"  multiple>
                                                            <label for="update_file-input1" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select User Image
                                                            </label>
                                                            <p id="update_num-of-files1"></p>
                                                            <div id="update_images1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">Drug Licence</label>
                                                            <input type="file" id="update_file-input2"  multiple>
                                                            <label for="update_file-input2" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select Signature
                                                            </label>
                                                            <p id="update_num-of-files2"></p>
                                                            <div id="update_images2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">Pan Card Image</label>
                                                            <input type="file" id="update_file-input3"  multiple>
                                                            <label for="update_file-input3" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select Pan Card
                                                            </label>
                                                            <p id="update_num-of-files3"></p>
                                                            <div id="update_images3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="form-label" for="product-image-input">GST</label>
                                                            <input type="file" id="update_file-input4"  multiple>
                                                            <label for="update_file-input4" id="btn_upload1" class="btn btn-success">
                                                                <i class="fas fa-upload"></i> &nbsp; Select Aadhar Image
                                                            </label>
                                                            <p id="update_num-of-files4"></p>
                                                            <div id="update_images4"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="user_id">
                                            <!-- <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">password</label>
                                                    <input type="text" class="form-control" id="password"
                                                        placeholder="Enter your password">
                                                </div>
                                            </div> -->
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button
                                                        class="btn btn-link link-success text-decoration-none fw-medium"
                                                        data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button class="btn btn-primary" id="update_vendor_btn"><i
                                                            class="ri-save-3-line align-bottom me-1"></i> Save Change</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal-->

            <!-- Vendor Delete Modal -->
            <div class="modal fade zoomIn" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true" id="modal_vendor_delete">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSellerLabel">Delete Seller</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-content border-0 mt-3">
                            <!-- <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                        aria-selected="true">
                                        Personal Details
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6" style="margin: auto">
                                                <div class="mb-3">
                                                    <span><h3 style="color:red; margin-left: auto;">Are you sure to delete this seller!</h3></span>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button
                                                        class="btn btn-link link-success text-decoration-none fw-medium"
                                                        data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button class="btn btn-danger" id="delete_vendor_btn"> Yes</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal-->

        </div>
        <!-- container-fluid -->
    </div>