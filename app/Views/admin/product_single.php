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
            <div class="col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Product</h5>
                            </div>
                            <div class="flex">
                                <!-- <a href="<?= base_url('/admin/product/view?p_id='.$_GET['p_id'])?>" class="btn btn-success ">
                                    <i class="ri ri-eye-line"></i>
                                </a> -->
                                <!-- <a href="<?= base_url('/admin/product/update?p_id='.$_GET['p_id'])?>" class="btn btn-secondary">
                                    <i class="ri ri-edit-line"></i>
                                </a> -->
                                <a href="javascript:void(0)" onclick="delete_product('<?= $_GET['p_id']?>')" class="btn btn-danger ">
                                    <i class="ri ri-delete-bin-line"></i>
                                </a>
                            </div>
                        </div>


                    </div>

                    <div class="card-body">
                    <!-- <table class="table">
                            <thead>
                                <th>Add Stock</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="number" placeholder="stock amount" id="stock_qty" class="form-control">
                                    </td>
                                    <td>
                                        <button class="btn btn-success" id="add_stock_btn">Add</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
                        <table class="table">
                            <tbody id="product_details">
                                <tr>
                                    <td>id</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Final Price</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Total Stock</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Sold</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-8 col-lg-8">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex  align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="fs-16">All Product Variants</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="<?= base_url('/admin/product/variant/add?p_id=' . $_GET['p_id']) ?>"
                                        class="btn btn-success">Add Variant</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="table-product-variant" class="table nowrap align-middle table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <!-- <th>Price</th>
                                        <th>discount</th>
                                        <th>Final Price</th> -->
                                        <!-- <th>Sizes</th> -->
                                        <th>Sizes & Stock</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="table-product-variant-body">

                                </tbody>
                            </table>



                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>