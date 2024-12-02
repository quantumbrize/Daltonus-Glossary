<script>

   
        // get_categories_all()
        get_product_data();
        var editor;

        let $fileInput = $("#file-input");
        let $imageContainer = $("#images");
        let $numOfFiles = $("#num-of-files");

        function preview() {
            $imageContainer.html("");
            $numOfFiles.text(`${$fileInput[0].files.length} Files Selected`);

            $.each($fileInput[0].files, function (index, file) {
                let reader = new FileReader();
                let $figure = $("<figure>");
                let $figCap = $("<figcaption>").text(file.name);
                $figure.append($figCap);
                reader.onload = function () {
                    let $img = $("<img>").attr("src", reader.result);
                    $figure.prepend($img);
                }
                $imageContainer.append($figure);
                reader.readAsDataURL(file);
            });
        }
        $fileInput.change(preview);

        ClassicEditor.create(document.querySelector("#ckeditor-classic")).then(function (createdEditor) {
            editor = createdEditor;
            editor.ui.view.editable.element.style.height = "200px";
        }).catch(function (error) {
            console.error(error);
        });



        function get_product_data() {
            $.ajax({
                url: "<?= base_url('/api/product') ?>",
                type: "GET",
                data: {
                    p_id: '<?= $_GET['p_id'] ?>'
                },
                beforeSend: function () { },
                success: function (resp) {
                    
                    if (resp.status) {
                        let product = resp.data
                        // console.log(product)
                        get_categories_By_id(product.category_id)
                        // $('#choices-category-input').html(`<option value="${product.category_id}">${product.category_id}</option>`)
                        html = ``
                        $.each(product.product_img, function (index, p_img) {
                            html += `<div class="image-container p-2">
                                        <img src="<?= base_url('public/uploads/product_images/')?>${p_img.src}" style="max-height: 200px; max-width: 300px;">
                                        <button onclick="delete_product_img('${p_img.uid}')" class="delete-button"><i class="ri-delete-bin-line fs-15"></i>Delete</button>
                                    </div>`
                        })
                        $('#images_view').html(html)
                        $('#images2').html(`<img src="<?= base_url('public/uploads/product_size_chart/')?>${product.size_chart}" style="max-height: 300px; max-width: 200px;">`)
                        $('#product-title-input').val(product.name)
                        $('#product-id-input').val(product.product_id)
                        $('#product-item-id-input').val(product.product_item_id)
                        $('#product-meta-id-input').val(product.meta_id)
                        editor.setData(product.description)
                        $('#product-tags-input').val(product.tags)
                        $('#choices-publish-status-input').val(product.status)
                        $('#choices-publish-visibility-input').val(product.visibility)
                        $('#datepicker-publish-input').val(product.publish_date)
                        $('#manufacturer-name-input').val(product.manufacturer_name)
                        $('#manufacturer-brand-input').val(product.manufacturer_brand)
                        $('#product-price-input').val(product.base_price)
                        $('#product-discount-input').val(product.base_discount)
                        $('#meta-title-input').val(product.meta_title)
                        $('#meta-keywords-input').val(product.meta_keywords)
                        $('#meta-description-input').val(product.meta_description)
                        $('#product-size-list-input').append(`<option selected value="${product.size_list_id}">${product.size_list_name}</option>`)
                    }
                },
                error: function (err) {
                    console.log(err)

                }
            })
        }

        $('#product_update_btn').on('click', function () {
            var formData = new FormData();

            formData.append('title', $('#product-title-input').val());
            formData.append('product_id', $('#product-id-input').val());
            formData.append('product_item_id', $('#product-item-id-input').val());
            formData.append('product_meta_id', $('#product-meta-id-input').val());
            formData.append('details', editor.getData());
            formData.append('user_id', '<?= $_SESSION[SES_SELLER_USER_ID] ?>');
            formData.append('categoryId', $('#choices-category-input').val());
            formData.append('productTags', $('#product-tags-input').val());
            formData.append('status', $('#choices-publish-status-input').val());
            formData.append('visibility', $('#choices-publish-visibility-input').val());
            formData.append('publishDate', $('#datepicker-publish-input').val());
            formData.append('manufacturerName', $('#manufacturer-name-input').val());
            formData.append('manufacturerBrand', $('#manufacturer-brand-input').val());
            formData.append('price', $('#product-price-input').val());
            formData.append('discount', $('#product-discount-input').val());
            formData.append('metaTitle', $('#meta-title-input').val());
            formData.append('metaKeywords', $('#meta-keywords-input').val());
            formData.append('metaDescription', $('#meta-description-input').val());

            $.each($('#file-input')[0].files, function (index, file) {
                formData.append('images[]', file);
            });


            $.ajax({
                url: "<?= base_url('/api/product/update') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#product_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#product_add_btn').attr('disabled', true)

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
                },
                error: function (err) {
                    console.log(err)
                },
                complete: function () {
                    $('#product_add_btn').html(`submit`)
                    $('#product_add_btn').attr('disabled', false)
                }
            })
        })

        // function get_categories_all(c_id) {
        //     $.ajax({
        //         url: "<?= base_url('/api/categories') ?>",
        //         type: "GET",
        //         data:{parent_id:c_id},
        //         beforeSend: function () { },
        //         success: function (resp) {
        //             let html = '<option value="">Select-category</option>'
        //             if (resp.status) {
        //                 $.each(resp.data, function (key, val) {
        //                     html += `<option value="${val.uid}">${val.name}</option>`
        //                 })
        //             }
        //             $('#choices-category-input').append(html)
        //         },
        //         error: function (err) {
        //             console.log(err)
        //         }
        //     })

        // }

        
    // function get_sub_category(parent_id) {
    //     var selectElement = document.getElementById("choices-category-input");
    //     var parent_id = selectElement.value;
    //     console.log(parent_id)
    //     $.ajax({
    //         url: "<?= base_url('/api/categories') ?>",
    //         type: "GET",
    //         data: { parent_id: parent_id }, // Add a comma after this line
    //         beforeSend: function () { },
    //         success: function (resp) {
    //             if (resp.status) {
    //                 console.log(resp);
    //                 let html = '<option value="">Select-category</option>'
    //                 $.each(resp.data, function (key, val) {
    //                         html += `<option value="${val.uid}">${val.name}</option>`
    //                     })
    //                 $('#choices-category-input').html(html)
    //             }else{
    //                 console.log(resp);
    //             }
    //         },
    //         error: function (err) {
    //             console.log(err);
    //         }
    //     });
    // }

    function delete_product_img(img_id){
        // alert(img_id)
        $.ajax({
            url: "<?= base_url('/api/delete/product-img') ?>",
            type: "GET",
            data: { img_id: img_id }, // Add a comma after this line
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    get_product_data()
                }else{
                    console.log(resp);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function get_categories_By_id(c_id) {
            $.ajax({
                url: "<?= base_url('/api/category/by/id') ?>",
                type: "GET",
                data:{c_id:c_id},
                beforeSend: function () { },
                success: function (resp) {
                    console.log(resp)
                    if (resp.status) {
                        $('#choices-category-input').html(`<option value="${resp.data.uid}">${resp.data.name}</option>`)
                    }
                    
                },
                error: function (err) {
                    console.log(err)
                }
            })

        }
</script>