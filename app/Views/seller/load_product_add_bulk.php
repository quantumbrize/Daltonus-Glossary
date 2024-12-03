<style>
    .truncate {
    display: inline-block;    /* Necessary for text-overflow to work */
    max-width: 150px;         /* Set a maximum width */
    max-height: 100px;         /* Set a maximum width */
    white-space: nowrap;      /* Prevent wrapping to a new line */
    overflow: hidden;         /* Hide text that overflows the container */
    text-overflow: ellipsis;  /* Show ellipsis (...) for overflowing text */
    }

    /* Set a fixed table layout to respect column widths */
    #product-table {
        table-layout: fixed;
    }

    /* Set widths for the first columns */
    #product-table th.product-column,
    #product-table td.product-column { width: 200px; }
    #product-table th.store-name-column,
    #product-table td.store-name-column { width: 200px; }
    #product-table th.barcode-column,
    #product-table td.barcode-column { width: 150px; }
    #product-table th.category-column,
    #product-table td.category-column { width: 200px; }
    #product-table th.size-column,
    #product-table td.size-column { width: 150px; }
    #product-table th.tags-column,
    #product-table td.tags-column { width: 200px; }
    #product-table th.tax-column,
    #product-table td.tax-column { width: 120px; }
    #product-table th.discount-column,
    #product-table td.discount-column { width: 150px; }
    #product-table th.delivery-charge-column,
    #product-table td.delivery-charge-column { width: 150px; }
    #product-table th.price-column,
    #product-table td.price-column { width: 150px; }

    /* Set widths for the last four columns */
    #product-table th.details-column,
    #product-table td.details-column { width: 100px; }
    #product-table th.images-column,
    #product-table td.images-column { width: 100px; }
    #product-table th.size-chart-column,
    #product-table td.size-chart-column { width: 200px; }
    #product-table th.delete-column,
    #product-table td.delete-column { width: 100px; }

    /* Optional: Style the table headers */
    #product-table th {
        background-color: #f2f2f2;
        text-align: left;
        padding: 8px;
    }

    /* Optional: Style the table rows */
    #product-table td {
        padding: 8px;
    }

</style>
<div class="page-content">


    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between ">
                <h4>
                    <select id="vendor_drop_down"></select>
                </h4>
            </div>
        </div>
        <style>
            .fa-redo {
                margin-left: 25px;
                cursor: pointer;
            }
        </style>
        <div class="col-12" style="overflow-x: auto; width: 100%;">
            <table id="product-table" class="table nowrap align-middle table-hover" style="width:100%">
                <thead>
                <tr>
                    <th class="product-column">Product</th>
                    <th class="store-name-column">Store Name</th>
                    <th class="barcode-column">Barcode</th>
                    <th class="category-column">Category</th>
                    <th class="size-column">Size</th>
                    <th class="tags-column">Tags</th>
                    <th class="tax-column">Tax</th>
                    <th class="discount-column">Discount</th>
                    <th class="delivery-charge-column">Delivery Charge</th>
                    <th class="price-column">Price</th>
                    <th class="details-column">Details</th>
                    <th class="images-column">Images</th>
                    <th class="size-chart-column">Size Chart</th>
                    <th class="delete-column">Delete</th>
                </tr>
                </thead>
                <tbody id="product-table-body">
                    <tr>
                        <td><input type="text" placeholder="Enter Product Name" required></td>
                        <!-- <td><input type="number" placeholder="Enter Price"></td>
                        <td><input type="number" placeholder="Enter Discount"></td> -->
                        <td><input type="text" placeholder="Enter Store Name"></td>
                        <td><input type="text" placeholder="Enter Barcode"></td>
                        <td>
                            <select class="product-category-list" id="product-category-0"
                                onChange="get_sub_category('0')"></select>
                            <input type="hidden" id="selected-cat-name-0">
                            <p>
                                Selected Category:- <b id="selected-cat-0"></b>
                                <i class="fas fa-redo" onclick="reset_category('0')"></i>
                            </p>
                        </td>
                        <td>
                            <select class="product-size-list-input"></select>
                        </td>
                        <!-- <td><input type="number" placeholder="Enter Quantity"></td> -->
                        <td><input type="text" placeholder="Enter Tags"></td>
                        <td>
                            <select class="product-tax-list" id="product-tax-0">
                                <option value="0">00.00% IGST - (00.00% CGST & 00.00% SGST)</option>
                                <option value="0.1">00.10% IGST - (00.05% CGST & 00.05% SGST)</option>
                                <option value="0.25">00.25% IGST - (00.125% CGST & 00.125% SGST)</option>
                                <option value="1">01.00% IGST - (00.50% CGST & 00.50% SGST)</option>
                                <option value="1.5">01.50% IGST - (00.75% CGST & 00.75% SGST)</option>
                                <option value="3">03.00% IGST - (01.50% CGST & 01.50% SGST)</option>
                                <option value="5">05.00% IGST - (02.50% CGST & 02.50% SGST)</option>
                                <option value="6">06.00% IGST - (03.00% CGST & 03.00% SGST)</option>
                                <option value="7.5">07.50% IGST - (03.75% CGST & 03.75% SGST)</option>
                                <option value="12">12.00% IGST - (06.00% CGST & 06.00% SGST)</option>
                                <option value="18">18.00% IGST - (09.00% CGST & 09.00% SGST)</option>
                                <option value="28">28.00% IGST - (14.00% CGST & 14.00% SGST)</option>
                            </select>
                        </td>
                        <td><input type="text" placeholder="Discount"></td>
                        <td><input type="text" placeholder="Delivery Charge"></td>
                        <!-- <td>
                            <button type="button" class="btn btn-md btn-secondary" onclick="openPriceModal(this)">
                                <i class="ri-money-dollar-circle-fill"></i>
                            </button>
                        </td> -->
                        <td><input type="text" id="price" placeholder="Enter Price"></td>
                        <td>
                            <button type="button" class="btn btn-md btn-primary" onclick="openDescriptionModal(this)">
                                <i class="ri-edit-fill"></i>
                            </button>
                        </td>
                        <td>
                            <!-- Button to open modal for the current row -->
                            <button type="button" class="btn btn-md btn-primary" onclick="openImageModal(this)">
                                <i class="ri-upload-2-fill"></i>
                            </button>
                            <!-- Modal for uploading images specific to this row -->

                        </td>
                        <td><input type="file" id="size_chart" name="size_chart"></td>

                        <td>
                            <button class="btn btn-md btn-danger" type="button" onclick="removeRow(this)">
                                <i class="ri-delete-bin-7-line"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-sm btn-success" onclick="addRow()">Add Another Product</button>
            <button type="button" class="btn btn-sm btn-success" id="submitBtn" onclick="submitProducts()">Submit
                Products</button>

            <!-- Modal for CKEditor -->
            <div id="descriptionModal" class="modal">
                <div class="modal-content">
                    <span class="close-button" onclick="closeModal()">&times;</span>
                    <h2>Edit Description</h2>
                    <!-- Textarea for CKEditor -->
                    <textarea id="editor"></textarea>
                    <!-- Hidden input to store row reference -->
                    <input type="hidden" id="currentRowIndex">
                    <button type="button" class="btn btn-success btn-lg" onclick="saveDescription()">Save
                        Description</button>
                </div>
            </div>
            <div id="imageUploadModal" class="modal" style="display:none;">
                <div class="modal-content">
                    <span class="close-button" id="closeImageModal" style="cursor:pointer;">&times;</span>
                    <h4>Upload Multiple Images <small>(Upload 1080x1080 Image)*</small></h4>
                    <input type="file" id="imageInput" accept="image/*" multiple onchange="previewImages(this)">
                    <div id="imagePreviewContainer"></div>
                    <button id="submitImages" class="btn btn-success btn-lg">Submit Images</button>
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
                                    <!-- <th>discount</th> -->
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="product-price-table-body">
                                <tr>
                                    <td><input type="text" placeholder="Enter Min Quantity" required></td>
                                    <td><input type="text" placeholder="Enter Max Quantity" required></td>
                                    <td><input type="text" placeholder="Price" required></td>
                                    <!-- <td><input type="text" placeholder="discount" required></td> -->
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
                            <button type="button" class="btn btn-md btn-success" id="submitPriceBtn"
                                onclick="submitPrice()">Save Price</button>
                            <button type="button" class="btn btn-md btn-success" onclick="addPriceRow()">Add Price
                                +</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>