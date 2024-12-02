<div class="page-content">


    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between ">
            <button type="button" class="btn btn-sm btn-success" id="submitBtn" onclick="submitProducts()">Update
            Products</button>
            </div>
        </div>
        <style>

        .fa-redo {
            margin-left: 25px;
            cursor: pointer;
        }
        #product-table th:nth-child(6),
        #product-table td:nth-child(6) {
            width: 100px;  /* Adjust the width as per your requirement */
        }
    </style>
        <div class="col-12" style="overflow-x: auto; width: 100%;">
            
            <table id="product-table" class="table nowrap align-middle table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <!-- <th>Price</th>
                        <th>Discount</th> -->
                        <th>Store Name</th>
                        <th>Barcode</th>
                        <th>Category</th>
                        <th>Size</th>
                        <!-- <th>Quantity</th> -->
                        <th>Tags</th>
                        <th>Tax</th>
                        <th>Discount</th>
                        <th>Delivery Charge</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Images</th>
                        <th>Stocks</th>
                    </tr>
                </thead>
                <tbody id="product-table-body">
                    <!-- <tr>
                        <td><input type="text" placeholder="Enter Product Name" required></td>
                        <td><input type="number" placeholder="Enter Price"></td>
                        <td><input type="number" placeholder="Enter Discount"></td>
                        <td><input type="text" placeholder="Enter Store Name"></td>
                        <td><input type="text" placeholder="Enter Barcode"></td>
                        <td>
                            <select class="product-category-list" id="product-category-0" onChange="get_sub_category('0')"></select>
                            <input type="hidden" id="selected-cat-name-0">
                            <p>Selected Category:- <b id="selected-cat-0"></b><i class="fas fa-redo" onclick="reset_category('0')"></i></p>
                        </td>
                        <td><input type="number" placeholder="Enter Quantity"></td>
                        <td>
                            <button type="button" class="btn btn-md btn-primary" onclick="openDescriptionModal(this)">
                                <i class="ri-edit-fill"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-md btn-primary" onclick="openImageModal(this)">
                                <i class="ri-upload-2-fill"></i>
                            </button>

                        </td>
                        <td>
                            <button class="btn btn-md btn-danger" type="button" onclick="removeRow(this)">
                                <i class="ri-delete-bin-7-line"></i>
                            </button>
                        </td>
                    </tr> -->
                </tbody>
            </table>

            <!-- <button type="button" class="btn btn-sm btn-success" onclick="addRow()">Add Another Product</button> -->
            <!-- <button type="button" class="btn btn-sm btn-success" id="submitBtn" onclick="submitProducts()">Submit
                Products</button> -->

            <!-- Modal for CKEditor -->
            <div id="descriptionModal" class="modal">
                <div class="modal-content">
                    <span class="close-button" onclick="closeModal()">&times;</span>
                    <h2>Edit Description</h2>
                    <!-- Textarea for CKEditor -->
                    <textarea id="editor"></textarea>
                    <!-- Hidden input to store row reference -->
                    <input type="hidden" id="currentRowIndex">
                    <button type="button" class="btn btn-success btn-lg" id="productDescriptionBtn" onclick="saveDescription()">Save
                        Description</button>
                </div>
            </div>
            <div id="imageUploadModal" class="modal" style="display:none;">
                <div class="modal-content">
                    <span class="close-button" id="closeImageModal" style="cursor:pointer;">&times;</span>
                    <h4>Upload Multiple Images<small>(Upload 1080x1080 Image)*</small></h4>
                    <input type="file" id="imageInput" accept="image/*" multiple>
                    <p id="num-of-files"></p>
                    <div id="imagePreviewContainer"></div>
                    <div id="existingProductImgContainer"></div>
                    <button id="submitImages" class="btn btn-success btn-lg" onclick="updateProductImages()">Submit Images</button>
                </div>
            </div>
            <div id="priceModel" class="modal" style="display:none;">
                <div class="modal-content">
                    <span class="close-button" id="closePriceModal" style="cursor:pointer;">&times;</span>
                    <h4>Add Prices</h4>
                    <div class="col-12" style="overflow-x: auto; ">
                        <table id="product-price-table" class="table nowrap align-middle table-hover">
                            <thead>
                                <tr>
                                    <th>Quantity Min</th>
                                    <th>Quantity Max</th>
                                    <th>Price</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="product-price-table-body">
                                <tr>
                                    <td><input type="text" placeholder="Enter Min Quantity" required></td>
                                    <td><input type="text" placeholder="Enter Max Quantity" required></td>
                                    <td><input type="text" placeholder="Price" required></td>
                                    <td>
                                        <button class="btn btn-md btn-danger" type="button"
                                            onclick="removePriceRow(this)">
                                            <i class="ri-delete-bin-7-line"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="display: flex; gap: 10px;">
                            <button type="button" class="btn btn-md btn-success" id="submitPriceBtn" onclick="submitPrice()">Save Price</button>
                            <button type="button" class="btn btn-md btn-success" onclick="addPriceRow()">Add Price +</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="stockUpdateModal" class="modal" style="display:none;">
                <div class="modal-content modal-content-stock">
                    <span class="close-button" id="closeStockUpdateModal">&times;</span>
                    <h2>Update Stock</h2>
                    <!-- Textarea for CKEditor -->
                    <!-- <textarea id="editor"></textarea> -->
                        <table class="table" style="width: 300px;">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Size</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody id="product_details">
                                
                            </tbody>
                        </table>

                    <input type="hidden" id="currentRowIndex">
                    <!-- <button type="button" class="btn btn-success btn-lg" id="productDescriptionBtn" onclick="saveDescription()">Save
                        Description
                    </button> -->
                </div>
            </div>
        </div>

    </div>



</div>