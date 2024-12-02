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

        $('#banner_update_btn').on('click', function () {
            
            var currentUrl = window.location.href;
            var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            var bannerId = urlParams.get('banner_id');
            var formData = new FormData();

            formData.append('bannerTitle', $('#bannerTitle').val());
            formData.append('bannerDescription', editor.getData());
            formData.append('bannerLink', $('#bannerLink').val());
            formData.append('banner_id', bannerId);
            

            $.each($('#file-input')[0].files, function (index, file) {
                formData.append('images[]', file);
            })
            formData.forEach(function(value, key){
                console.log(key + ": " + value);
            });
            $.ajax({
                url: "<?= base_url('/api/update/banner') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#banner_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#banner_update_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            // get_banner()
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
                    $('#banner_update_btn').html(`submit`)
                    $('#banner_update_btn').attr('disabled', false)
                }
            })
        })

        
        // function get_banner(){
            var currentUrl = window.location.href;
            var urlParams = new URLSearchParams(currentUrl.split('?')[1]);
            var bannerId = urlParams.get('banner_id');
            $.ajax({
                url: "<?= base_url('/api/banner/update') ?>",
                type: "GET",
                data:{banner_id:bannerId},
                success: function (resp) {
                    if (resp.status) {
                    console.log(resp)
                    $('#bannerTitle').val(resp.data.title)
                    $('#bannerLink').val(resp.data.link)
                      editor.setData(resp.data.description);
                    $('#images').html(`<img src="<?= base_url('public/uploads/banner_images/') ?>${resp.data.img}" alt="">`)
                    
                    }else{
                        console.log(resp)
                    }
                },
                error: function (err) {
                    console.log(err)
                },
            })
        // }
    });


        
</script>