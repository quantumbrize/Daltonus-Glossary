<script>
  
    $(document).ready(function () {

        get_promotion_card()

        $('#card_update_btn').on('click', function () {

            var formData = new FormData();

            formData.append('link1', $('#imgLink1').val());
            formData.append('link2', $('#imgLink2').val());
            formData.append('card_id', $('#card_id').val());
            

            $.each($('#file-input1')[0].files, function (index, file) {
                formData.append('images1[]', file);
            })
            $.each($('#file-input2')[0].files, function (index, file) {
                formData.append('images2[]', file);
            })
            formData.forEach(function(value, key){
                console.log(key + ": " + value);
            });
            $.ajax({
                url: "<?= base_url('/api/update/promotion-card') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#card_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#card_update_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            get_promotion_card()
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
                    $('#card_update_btn').html(`submit`)
                    $('#card_update_btn').attr('disabled', false)
                }
            })
        })

        
        
    });

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
    $("#file-input1").change(preview($("#file-input1"), $("#images1"), $("#num-of-files1")));
    $("#file-input2").change(preview($("#file-input2"), $("#images2"), $("#num-of-files2")));


    function get_promotion_card(){
        $.ajax({
            url: "<?= base_url('/api/promotion-card/update') ?>",
            type: "GET",
            success: function (resp) {
                if (resp.status) {
                    console.log(resp)
                
                $('#images1').html(`<img src="<?= base_url('public/uploads/promotion_card_images/') ?>${resp.data.img1}" alt="" style="max-width: 500px; max-height: 500px;">`)
                $('#imgLink1').val(resp.data.link1)
                $('#images2').html(`<img src="<?= base_url('public/uploads/promotion_card_images/') ?>${resp.data.img2}" alt="" style="max-width: 500px; max-height: 500px;">`)
                $('#imgLink2').val(resp.data.link2)
                $('#card_id').val(resp.data.uid)
                
                }else{
                    console.log(resp)
                }
            },
            error: function (err) {
                console.log(err)
            },
        })
    }

        
</script>