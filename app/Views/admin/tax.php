<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Taxes</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">GST</label>
                                <input type="text" class="form-control" id="gst" value=""
                                    placeholder="Enter company name" required="">
                                <div class="invalid-feedback">Please Enter Gst.</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Tax</label>
                                <input type="text" class="form-control" id="tax" value=""
                                    placeholder="Enter address" required="">
                                <div class="invalid-feedback">Please Enter tax.</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Delivary Charge</label>
                                        <input type="text" class="form-control" id="delivary_charge" value=""
                                            placeholder="Enter Phone no 1" required="">
                                        <div class="invalid-feedback">Please Enter Delivary Charge</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="tax_id">
                    <!-- end card -->

                </div>
                <!-- end col -->

                
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="tax_update_btn">Submit</button>
        </div>
    </div>
    <!-- container-fluid -->
</div>