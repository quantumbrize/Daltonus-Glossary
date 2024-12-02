<script>
  
    var category_id = ""
    $(document).ready(function () {
        
        get_categories_all()
        get_size_list()
        // get_categories()
        var editor;

        // let $fileInput = $("#file-input");
        // let $imageContainer = $("#images");
        // let $numOfFiles = $("#num-of-files");

        // function preview() {
        //     $imageContainer.html("");
        //     $numOfFiles.text(`${$fileInput[0].files.length} Files Selected`);

        //     $.each($fileInput[0].files, function (index, file) {
        //         let reader = new FileReader();
        //         let $figure = $("<figure>");
        //         let $figCap = $("<figcaption>").text(file.name);
        //         $figure.append($figCap);
        //         reader.onload = function () {
        //             let $img = $("<img>").attr("src", reader.result);
        //             $figure.prepend($img);
        //         }
        //         $imageContainer.append($figure);
        //         reader.readAsDataURL(file);
        //     });
        // }
        // $fileInput.change(preview);

        // let $fileInput_chart = $("#file-input-chart");
        // let $imageContainer2 = $("#images2");
        // let $numOfFiles2 = $("#num-of-files2");

        // function preview2() {
        //     $imageContainer2.html("");
        //     $numOfFiles2.text(`${$fileInput_chart[0].files.length} Files Selected`);

        //     $.each($fileInput_chart[0].files, function (index, file) {
        //         let reader = new FileReader();
        //         let $figure = $("<figure>");
        //         let $figCap = $("<figcaption>").text(file.name);
        //         $figure.append($figCap);
        //         reader.onload = function () {
        //             let $img = $("<img>").attr("src", reader.result);
        //             $figure.prepend($img);
        //         }
        //         $imageContainer2.append($figure);
        //         reader.readAsDataURL(file);
        //     });
        // }
        // $fileInput_chart.change(preview2);

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
    $("#file-input").change(preview($("#file-input"), $("#images"), $("#num-of-files")));
    $("#file-input2").change(preview($("#file-input2"), $("#images2"), $("#num-of-files2")));

    function clearImages(imageContainer, numOfFiles) {
        imageContainer.html(""); // Clear the images container
        numOfFiles.text("0 Files Selected"); // Reset the file count text
    }

        // ClassicEditor.create(document.querySelector("#ckeditor-classic")).then(function (createdEditor) {
        //     editor = createdEditor;
        //     editor.ui.view.editable.element.style.height = "200px";
        // }).catch(function (error) {
        //     console.error(error);
        // });

        ClassicEditor.create(document.querySelector("#ckeditor-classic"), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            },
            removePlugins: ['Image', 'ImageToolbar', 'ImageCaption', 'ImageStyle', 'ImageResize', 'MediaEmbed', 'CKFinder']
            }).then(function (createdEditor) {
                editor = createdEditor;
                editor.ui.view.editable.element.style.height = "200px";
            }).catch(function (error) {
                console.error(error);
        });

        $('#product_add_btn').on('click', function () {
            var formData = new FormData();

            formData.append('title', $('#product-title-input').val());
            formData.append('details', editor.getData());
            formData.append('user_id', '<?= !empty($_SESSION[SES_ADMIN_USER_ID]) ? $_SESSION[SES_ADMIN_USER_ID] : $_SESSION[SES_STAFF_USER_ID] ?>');
            formData.append('categoryId', category_id);
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
            formData.append('productSizeId', $('#product-size-list-input').val());

            $.each($('#file-input')[0].files, function (index, file) {
                formData.append('images[]', file);
            });

            $.each($('#file-input2')[0].files, function (index, file) {
                formData.append('images2[]', file);
            });


            $.ajax({
                url: "<?= base_url('/api/product/add') ?>",
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
                        $('#product-title-input').val(``)
                        editor.setData(``)
                        $('#choices-category-input').val(``)
                        $('#datepicker-publish-input').val(``)
                        $('#product-tags-input').val(``)
                        $('#choices-publish-visibility-input').val(``)
                        $('#choices-publish-status-input').val(``)
                        $('#manufacturer-name-input').val(``)
                        $('#manufacturer-brand-input').val(``)
                        $('#meta-title-input').val(``)
                        $('#meta-keywords-input').val(``)
                        $('#meta-description-input').val(``)
                        $('#product-price-input').val(``)
                        $('#product-discount-input').val(``)
                        // $imageContainer.html(``);
                        // $numOfFiles.html(``);
                        clearImages($("#images"), $("#num-of-files"));
                        clearImages($("#images2"), $("#num-of-files2"));
                        get_size_list()
                        
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

        function get_categories_all() {
            $.ajax({
                url: "<?= base_url('/api/categories') ?>",
                type: "GET",
                beforeSend: function () { },
                success: function (resp) {
                    select_main_category_field = `<div class="card-header">
                                                    <h5 class="card-title mb-0">Product Categories</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                                            New</a>Select product category</p>
                                                    <select class="form-select" id="choices-category-input-${category_id}" name="choices-category-input" onchange="get_sub_category()"
                                                        data-choices="" data-choices-search-false="">

                                                    </select>
                                                </div>
                                                <!-- end card body -->`
                    $('#mainCategories').html(select_main_category_field)
                    let html = '<option disabled selected value="">Select-category</option>'
                    if (resp.status) {
                        $.each(resp.data, function (key, val) {
                            html += `<option value="${val.uid}">${val.name}</option>`
                        })
                    }
                    $('#choices-category-input-'+category_id).html(html)
                },
                error: function (err) {
                    console.log(err)
                }
            })

        }

        function get_size_list() {
            $.ajax({
                url: "<?= base_url('/api/product-size/list') ?>",
                type: "GET",
                beforeSend: function () { },
                success: function (resp) {
                    if (resp.status) {
                        let html = `<option value="">Select-a-size-category</option>`
                        $.each(resp.data, function (key, val) {
                            html += `<option value="${val.uid}">${val.name}</option>`
                        })
                        $('#product-size-list-input').html(html)
                    }
                },
                error: function (err) {
                    console.log(err)
                }
            })

        }

        // function get_categories() {
        //     $.ajax({
        //         url: "<?= base_url('/api/categories') ?>",
        //         type: "GET",
        //         beforeSend: function () { },
        //         success: function (resp) {
        //             let html = '<option value="">Select-category</option>'
        //             if (resp.status) {
        //                 $.each(resp.data, function (key, val) {
        //                     html += `<option value="${val.uid}">${val.name}</option>`
        //                 })
        //             }
        //             $('#choices-category-input').html(html)
        //         },
        //         error: function (err) {
        //             console.log(err)
        //         }
        //     })

        // }

    });

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

    function get_sub_category(parent_id) {
        var selectElement = document.getElementById("choices-category-input-"+category_id);
        var prev_select_id = "choices-category-input-"+category_id
        var parent_id = selectElement.value;
        category_id = parent_id
        // alert(category_id)
        console.log(parent_id)
        $.ajax({
            url: "<?= base_url('/api/categories') ?>",
            type: "GET",
            data: { parent_id: parent_id }, // Add a comma after this line
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    // console.log(resp);
                    document.getElementById(prev_select_id).disabled = true;
                    select_field = `<div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                                New</a>Select product sub-category</p>
                                        <select class="form-select" id="choices-category-input-${category_id}" name="choices-category-input" onchange="get_sub_category()"
                                            data-choices="" data-choices-search-false="">

                                        </select>
                                    </div>
                                    <!-- end card body -->`
                    $('#mainCategories').append(select_field)
                    let html = '<option disabled selected value="">Select-category</option>'
                    $.each(resp.data, function (key, val) {
                            html += `<option value="${val.uid}">${val.name}</option>`
                        })
                    $('#choices-category-input-'+category_id).html(html)
                }else{
                    console.log(resp);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

</script>