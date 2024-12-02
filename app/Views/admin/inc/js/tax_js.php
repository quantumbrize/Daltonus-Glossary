<!-- CKEditor CDN -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> -->
<script>
   
    $(document).ready(function () {

        $('#tax_update_btn').on('click', function () {
            var formData = new FormData();

            formData.append('gst', $('#gst').val());
            formData.append('tax', $('#tax').val());
            formData.append('delivary_charge', $('#delivary_charge').val());
            formData.append('tax_id', $('#tax_id').val());
            

            // formData.forEach(function(value, key){
            //     console.log(key + ": " + value);
            // });
            $.ajax({
                url: "<?= base_url('/api/update/tax') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#tax_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#tax_update_btn').attr('disabled', true)

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
                    $('#tax_update_btn').html(`submit`)
                    $('#tax_update_btn').attr('disabled', false)
                }
            })
        })

    });

    $.ajax({
        url: "<?= base_url('/api/taxes') ?>",
        type: "GET",
        success: function (resp) {
            if (resp.status) {
            console.log(resp)
            $('#gst').val(resp.data.gst)
            $('#tax').val(resp.data.tax)
            $('#delivary_charge').val(resp.data.delivary_charge)
            $('#tax_id').val(resp.data.uid)
            
            }else{
                console.log(resp)
            }
        },
        error: function (err) {
            console.log(err)
        },
    })
        
</script>