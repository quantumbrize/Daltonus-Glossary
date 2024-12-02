<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Products</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <!-- <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex mb-1 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Select Variant</h5>
                            </div>
                        </div>


                    </div>

                    <div class="card-body row">
                        <div class="col-lg-6 col-md-6  col-sm-12">
                            <label for="">Size</label>
                            <input type="text" class="form-control" id="size" />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="colorPicker" class="form-label">Color</label>
                            <input type="text" id="color_id" hidden>
                            <input type="text" id="size_id" hidden>
                            <input type="color" class="form-control form-control-color w-100" id="colorPicker"
                                value="#364574">
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex mb-1 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Price</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                            <div>
                                <label class="form-label" for="product-price-input">Price</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="product-price-addon">$</span>
                                    <input type="text" class="form-control" id="product-price-input"
                                        placeholder="Enter price" aria-label="Price"
                                        aria-describedby="product-price-addon" required="">
                                    <div class="invalid-feedback">Please Enter a product price.</div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div>
                                <label class="form-label" for="product-discount-input">Discount</label>
                                <div class="input-group ">
                                    <span class="input-group-text" id="product-discount-addon">%</span>
                                    <input type="text" class="form-control" id="product-discount-input"
                                        placeholder="Enter discount" aria-label="discount"
                                        aria-describedby="product-discount-addon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> -->

            <!-- <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header border-1">
                        <div class="d-flex mb-1 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Stock Count</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <label class="form-label">Add Stock</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                    data-type="minus" data-field="">
                                    <span ">-</span>
                                </button>
                            </span>
                            <input type=" text" id="quantity" name="quantity" class="form-control input-number"
                                        value="0">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <span>+</span>
                                            </button>
                                        </span>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-xl-12 col-lg-12">

                <div class="card">
                    <div class="card-header border-1">
                        <div class="d-flex mb-1 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Variants Images</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <label class="form-label" for="product-image-input">Variant Image</label>
                        <input type="file" id="file-input" multiple>
                        <label for="file-input" id="btn_upload" class="btn btn-success">
                            <i class="fas fa-upload"></i> &nbsp; Select Variant Image
                        </label>
                        <p id="num-of-files" class="m-0"></p>
                        <div id="images"></div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
    	
            



            <div class="col-xl-12 col-lg-12 mb-3" style="display : flex;justify-content: center;align-items: center;">

                <button id="variant_add_btn" class="btn btn-success " style="width: 200px; margin: auto;">Save</button>

            </div>

        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>