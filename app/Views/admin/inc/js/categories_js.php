<!-- Modal Js -->
<script src="assets/js/pages/modal.init.js"></script>
<script>
    // Call the function to fetch and display categories
    get_parent_categories();


    function preview(file_input, images_con) {
        let $fileInput = $(`#${file_input}`);
        let $imageContainer = $(`#${images_con}`);

        $imageContainer.html("");
        $.each($fileInput[0].files, function (index, file) {
            let reader = new FileReader();
            let $figure = $("<figure>");
            reader.onload = function () {
                let $img = $("<img>").attr("src", reader.result).attr("class", "cat-img");
                $figure.prepend($img);
            }
            $imageContainer.append($figure);
            reader.readAsDataURL(file);
        });
    }

    function get_parent_categories() {
        $.ajax({
            url: '<?= base_url('/api/categories') ?>',
            type: "GET",
            beforeSend: function () {
                $('#accordion').html(`<center><div class="spinner-border text-primary" role="status"></div></center>`)
            },
            success: function (resp) {

                let html = ''
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $.each(resp.data, (index, category) => {
                            html += `<div class="accordion-item" id="${category.uid}-category-id">
                                        <h2 class="accordion-header" id="${category.uid}-category-id-heading">
                                            <input 
                                                type="text" 
                                                class="form-control fs-15" 
                                                disabled 
                                                value="${category.name}" 
                                                id="${category.uid}-category-input"
                                            >
                                            <input type="file" id="file-input-${category.uid}" class="file-input-cat-image" onChange="preview('file-input-${category.uid}','${category.uid}-img-con')">
                                            <label for="file-input-${category.uid}" id="btn_upload_${category.uid}" class="btn btn-info btn-uplode-img file-input-cat-image-btn hide-cat-img">update Image</label>
                                            <div id="${category.uid}-img-con">
                                                <img class="cat-img" src="<?= base_url('public/uploads/category_images/') ?>${category.img_path}" />
                                            </div>
                                            <button 
                                                class="btn btn-success" 
                                                id="${category.uid}-save-category-btn" 
                                                onclick="save_category('${category.uid}','${category.uid}-category-input','${category.uid}-save-category-btn','btn_upload_${category.uid}','file-input-${category.uid}','${category.uid}-img-con')" 
                                                hidden>
                                                <i class="ri-save-line fs-15"></i>
                                            </button>
                                            <button 
                                                class="btn btn-info" 
                                                id="${category.uid}-update-category-btn" 
                                                onclick="update_category('${category.uid}-category-input','${category.uid}-save-category-btn','btn_upload_${category.uid}')">
                                                <i class="ri-edit-line fs-15"></i>
                                            </button>
                                            <button 
                                                class="btn btn-danger" 
                                                id="${category.uid}-delete-category-btn"
                                                onclick="delete_category('${category.uid}','${category.uid}-category-id')">
                                                <i class="ri-delete-bin-line fs-15"></i>
                                            </button>
                                            <button 
                                                class="accordion-button collapsed fs-15 fw-500" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#${category.uid}-collapse" 
                                                aria-expanded="false" 
                                                aria-controls="${category.uid}-collapse-accordion-body-id" 
                                                onclick="getSubCategory('${category.uid}','${category.uid}-collapse-accordion-body-id')">
                                            </button>
                                        </h2>
                                        <div 
                                            id="${category.uid}-collapse" 
                                            class="accordion-collapse collapse" 
                                            aria-labelledby="${category.uid}-category-id-heading"
                                            data-bs-parent="#${category.uid}-category-id">
                                            <div class="collapse-accordion-body" id="${category.uid}-collapse-accordion-body-id">

                                                

                                            </div>
                                        </div>
                                    </div>`
                        })

                    }

                }
                html += `<div class="accordion-item" id="new-category-bx">
                            <h2 class="accordion-header">
                                <input type="text" class="form-control fs-15" id="new-category-input">
                                <input type="file" id="file-input-new" class="file-input-cat-image"  onChange="preview('file-input-new','images-con-new')">
                                <label for="file-input-new" id="btn_upload" class="btn btn-info file-input-cat-image-btn">Select Image</label>
                                <div id="images-con-new"></div>
                                <button class="btn btn-success" id="new-category-btn" onclick="add_category('null','new-category-input','new-category-btn','new-category-bx','file-input-new','images-con-new')">
                                    <i class="ri-add-fill fs-15"></i>
                                </button>
                            </h2>
                        </div>`
                $('#accordion').html(html)


            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function getSubCategory(category_id, accordion_body_id) {

        $.ajax({
            url: '<?= base_url('/api/categories') ?>',
            data: {
                parent_id: category_id
            },
            type: "GET",
            beforeSend: function () {
                $(`#${accordion_body_id}`).html(`<center><div class="spinner-border text-primary" role="status"></div></center>`)
            },
            success: function (resp) {
                console.log(resp)
                html = ''

                if (resp.status) {
                    if (resp.data.length > 0) {
                        $.each(resp.data, (index, category) => {
                            html += `<div class="accordion-item" id="${category.uid}-category-id"  >
                                        <h2 class="accordion-header" id="${category.uid}-category-id-heading">
                                            <input 
                                                type="text" 
                                                class="form-control fs-15" 
                                                disabled 
                                                value="${category.name}" 
                                                id="${category.uid}-category-input"
                                            >
                                            <input type="file" id="file-input-${category.uid}" class="file-input-cat-image" onChange="preview('file-input-${category.uid}','${category.uid}-img-con')">
                                            <label for="file-input-${category.uid}" id="btn_upload_${category.uid}" class="btn btn-info btn-uplode-img file-input-cat-image-btn hide-cat-img">update Image</label>
                                            <div id="${category.uid}-img-con">
                                                <img class="cat-img" src="<?= base_url('public/uploads/category_images/') ?>${category.img_path}" />
                                            </div>
                                            <button 
                                                class="btn btn-success" 
                                                id="${category.uid}-save-category-btn" 
                                                onclick="save_category('${category.uid}','${category.uid}-category-input','${category.uid}-save-category-btn','btn_upload_${category.uid}','file-input-${category.uid}','${category.uid}-img-con')" 
                                                hidden>
                                                <i class="ri-save-line fs-15"></i>
                                            </button>
                                            <button 
                                                class="btn btn-info" 
                                                id="${category.uid}-update-category-btn" 
                                                onclick="update_category('${category.uid}-category-input','${category.uid}-save-category-btn','btn_upload_${category.uid}')">
                                                <i class="ri-edit-line fs-15"></i>
                                            </button>
                                            <button 
                                                class="btn btn-danger" 
                                                id="${category.uid}-delete-category-btn"
                                                onclick="delete_category('${category.uid}','${category.uid}-category-id')">
                                                <i class="ri-delete-bin-line fs-15"></i>
                                            </button>
                                            <button 
                                                class="accordion-button collapsed fs-15 fw-500" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#${category.uid}-collapse" 
                                                aria-expanded="false" 
                                                aria-controls="${category.uid}-collapse-accordion-body-id" 
                                                onclick="getSubCategory('${category.uid}','${category.uid}-collapse-accordion-body-id')">
                                            </button>
                                        </h2>
                                        <div 
                                            id="${category.uid}-collapse" 
                                            class="accordion-collapse collapse" 
                                            aria-labelledby="${category.uid}-category-id-heading"
                                            data-bs-parent="#${category.uid}-category-id">
                                            <div class="collapse-accordion-body" id="${category.uid}-collapse-accordion-body-id">

                                                

                                            </div>
                                        </div>
                                    </div>`
                        })
                    }

                }

                html += `<div class="accordion-item" id="${category_id}-new-category-bx"  >
                            <h2 class="accordion-header">
                                <input type="text" class="form-control fs-15" id="${category_id}-new-category-input">
                                <input type="file" id="file-input-sub-${category_id}" class="file-input-cat-image"  onChange="preview('file-input-sub-${category_id}','images-con-sub-${category_id}')">
                                <label for="file-input-sub-${category_id}" id="btn_upload" class="btn btn-info file-input-cat-image-btn">Select Image</label>
                                <div id="images-con-sub-${category_id}"></div>
                                <button class="btn btn-success" id="${category_id}-new-category-btn" onclick="add_category('${category_id}','${category_id}-new-category-input','${category_id}-new-category-btn','${category_id}-new-category-bx','file-input-sub-${category_id}','images-con-sub-${category_id}')">
                                    <i class="ri-add-fill fs-15"></i>
                                </button>
                            </h2>
                        </div>`
                $(`#${accordion_body_id}`).html(html)
            },
            error: function (err) {
                console.log(err);

            }

        })


    }

    function delete_category_action() {
        let category_id = $('#delete_cat_id').val()
        let bx = $('#delete_cat_bx').val()



        $.ajax({
            url: '<?= base_url('/api/category/delete') ?>',
            type: 'POST',
            data: {
                category_id: category_id
            },
            beforeSend: function () {
                $(`#delete_action_btn`).attr('disabled', true)
                $(`#delete_action_btn`).html(`<center><div class="spinner-border text-light" style='height: 20px; width: 20px;' role="status"></div></center>`)
            },
            success: function (resp) {
                if (resp.status) {
                    $(`#${bx}`).hide()
                }
                $('#delete_modal').hide();
                $(`#delete_action_btn`).attr('disabled', false)
                $(`#delete_action_btn`).html('DELETE')
            },
            error: function (err) {
                console.log(err);
                $(`#delete_action_btn`).attr('disabled', false)
                $(`#delete_action_btn`).html('DELETE')
            }

        })

    }

    function delete_category(category_id, category_bx) {
        console.log(category_bx)
        $('#delete_modal').show();
        $('#delete_cat_id').val(category_id)
        $('#delete_cat_bx').val(category_bx)
    }

    function hide_delete_modal() {
        $('#delete_modal').hide();
        $('#delete_cat_id').val('')
        $('#delete_cat_bx').val('')
    }

    function add_category(parent_id, input_id, btn_id, bx, file_id, images_con) {

        if ($(`#${file_id}`)[0].files.length == 0) {
            html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Select Category Image
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
            $('#alert').html(html)
        } else if ($(`#${input_id}`).val() == '') {
            html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Add Category Name
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
            $('#alert').html(html)
        } else {
            var formData = new FormData();
            let category_name = $(`#${input_id}`).val()
            $.each($(`#${file_id}`)[0].files, function (index, file) {
                formData.append('images[]', file);
            })
            formData.append('parent_id', parent_id);
            formData.append('category_name', category_name);
            $.ajax({

                url: "<?= base_url('/api/category/add') ?>",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(`#${btn_id}`).attr('disabled', true)
                    $(`#${btn_id}`).html(`<center><div class="spinner-border text-light" style='height: 20px; width: 20px;' role="status"></div></center>`)
                },
                success: function (resp) {
                    console.log(resp)
                    if (resp.status) {
                        let category = resp.data
                        $(`#${bx}`).before(`<div class="accordion-item" id="${category.uid}-category-id"  >
                                            <h2 class="accordion-header" id="${category.uid}-category-id-heading">
                                                <input 
                                                    type="text" 
                                                    class="form-control fs-15" 
                                                    disabled 
                                                    value="${category.name}" 
                                                    id="${category.uid}-category-input"
                                                >
                                                <input type="file" id="file-input-${category.uid}" class="file-input-cat-image" onChange="preview('file-input-${category.uid}','${category.uid}-img-con')">
                                                <label for="file-input-${category.uid}" id="btn_upload_${category.uid}" class="btn btn-info btn-uplode-img file-input-cat-image-btn hide-cat-img">update Image</label>
                                                <div id="${category.uid}-img-con">
                                                    <img class="cat-img" src="<?= base_url('public/uploads/category_images/') ?>${category.img_path}" />
                                                </div>
                                                <button 
                                                    class="btn btn-success" 
                                                    id="${category.uid}-save-category-btn" 
                                                    onclick="save_category('${category.parent_id}','${category.uid}-category-input','${category.uid}-save-category-btn','btn_upload_${category.uid}','file-input-${category.uid}','${category.uid}-img-con')" 
                                                    hidden>
                                                    <i class="ri-save-line fs-15"></i>
                                                </button>
                                                <button 
                                                    class="btn btn-info" 
                                                    id="${category.uid}-update-category-btn" 
                                                    onclick="update_category('${category.uid}-category-input','${category.uid}-save-category-btn','btn_upload_${category.uid}')">
                                                    <i class="ri-edit-line fs-15"></i>
                                                </button>
                                                <button 
                                                    class="btn btn-danger" 
                                                    id="${category.uid}-delete-category-btn"
                                                    onclick="delete_category('${category.uid}-category-input','${category.uid}-category-id')">
                                                    <i class="ri-delete-bin-line fs-15"></i>
                                                </button>
                                                <button 
                                                    class="accordion-button collapsed fs-15 fw-500" 
                                                    type="button" 
                                                    data-bs-toggle="collapse" 
                                                    data-bs-target="#${category.uid}-collapse" 
                                                    aria-expanded="false" 
                                                    aria-controls="${category.uid}-collapse-accordion-body-id" 
                                                    onclick="getSubCategory('${category.uid}','${category.uid}-collapse-accordion-body-id')">
                                                </button>
                                            </h2>
                                            <div 
                                                id="${category.uid}-collapse" 
                                                class="accordion-collapse collapse" 
                                                aria-labelledby="${category.uid}-category-id-heading"
                                                data-bs-parent="#${category.uid}-category-id">
                                                <div class="collapse-accordion-body" id="${category.uid}-collapse-accordion-body-id">
    
                                                </div>
                                            </div>
                                        </div>`);
                        $(`#${input_id}`).val('')
                    }
                    $(`#${btn_id}`).html(`<i class="ri-add-fill fs-15"></i>`)
                    $(`#${btn_id}`).attr('disabled', false)
                    $(`#${images_con}`).html('')
                },
                error: function (err) {
                    // console.log(err);
                    $(`#${btn_id}`).html(`<i class="ri-add-fill fs-15"></i>`)
                    $(`#${btn_id}`).attr('disabled', false)
                    $(`#${images_con}`).html('')
                }
            })
        }


    }

    function update_category(input_id, save_btn_id, update_btn_id) {
        $('#' + input_id).attr('disabled', false);
        $('#' + input_id).focus();
        $('#' + save_btn_id).attr('hidden', false);
        $('#' + update_btn_id).removeClass('hide-cat-img')
    }

    function save_category(category_id, input_id, save_btn_id, img_btn_id, file_input_id, img_con) {

        console.log(category_id)
        console.log(input_id)
        console.log(save_btn_id)
        console.log(img_btn_id,)
        console.log(file_input_id)
        console.log(img_con)
       

        if ($(`#${input_id}`).val() == '') {
            html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Add Category Name
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
            $('#alert').html(html)
        } else {
            var formData = new FormData();

            formData.append('category_id', category_id);
            formData.append('name', $(`#${input_id}`).val());

            if ($(`#${file_input_id}`)[0].files.length != 0) {
                $.each($(`#${file_input_id}`)[0].files, function (index, file) {
                    formData.append('images[]', file);
                })
            }

            $.ajax({
                url: '<?= base_url('/api/category/update') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#' + save_btn_id).html(`<center><div class="spinner-border text-light" style='height: 20px; width: 20px;' role="status"></div></center>`);
                    $('#' + save_btn_id).attr('disabled', true);
                },
                success: function (resp) {
                    $('#' + save_btn_id).html(`<i class="ri-save-line fs-15"></i>`);
                    $('#' + input_id).attr('disabled', true);
                    $('#' + save_btn_id).attr('hidden', true);
                    $('#' + save_btn_id).attr('disabled', false);
                    $('#' + img_btn_id).addClass('hide-cat-img')
                },
                error: function (err) {
                    console.log(err);
                    $('#' + save_btn_id).html(`<i class="ri-save-line fs-15"></i>`);
                    $('#' + input_id).attr('disabled', true);
                    $('#' + save_btn_id).attr('hidden', true);
                    $('#' + save_btn_id).attr('disabled', false);
                    $('#' + img_btn_id).addClass('hide-cat-img')
                }

            })
        }

    }
</script>