<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
  
    $(document).ready(function () {
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

        $('#expart_review_add_btn').on('click', function () {
            var formData = new FormData();

            const radios = document.getElementsByName('rating');
            let checkedValue = '';
            for (const radio of radios) {
                if (radio.checked) {
                    checkedValue = radio.value;
                    break;
                }
            }
            formData.append('productId', $('#selectProduct').val());
            formData.append('userName', $('#userName').val());
            formData.append('review', editor.getData());
            formData.append('rateing', checkedValue);

            $.each($('#file-input')[0].files, function (index, file) {
                formData.append('images[]', file);
            })

            $.ajax({
                url: "<?= base_url('/api/add/expart-review') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#expart_review_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#expart_review_add_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        $('#userName').val(``)
                        editor.setData(``)
                        $imageContainer.html(``);
                        $numOfFiles.html(``);
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
                    $('#expart_review_add_btn').html(`submit`)
                    $('#expart_review_add_btn').attr('disabled', false)
                }
            })
        })

    });

    $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            beforeSend: function () {
                $('#table-product-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_product_count').html(resp.data.length)
                        let html = `<option value="">Select-a-product</option>`
                        console.log(resp)
                        $.each(resp.data, function (index, product) {
                            // let product_img = product.product_img.length > 0 ? product.product_img[0]['src'] : ''
                            html += ` <option value="${product.product_id}">${product.name}</option>`
                        })
                        $('#selectProduct').html(html)
                    }
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
</script>