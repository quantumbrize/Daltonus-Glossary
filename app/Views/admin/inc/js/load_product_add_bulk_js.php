<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    // Initialize CKEditor
    let category_id = 0
    let editorInstance;
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });


    getSizeList();
    function getSizeList(selectElement) {
        $.ajax({
            url: "<?= base_url('/api/product-size/list') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {


                    let html = `<option value="">Select-a-size-category</option>`;
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.uid}">${val.name}</option>`;
                    });
                    if (selectElement) {
                        selectElement.innerHTML = html; // Populate only the current select element
                    } else {
                        $('.product-size-list-input').html(html)
                    }

                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    get_categories_all()
    function get_categories_all() {
        $.ajax({
            url: "<?= base_url('/api/categories') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                let html = '<option disabled selected value="">Select-category</option>'
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.uid}">${val.name}</option>`
                    })
                }
                $('.product-category-list').html(html)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function get_sub_category(parent_id) {
        let cat_id = $('#product-category-' + parent_id).val()
        $('#selected-cat-name-' + parent_id).val(cat_id)
        $.ajax({
            url: "<?= base_url('/api/category/by/id') ?>",
            type: "GET",
            data: { c_id: cat_id },
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    // console.log(resp)
                    $('#selected-cat-' + parent_id).text(resp.data.name)
                } else {
                    // console.log(resp);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
        $.ajax({
            url: "<?= base_url('/api/categories') ?>",
            type: "GET",
            data: { parent_id: cat_id },
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    let html = '<option disabled selected value="">Select Sub-category</option>'
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.uid}">${val.name}</option>`
                    })
                    $('#product-category-' + parent_id).html(html)
                } else {
                    // console.log(resp);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function reset_category(cat_id) {
        $('#selected-cat-' + cat_id).text("")
        $('#selected-cat-name-' + cat_id).val("")
        $.ajax({
            url: "<?= base_url('/api/categories') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                let html = '<option disabled selected value="">Select-category</option>'
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.uid}">${val.name}</option>`
                    })
                }
                $('#product-category-' + cat_id).html(html)
            },
            error: function (err) {
                console.log(err)
            }
        })
    }


    load_vendors();
    function load_vendors() {
        $.ajax({
            url: "<?= base_url('/api/sellers') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                // console.log(resp);
                if (resp) {
                    let html = '<option value="">Select-a-Vendor</option>';
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.vendor_id}">${val.user_name}</option>`;
                    });
                    $('#vendor_drop_down').html(html);
                    $('#vendor_drop_down').select2({
                        placeholder: "Select-a-Vendor",
                        allowClear: true // Allows clearing of selection
                    });
                }
            },
            error: function (err) { console.error(err); }
        });
    }


    let currentRow; // Variable to track which row is currently being edited
    let rowImages = {}; // Object to store image files for each row by row index

    // Open the image upload modal and link it to the current row
    function openImageModal(button) {
        currentRow = button.closest('tr'); // Track the closest row to associate with the images
        document.getElementById('imageUploadModal').style.display = 'block'; // Show the modal
    }

    // Close the image modal
    document.getElementById('closeImageModal').onclick = function () {
        document.getElementById('imageUploadModal').style.display = 'none'; // Close the modal
    }
    document.getElementById('closePriceModal').onclick = function () {
        document.getElementById('priceModel').style.display = 'none'; // Close the modal
    }

    document.getElementById('submitImages').onclick = function () {
        if (rowImages[currentRow.rowIndex]?.length > 0) {
            // alert(`${rowImages[currentRow.rowIndex].length} images selected. Ready for upload!`);

            // Optionally close the modal and clear input after submission
            document.getElementById('imageUploadModal').style.display = 'none';
            document.getElementById('imageInput').value = '';
            document.getElementById('imagePreviewContainer').innerHTML = '';
        } else {
            alert("Please select at least one image.");
        }
    }

    function previewImages(input) {
        const previewContainer = document.getElementById('imagePreviewContainer');
        previewContainer.innerHTML = ''; // Clear previous previews

        if (input.files) {
            rowImages[currentRow.rowIndex] = Array.from(input.files); // Store the files for the current row

            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result; // Set image source
                    previewContainer.appendChild(img); // Append image to preview container
                }
                reader.readAsDataURL(file); // Read file as data URL
            });
        }
    }

    let pricesRowIndex = NaN;


    function openDescriptionModal(button) {
        const row = button.parentNode.parentNode; // Get the row of the button clicked
        const currentRowIndex = Array.from(document.querySelectorAll('#product-table-body tr')).indexOf(row); // Get current row index

        // Set current row index in hidden input
        document.getElementById('currentRowIndex').value = currentRowIndex;

        // Get existing description if any
        const descriptionCell = row.cells[10]; // Get the description cell
        const existingDescription = descriptionCell.querySelector('span') ? descriptionCell.querySelector('span').innerHTML : '';

        // Set existing description in CKEditor
        editorInstance.setData(existingDescription);

        // Show modal
        document.getElementById('descriptionModal').style.display = "block";
    }

    function openPriceModal(button) {
        const row = button.parentNode.parentNode; // Get the row of the button clicked
        const currentRowIndex = Array.from(document.querySelectorAll('#product-table-body tr')).indexOf(row);

        pricesRowIndex = currentRowIndex;

        // Clear existing rows in the modal
        const tableBody = document.getElementById('product-price-table-body');
        tableBody.innerHTML = '';

        // Check if there are already saved prices for this index
        const existingPrices = pricesArr.find(price => price.index === pricesRowIndex);

        if (existingPrices) {
            // Prefill rows with saved data
            existingPrices.row.forEach(price => {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td><input type="text" placeholder="Enter Min Quantity" value="${price.min}" required></td>
                <td><input type="text" placeholder="Enter Max Quantity" value="${price.max}" required></td>
                <td><input type="text" placeholder="Price" value="${price.price}" required></td>
                <td>
                    <button class="btn btn-md btn-danger" type="button" onclick="removePriceRow(this)">
                        <i class="ri-delete-bin-7-line"></i>
                    </button>
                </td>`;
                tableBody.appendChild(newRow);
            });
        } else {
            // Add a blank row if no data exists
            addPriceRow();
        }

        document.getElementById('priceModel').style.display = "block";
    }



    // Function to close the modal
    function closeModal() {
        document.getElementById('descriptionModal').style.display = "none";
    }

    // Function to save description from CKEditor
    function saveDescription() {
        const currentRowIndex = document.getElementById('currentRowIndex').value;

        // Get the description from CKEditor
        const description = editorInstance.getData();

        // Set description in the corresponding row's cell
        const row = document.querySelectorAll('#product-table-body tr')[currentRowIndex];

        // Update the description cell (you can also add a hidden input if needed)
        row.cells[10].innerHTML = `<span class="truncate">${description}</span><button class="btn btn-sm btn-success" type="button" onclick="openDescriptionModal(this)">Edit Description</button>`;

        // Close modal
        closeModal();
    }

    // Function to initialize size dropdowns for existing rows
    function initializeSizeDropdowns() {
        const rows = document.querySelectorAll('#product-table-body tr');
        rows.forEach(row => {
            const sizeSelect = row.querySelector('.product-size-list-input');
            getSizeList(sizeSelect); // Populate size dropdown for each existing row
        });
    }

    // Call this function when the page loads or when the table is rendered
    document.addEventListener('DOMContentLoaded', function () {
        initializeSizeDropdowns(); // Initialize size dropdowns for existing rows
    });

    // Function to add a new row
    function addRow() {
        const tableBody = document.getElementById('product-table-body');
        const newRow = document.createElement('tr');
        category_id += 1;
        newRow.innerHTML = `<td>
            <input type="text" placeholder="Enter Product Name" required>
        </td>
        <td><input type="text" placeholder="Enter Store Name"></td>
        <td><input type="text" placeholder="Enter Barcode"></td>
        <td>
            <select class="product-category-list" id="product-category-${category_id}" onChange="get_sub_category('${category_id}')"></select>
            <input type="hidden" id="selected-cat-name-${category_id}">
            <p>Selected Category:- <b id="selected-cat-${category_id}"></b><i class="fas fa-redo" onclick="reset_category('${category_id}')"></i></p>
        </td>
        <td>
            <select class="product-size-list-input"></select>
        </td>
        <td><input type="text" placeholder="Enter Tags"></td> 
        <td>
            <select class="product-tax-list" id="product-tax-${category_id}">
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
        </td>`;

        tableBody.appendChild(newRow);

        // Call getSizeList for the newly added row's size dropdown
        getSizeList(newRow.querySelector('.product-size-list-input'));
        get_categories_all()
    }

    function addPriceRow() {
        const tableBody = document.getElementById('product-price-table-body');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `<td><input type="text" placeholder="Enter Min Quantity" required></td>
                            <td><input type="text" placeholder="Enter Max Quantity" required></td>
                            <td><input type="text" placeholder="Price" required></td>
                            <td>
                                <button class="btn btn-md btn-danger" type="button" onclick="removePriceRow(this)">
                                    <i class="ri-delete-bin-7-line"></i>
                                </button>
                            </td>`;

        tableBody.appendChild(newRow);

    }



    // Function to remove a row
    function removeRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
    function removePriceRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    let pricesArr = [];

    function submitPrice() {
        const rows = document.querySelectorAll('#product-price-table-body tr');
        const prices = {
            index: pricesRowIndex,
            row: []
        }

        rows.forEach(row => {
            prices.row.push({
                min: row.cells[0].children[0].value,
                max: row.cells[1].children[0].value,
                price: row.cells[2].children[0].value,
            })
        })


        if (prices.row.length > 0 && prices.row[0].min <= 0) {
            // alert(".");
            html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - The minimum value of the first row must be greater than 0.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
            $('#alert').html(html)
            return false;
        }
        if (prices.row.length > 1) {
            for (let i = 1; i < prices.row.length; i++) {
                const previousMax = prices.row[i - 1].max;
                const currentMin = prices.row[i].min;
                if (parseInt(currentMin) <= parseInt(previousMax)) {
                    // alert(`.`);
                    html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Row ${i + 1} minimum value must be greater than row ${i} maximum value.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    $('#alert').html(html)
                    return false;
                }
            }
        }
        const existingIndex = pricesArr.findIndex(price => price.index === pricesRowIndex);
        if (existingIndex >= 0) {
            pricesArr[existingIndex] = prices;
        } else {
            pricesArr.push(prices);
        }

        document.getElementById('priceModel').style.display = "none";
        $('#product-price-table-body').html(`<tr>
                                    <td><input type="text" placeholder="Enter Min Quantity" required></td>
                                    <td><input type="text" placeholder="Enter Max Quantity" required></td>
                                    <td><input type="text" placeholder="Price" required></td>
                                    <td>
                                        <button class="btn btn-md btn-danger" type="button"
                                            onclick="removePriceRow(this)">
                                            <i class="ri-delete-bin-7-line"></i>
                                        </button>
                                    </td>
                                </tr>`)


    }


    // Function to submit products
    function submitProducts() {
        const rows = document.querySelectorAll('#product-table-body tr');
        const products = [];

        rows.forEach(row => {
            const productName = row.cells[0].children[0].value;
            const storeName = row.cells[1].children[0].value;
            const barCode = row.cells[2].children[0].value;
            const category = row.cells[3].children[1].value;
            const size = row.cells[4].children[0].value;
            const tags = row.cells[5].children[0].value;
            const tax = row.cells[6].children[0].value;
            const discount = row.cells[7].children[0].value;
            const del_charge = row.cells[8].children[0].value;
            const price = row.cells[9].children[0].value;
            const description = row.cells[10].querySelector('span') ? row.cells[10].querySelector('span').innerHTML : '';
            const imagesFiles = rowImages[row.rowIndex] || [];
            let isValid = true;
            let html;

            // Validate the product name
            if (!productName) {
                html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Product Name is required.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                isValid = false;
            }

            // Validate images (optional)
            imagesFiles.forEach((imageFile, imgIndex) => {
                const validExtensions = ['image/jpeg', 'image/png', 'image/gif']; // Allowed file types
                const maxSizeMB = 5; // Maximum file size in MB

                if (!validExtensions.includes(imageFile.type) && imagesFiles.length > 0) {
                    html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Image ${imgIndex + 1} must be a JPEG, PNG, or GIF.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                    isValid = false;
                }

                if (imageFile.size > maxSizeMB * 1024 * 1024 && imagesFiles.length > 0) { // Convert MB to bytes
                    html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Image ${imgIndex + 1} exceeds the maximum size of ${maxSizeMB} MB
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                    isValid = false;
                }
            });

            if (!isValid) {
                $('#alert').html(html);
                return;
            }

            products.push({
                productName,
                tax,
                discount,
                del_charge,
                storeName,
                barCode,
                category,
                size,
                tags,
                description,
                price,
                images: imagesFiles // Add the images linked to this row
            });
        });

        // Handle vendor drop-down validation
        if ($('#vendor_drop_down').val() == '') {
            html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Select a Vendor.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
            $('#alert').html(html);
            return;
        }

        // Prepare FormData
        let user_type = '<?= !empty($_SESSION[SES_ADMIN_TYPE]) ? $_SESSION[SES_ADMIN_TYPE] : $_SESSION[SES_STAFF_TYPE] ?>';
        try {
            let formData = new FormData();
            formData.append('vendorId', $('#vendor_drop_down').val());
            formData.append('user_type', user_type);
            formData.append('status', 'active');

            // Append product data to FormData
            products.forEach((product, index) => {
                formData.append(`products[${index}][productName]`, product.productName);
                formData.append(`products[${index}][description]`, product.description);
                formData.append(`products[${index}][tax]`, product.tax);
                formData.append(`products[${index}][del_charge]`, product.del_charge);
                formData.append(`products[${index}][discount]`, product.discount);
                formData.append(`products[${index}][storeName]`, product.storeName);
                formData.append(`products[${index}][barCode]`, product.barCode);
                formData.append(`products[${index}][category]`, product.category);
                formData.append(`products[${index}][size]`, product.size);
                formData.append(`products[${index}][tags]`, product.tags);
                formData.append(`products[${index}][price]`, product.price);

                // Append images for the product
                product.images.forEach((imageFile, imgIndex) => {
                    formData.append(`products[${index}][image][${imgIndex}]`, imageFile);
                });
            });

            // Get the file input (size_chart)
            const sizeChartFile = document.querySelector('#size_chart').files[0];
            if (sizeChartFile) {
                formData.append('size_chart', sizeChartFile);
            }

            // Make AJAX request to submit the data
            $.ajax({
                url: "<?= base_url('/api/product/add/bulk') ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#submitBtn').html(`<div class="spinner-border" role="status"></div>`);
                    $('#submitBtn').attr('disabled', true);
                },
                success: function (resp) {
                    if (resp.status) {
                        $('#product-table-body').html(`<tr> <!-- Reset the table rows after success --> </tr>`);
                        load_vendors();
                        getSizeList();
                        $('#alert').html(`<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                            <i class="ri-check-line label-icon"></i><strong>Success</strong> - All Products Added
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>`);
                    }
                },
                error: function (err) {
                    console.error(err);
                },
                complete: function () {
                    $('#submitBtn').html('Submit');
                    $('#submitBtn').attr('disabled', false);
                }
            });
        } catch (e) {
            console.log(e);
        }
    }


</script>