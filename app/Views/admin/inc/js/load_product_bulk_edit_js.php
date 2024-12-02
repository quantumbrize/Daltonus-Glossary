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


                    let html = ``;
                    $.each(resp.data, function (key, val) {
                        html += `<option value="${val.uid}">${val.name}</option>`;
                    });
                    if (selectElement) {
                        selectElement.innerHTML = html; // Populate only the current select element
                    } else {
                        $('.product-size-list-input').append(html)
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
        let cat_id = $('#product-category-'+parent_id).val()
        $('#selected-cat-name-'+parent_id).val(cat_id)
        $.ajax({
            url: "<?= base_url('/api/category/by/id') ?>",
            type: "GET",
            data: { c_id: cat_id }, 
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    console.log(resp)
                    $('#selected-cat-'+parent_id).text(resp.data.name)
                }else{
                    console.log(resp);
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
                    $('#product-category-'+parent_id).html(html)
                }else{
                    console.log(resp);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function reset_category(cat_id) {
        $('#selected-cat-'+cat_id).text("")
        $('#selected-cat-name-'+cat_id).val("")
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
                $('#product-category-'+cat_id).html(html)
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
                console.log(resp);
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
    let prodict_id_glob = ''
    // function openImageModal(e) {
    //     // alert(product_id)
    //     $.ajax({
    //         url: "<?= base_url('/api/product/images') ?>",
    //         type: "GET",
    //         data: {p_id:e},
    //         beforeSend: function () { },
    //         success: function (resp) {
    //             console.log('modal',resp);
    //             if (resp.status) {
    //             prodict_id_glob = e
    //             html = ``
    //             $.each(resp.data, function (index, p_img) {
    //                 html += `<div class="image-container p-2 image-no-${p_img.uid}">
    //                             <button onclick="delete_product_img('${p_img.uid}')" class="delete-button" id="product_img_delete_${p_img.uid}">
    //                                 <i class="ri-delete-bin-line fs-15"></i>Delete
    //                             </button>
    //                             <img src="<?= base_url('public/uploads/product_images/')?>${p_img.src}" class="product-image">
    //                         </div>`
    //             })

    //             $('#existingProductImgContainer').html(html)
    //             document.getElementById('imageUploadModal').style.display = 'block'; // Show the modal
    //             }
    //         },
    //         error: function (err) { console.error(err); }
    //     });
    //    // Track the closest row to associate with the images
    //     // document.getElementById('imageUploadModal').style.display = 'block'; // Show the modal
    // }
    function openImageModal(e) {
        // alert(product_id)
        $.ajax({
            url: "<?= base_url('/api/product/images') ?>",
            type: "GET",
            data: {p_id:e},
            beforeSend: function () { },
            success: function (resp) {
                console.log('modal',resp);
                
                prodict_id_glob = e
                html = ``
                $.each(resp.data, function (index, p_img) {
                    html += `<div class="image-container p-2 image-no-${p_img.uid}">
                                <button onclick="delete_product_img('${p_img.uid}')" class="delete-button" id="product_img_delete_${p_img.uid}">
                                    <i class="ri-delete-bin-line fs-15"></i>Delete
                                </button>
                                <img src="<?= base_url('public/uploads/product_images/')?>${p_img.src}" class="product-image">
                            </div>`
                })

                $('#existingProductImgContainer').html(html)
                document.getElementById('imageUploadModal').style.display = 'block'; // Show the modal
                
            },
            error: function (err) { console.error(err); }
        });
       // Track the closest row to associate with the images
        // document.getElementById('imageUploadModal').style.display = 'block'; // Show the modal
    }


    function updateProductImages() {
        var formData = new FormData();

        formData.append('p_id', prodict_id_glob);
        $.each($('#imageInput')[0].files, function (index, file) {
            formData.append('imageInput[]', file);
        });


        $.ajax({
            url: "<?= base_url('/api/update/product/images') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#submitImages').html(`<div class="spinner-border" role="status"></div>`)
                $('#submitImages').attr('disabled', true)

            },
            success: function (resp) {
                let html = ''

                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                    
                } else {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                }


                $('#alert').html(html)
                console.log(resp)
                // closeModalimg();
                // $('#imagePreviewContainer').html('');
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#submitImages').html(`submit`)
                $('#submitImages').attr('disabled', false)
            }
        })
    }

    // Close the image modal
    document.getElementById('closeImageModal').onclick = function () {
        document.getElementById('imageUploadModal').style.display = 'none'; // Close the modal
        $('#imageInput').val("")
        $('#num-of-files').html("")
        $('#imagePreviewContainer').html("")
        $('#existingProductImgContainer').html("")
    }
    // document.getElementById('submitImages').onclick = function () {
    //     if (rowImages[currentRow.rowIndex]?.length > 0) {
    //         // alert(`${rowImages[currentRow.rowIndex].length} images selected. Ready for upload!`);

    //         // Optionally close the modal and clear input after submission
    //         document.getElementById('imageUploadModal').style.display = 'none';
    //         document.getElementById('imageInput').value = '';
    //         document.getElementById('imagePreviewContainer').innerHTML = '';
    //     } else {
    //         alert("Please select at least one image.");
    //     }
    // }

    // function previewImages(input) {
    //     const previewContainer = document.getElementById('imagePreviewContainer');
    //     previewContainer.innerHTML = ''; // Clear previous previews

    //     if (input.files) {
    //         rowImages[currentRow.rowIndex] = Array.from(input.files); // Store the files for the current row

    //         Array.from(input.files).forEach(file => {
    //             const reader = new FileReader();
    //             reader.onload = function (e) {
    //                 const img = document.createElement('img');
    //                 img.src = e.target.result; // Set image source
    //                 previewContainer.appendChild(img); // Append image to preview container
    //             }
    //             reader.readAsDataURL(file); // Read file as data URL
    //         });
    //     }
    // }

    function preview(fileInput, imageContainer, numOfFiles) {
        return function () {
            imageContainer.html("");
            numOfFiles.text(`${fileInput[0].files.length} Files Selected`);

            $.each(fileInput[0].files, function (index, file) {
                let reader = new FileReader();
                let $figure = $("<figure>");
                let $figCap = $("<figcaption>").text(file.name);
                $figure.append($figCap);
                reader.onload = function () {
                    let $img = $("<img>").attr("src", reader.result);
                    $figure.prepend($img);
                }
                imageContainer.append($figure);
                reader.readAsDataURL(file);
            });
        }
    }
    $("#imageInput").change(preview($("#imageInput"), $("#imagePreviewContainer"), $("#num-of-files")));

    // Example: Set currentRow dynamically, replace this with your actual logic
    document.getElementById('imageInput').addEventListener('change', function () {
        currentRow = { rowIndex: 0 }; // Simulating row selection, replace with actual logic
    });


    function openDescriptionModal(p_id) {
        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            data: {p_id:p_id},
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp);
                if (resp.status) {
                prodict_id_glob = p_id
                editorInstance.setData(resp.data.description)
                document.getElementById('descriptionModal').style.display = "block";
                }
            },
            error: function (err) { console.error(err); }
        });
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('descriptionModal').style.display = "none";
        
    }function closeModalimg() {
        document.getElementById('imageUploadModal').style.display = 'none';
        
    }

    // Function to save description from CKEditor
    function saveDescription() {
        var formData = new FormData();

        formData.append('p_id', prodict_id_glob);
        formData.append('description', editorInstance.getData());

        $.ajax({
            url: "<?= base_url('/api/update/product/description') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#productDescriptionBtn').html(`<div class="spinner-border" role="status"></div>`)
                $('#productDescriptionBtn').attr('disabled', true)

            },
            success: function (resp) {
                let html = ''

                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                    
                } else {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                }


                $('#alert').html(html)
                document.getElementById('descriptionModal').style.display = "none";
                console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#productDescriptionBtn').html(`Save Description`)
                $('#productDescriptionBtn').attr('disabled', false)
            }
        })
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

    // Function to remove a row
    function removeRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Function to submit products
    function submitProducts() {
        const checkboxes = document.querySelectorAll('input[name="updated_product"]:checked');
        let values = [];
        
        checkboxes.forEach((checkbox) => {
            values.push(checkbox.value);
        });
        let html = '';
        if(values != ""){
            const rows = document.querySelectorAll('#product-table-body tr');
            const products = [];

            rows.forEach(row => {
                const productId = row.cells[0].children[1].value;
                const productName = row.cells[1].children[0].value;
                // const price = row.cells[2].children[0].value;
                // const discount = row.cells[3].children[0].value;
                // const visibility = row.cells[3].children[0].value;
                const storeName = row.cells[2].children[0].value;
                const barCode = row.cells[3].children[0].value;
                const category = row.cells[4].children[1].value;
                const size = row.cells[5].children[0].value;
                // const qty = row.cells[8].children[0].value;
                const tags = row.cells[6].children[0].value;
                const tax= row.cells[7].children[0].value;
                const discount=row.cells[8].children[0].value;
                const delivery_charge=row.cells[9].children[0].value;  
                const price=row.cells[10].children[0].value;  
                 


                products.push({
                    productName,
                    productId,
                    // price,
                    // discount,
                    storeName,
                    barCode,
                    category,
                    size,
                    // qty,
                    tags,
                    tax,
                    discount,
                    delivery_charge,
                    price
                    
                });

            });

            let selectedProducts = products.filter(product => values.includes(product.productId));
            let isValid = true;
             

            selectedProducts.forEach(product => {
                const productName = product.productName; 
                // const price = product.price; 
                // const discount = product.discount; 
                const storeName = product.storeName; 
                const barCode = product.barCode;
                const size = product.size;
                const category = product.category;
                // const qty = product.qty;
                const tags = product.tags;
                const tax=product.tax;
                const discount= product.discount;  
                const delivery_charge= product.delivery_charge;
                const price= product.price;
                

                // Validate product name
                if (!productName) {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Product Name is required for Product Update.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                    isValid = false;
                }

                // Validate price (must be a positive number)
                // if (!price || isNaN(price) || parseFloat(price) <= 0) {
                //     html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                //                 <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Price must be a positive number for Product Update.
                //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //             </div>`;
                //     isValid = false;
                // }

                // Validate discount (must be a non-negative number)
                // if (discount && (isNaN(discount) || parseFloat(discount) < 0)) {
                //     html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                //                 <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Discount must be a non-negative number for Product Update
                //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //             </div>`;
                //     isValid = false;
                // }

                // Validate store name
                if (!storeName) {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Store name is required for Product Update
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                    isValid = false;
                }

                // Validate barcode
                if (!barCode) {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Barcode is required for Product Update
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                    isValid = false;
                }

                // Validate category
                if (!category || category == 'null') {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Category is required for Product Update
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                    isValid = false;
                }

                // Validate quantity (must not be empty or zero)
                // if (!qty || isNaN(qty) || parseInt(qty) <= 0) {
                //     html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                //                 <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Quantity is required for Product Update.
                //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //             </div>`;
                //     isValid = false;
                // }
            });

            if (!isValid) {
                $('#alert').html(html); 
                return; 
            }

            console.log(selectedProducts)


            try {
                let formData = new FormData();

                selectedProducts.forEach((product, index) => {
                    formData.append(`products[${index}][productName]`, product.productName);
                    formData.append(`products[${index}][productId]`, product.productId);
                    // formData.append(`products[${index}][qty]`, product.qty);
                    // formData.append(`products[${index}][price]`, product.price);
                    // formData.append(`products[${index}][discount]`, product.discount);
                    formData.append(`products[${index}][storeName]`, product.storeName);
                    formData.append(`products[${index}][barCode]`, product.barCode);
                    formData.append(`products[${index}][category]`, product.category);
                    formData.append(`products[${index}][size]`, product.size);
                    formData.append(`products[${index}][tags]`, product.tags);
                    formData.append(`products[${index}][tax]`, product.tax);
                    formData.append(`products[${index}][discount]`, product.discount);
                    formData.append(`products[${index}][delivery_charge]`, product.delivery_charge);
                    formData.append(`products[${index}][price]`, product.price);
                    

                });

                $.ajax({
                    url: "<?= base_url('/api/product/bulk/update') ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#submitBtn').html(`<div class="spinner-border" role="status"></div>`)
                        $('#submitBtn').attr('disabled', true)
                    },
                    success: function (resp) {
                        console.log(resp);
                        if (resp.status) {
                            load_products()
                            $('#alert').html(`<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                    <i class="ri-check-line label-icon"></i><strong>success</strong> - All Products Added
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`)

                        }

                    },
                    error: function (err) {
                        console.error(err);

                    },
                    complete: function () {
                        $('#submitBtn').html(`Update Products`)
                        $('#submitBtn').attr('disabled', false)
                    }
                });
            } catch (e) {
                console.log(e);
            }
        } else {
            html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Select Product.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
            $('#alert').html(html);
        }
        
    }
    
    let product_id_glob = ''
    function openPriceModal(p_id) {
        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            data: {p_id:p_id},
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp);
                if (resp.status) {
                    product_id_glob = p_id
                    let html = ``
                    if(resp.data.product_prices != ""){
                        $.each(resp.data.product_prices, function (index, price) {
                            html += `<tr>
                                        <td><input type="text" value="${price.min_qty}" required></td>
                                        <td><input type="text" value="${price.max_qty}" required></td>
                                        <td><input type="text" value="${price.price}" required></td>
                                        <td>
                                            <button class="btn btn-md btn-danger" type="button" onclick="removePriceRow(this)">
                                                <i class="ri-delete-bin-7-line"></i>
                                            </button>
                                        </td>
                                    </tr>`
                        })
                        $('#product-price-table-body').html(html)
                    } else {
                        html += `<tr>
                                        <td><input type="text" placeholder="Enter Min Quantity" required></td>
                                        <td><input type="text" placeholder="Enter Max Quantity" required></td>
                                        <td><input type="text" placeholder="Price" required></td>
                                        <td>
                                            <button class="btn btn-md btn-danger" type="button" onclick="removePriceRow(this)">
                                                <i class="ri-delete-bin-7-line"></i>
                                            </button>
                                        </td>
                                    </tr>`
                        $('#product-price-table-body').html(html)
                    }
                    
                } 
                document.getElementById('priceModel').style.display = "block";
            },
            error: function (err) { console.error(err); }
        });
    }

    document.getElementById('closePriceModal').onclick = function () {
        document.getElementById('priceModel').style.display = 'none'; // Close the modal
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

    function removePriceRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function submitPrice() {
        const rows = document.querySelectorAll('#product-price-table-body tr');
        let prices = []

        rows.forEach(row => {
            prices.push({
                min: row.cells[0].children[0].value,
                max: row.cells[1].children[0].value,
                price: row.cells[2].children[0].value,
            })
        })
        // pricesArr.push(prices);
        console.log(prices)
        
        if (prices.length > 0 && prices[0].min <= 0) {
            // alert(".");
            html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - The minimum value of the first row must be greater than 0.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
            $('#alert').html(html)
            return false;
        }
        if (prices.length > 1) {
            for (let i = 1; i < prices.length; i++) {
                const previousMax = prices[i - 1].max;
                const currentMin = prices[i].min;
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

        try {
            let formData = new FormData();
            formData.append(`p_id`, product_id_glob);
            formData.append(`prices`, JSON.stringify(prices));
            $.ajax({
                url: "<?= base_url('/api/product/prices/update') ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#submitPriceBtn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#submitPriceBtn').attr('disabled', true)
                },
                success: function (resp) {
                    console.log(resp);
                    if (resp.status) {
                        html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            $('#alert').html(html)
                            document.getElementById('priceModel').style.display = 'none';

                    }

                },
                error: function (err) {
                    console.error(err);

                },
                complete: function () {
                    $('#submitPriceBtn').html(`submit`)
                    $('#submitPriceBtn').attr('disabled', false)
                }
            });
        } catch (e) {
            console.log(e);
        }

    }

    load_products()
    function load_products() {
        let user_id = '<?= !empty($_SESSION[SES_ADMIN_USER_ID]) ? '' : $_SESSION[SES_STAFF_USER_ID] ?>'
        let user_type = '<?= !empty($_SESSION[SES_ADMIN_TYPE]) ? $_SESSION[SES_ADMIN_TYPE] : $_SESSION[SES_STAFF_TYPE] ?>'
        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            data: {v_id:user_id},
            beforeSend: function () {
                    // $('#product-table-body').html(`<tr >
                    //         <td colspan="9"  style="text-align:center;">
                    //             <div class="spinner-border" role="status"></div>
                    //         </td>
                    //     </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    if (resp.data.length > 0) {
                        console.log('del',resp)
                        $('#product-table-body').html("")
                        $.each(resp.data, function (index, product) {
                            const tableBody = document.getElementById('product-table-body');
                            const newRow = document.createElement('tr');
                            category_id += 1;
                            newRow.innerHTML = `
                            <td>
                                <input type="checkbox" id="updated_product" name="updated_product" value="${product.product_id}">
                                <input type="hidden" value="${product.product_id}">
                            </td>
                            <td>
                                <input type="text" value="${product.name}" required>
                            </td>
                            <td><input type="text" value="${product.manufacturer_name}"></td>
                            <td><input type="text" value="${product.manufacturer_brand}"></td>
                            <td>
                                <select class="product-category-list" id="product-category-${category_id}" onChange="get_sub_category('${category_id}')">
                                    <option selected value="${product.category_id}">${product.category}</option>
                                </select>
                                <input type="hidden" id="selected-cat-name-${category_id}" value="${product.category_id}">
                                <p>Selected Category:- <b id="selected-cat-${category_id}">${product.category}</b><i class="fas fa-redo" onclick="reset_category('${category_id}')"></i></p>
                            </td>
                            <td>
                                <select class="product-size-list-input">
                                    <option value="${product.size_list_id}">${product.size_list_name}</option>
                                </select>
                            </td>
                            <td><input type="text" value="${product.tags}"></td>
                             <td>
                                <select class="product-tax-list" id="product-tax-0">
                                    <option value="0" ${product.tax == 0 ? 'selected' : ''}>00.00% IGST - (00.00% CGST & 00.00% SGST)</option>
                                    <option value="0.1" ${product.tax == 0.1 ? 'selected' : ''}>00.10% IGST - (00.05% CGST & 00.05% SGST)</option>
                                    <option value="0.25" ${product.tax == 0.25 ? 'selected' : ''}>00.25% IGST - (00.125% CGST & 00.125% SGST)</option>
                                    <option value="1" ${product.tax == 1 ? 'selected' : ''}>01.00% IGST - (00.50% CGST & 00.50% SGST)</option>
                                    <option value="1.5" ${product.tax == 1.5 ? 'selected' : ''}>01.50% IGST - (00.75% CGST & 00.75% SGST)</option>
                                    <option value="3" ${product.tax == 3 ? 'selected' : ''}>03.00% IGST - (01.50% CGST & 01.50% SGST)</option>
                                    <option value="5" ${product.tax == 5 ? 'selected' : ''}>05.00% IGST - (02.50% CGST & 02.50% SGST)</option>
                                    <option value="6" ${product.tax == 6 ? 'selected' : ''}>06.00% IGST - (03.00% CGST & 03.00% SGST)</option>
                                    <option value="7.5" ${product.tax == 7.5 ? 'selected' : ''}>07.50% IGST - (03.75% CGST & 03.75% SGST)</option>
                                    <option value="12" ${product.tax == 12 ? 'selected' : ''}>12.00% IGST - (06.00% CGST & 06.00% SGST)</option>
                                    <option value="18" ${product.tax == 18 ? 'selected' : ''}>18.00% IGST - (09.00% CGST & 09.00% SGST)</option>
                                    <option value="28" ${product.tax == 28 ? 'selected' : ''}>28.00% IGST - (14.00% CGST & 14.00% SGST)</option>
                                </select>
                            </td>
                            <td><input type="text" value="${product.base_discount}" placeholder="Discount"></td>
                            <td><input type="text" value="${product.delivery_charge}" placeholder="Delivery Charge"></td>
                            <td><input type="text" id="price" placeholder="Enter Price" value="${product.base_price}"></td>
                            <td>
                                <button type="button" class="btn btn-md btn-primary" onclick="openDescriptionModal('${product.product_id}')">
                                    <i class="ri-edit-fill"></i>
                                </button>
                            </td>
                            <td>
                                <!-- Button to open modal for the current row -->
                                <button type="button" class="btn btn-md btn-primary" onclick="openImageModal('${product.product_id}')">
                                    <i class="ri-upload-2-fill"></i>
                                </button>
                                <!-- Modal for uploading images specific to this row -->
                            </td>
                            <td>
                                <button type="button" class="btn btn-md btn-warning" onclick="updateStockModal('${product.product_id}')">
                                    Stock
                                </button>
                            </td>`;

                            tableBody.appendChild(newRow);
                        })
                        getSizeList()
                    }
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
            }
        })
    }

    function delete_product_img(img_id){
        // alert(img_id)
        $.ajax({
            url: "<?= base_url('/api/delete/product-img') ?>",
            type: "GET",
            data: { img_id: img_id }, // Add a comma after this line
            beforeSend: function () {
                $('#product_img_delete_'+img_id).html(`<div class="spinner-border" role="status"></div>`)
                $('#product_img_delete_'+img_id).attr('disabled', true) 
            },
            success: function (resp) {
                if (resp.status) {
                    $('.image-no-'+ img_id).html("")
                    html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            $('#alert').html(html)
                    closeModalimg();
                }else{
                    console.log(resp);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function getCheckedValues() {
        const checkboxes = document.querySelectorAll('input[name="updated_product"]:checked');
        let values = [];
        
        checkboxes.forEach((checkbox) => {
        values.push(checkbox.value);
        });
        if(values != ""){

        }
        
        console.log(values)
    }

    document.getElementById('closeStockUpdateModal').onclick = function () {
        document.getElementById('stockUpdateModal').style.display = 'none'; // Close the modal
    }

    function updateStockModal(p_id){
        // document.getElementById('stockUpdateModal').style.display = "block";
        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: 'GET',
            data: {
                p_id: p_id
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp);
                if (resp.status) {
                    product = resp.data;
                    let load_sizes = ``
                    let all_price_list = ``
                    $.each(product.product_sizes, function (Index, p_size) {
                        load_sizes += `<tr>
                                        <td><b>${p_size.sizes}</b></td>
                                        <td style="text-align: right">
                                        <div class="input-group stock_number_bx" style="flex-flow: row">
                                        <span class="input-group-btn btn-number">
                                            <button 
                                                type="button" 
                                                class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" 
                                                data-field=""
                                                id="btn-stock-sub-${p_size.uid}"
                                                onClick="updateStock('${p_size.uid}','sub')">
                                                <span>-</span>
                                            </button>
                                        </span>
                                        <input 
                                            type="text" 
                                            name="quantity" 
                                            class="stock_number btn-number" 
                                            value="${p_size.stocks}" 
                                            id="input-stock-${p_size.uid}"
                                            >
                                        <span class="input-group-btn btn-number">
                                            <button 
                                                type="button" 
                                                class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" 
                                                data-field=""
                                                id="btn-stock-add-${p_size.uid}"
                                                onClick="updateStock('${p_size.uid}','add')">
                                                <span>+</span>
                                            </button>
                                        </span>
                                    </div>
                                        </td>
                                    </tr>`
                    })
                    $('#product_details').html(load_sizes);
                    document.getElementById('stockUpdateModal').style.display = "block";
                }
            },
            error: function (err) {
                console.log(err)
            }

        })
    }

    function updateStock(product_id, type) {
        let stock = parseInt($(`#input-stock-${product_id}`).val())
        stock = type == 'add' ? stock + 1 : stock - 1;
        console.log(product_id)
        console.log(type)
        console.log(stock)
        if(stock >= 0){
            $.ajax({
                url: "<?= base_url('/api/product/variant/stock/update') ?>",
                type: "GET",
                data: {
                    item_stock_id: product_id,
                    stock: stock
                },
                beforeSend: function () {
                    $(`#btn-stock-add-${product_id}`).attr('disabled', true)
                    $(`#btn-stock-sub-${product_id}`).attr('disabled', true)
                },
                success: function (resp) {
                    $(`#btn-stock-add-${product_id}`).attr('disabled', false)
                    $(`#btn-stock-sub-${product_id}`).attr('disabled', false)
                    if (resp.status) {
                        $(`#input-stock-${product_id}`).val(stock)
                        $('#alert').html(`<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                            <i class="ri-checkbox-circle-fill label-icon"></i><strong>${resp.message}</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>`)
                    }
                },
                error: function (err) {
                    console.log(err)
                    $(`#btn-stock-add-${product_id}`).attr('disabled', false)
                    $(`#btn-stock-sub-${product_id}`).attr('disabled', false)
                    $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                        <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Server Error
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`)
                }
            })
        }
            

    }
</script>