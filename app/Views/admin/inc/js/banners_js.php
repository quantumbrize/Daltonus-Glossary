<script>
    $(document).ready(function() {
        load_banners()
    });

    function load_banners() {
        $.ajax({
            url: "<?= base_url('/api/banners') ?>",
            type: "GET",
            beforeSend: function () {
                $('#table-banner-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_banner_count').html(resp.data.length)
                        let html = ``
                        console.log(resp)
                        $.each(resp.data, function (index, banner) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            html += `<tr>
                                            <td >
                                                <p>${banner.title.slice(0, 15) + (banner.title.length > 15 ? '...' : '')}</p>
                                                <img src="<?= base_url('public/uploads/banner_images/') ?>${banner.img}" alt="" class="product-img">
                                            </td>
                                            <td >
                                                ${banner.title}
                                            </td>
                                            <td >
                                                ${banner.description}
                                            </td>
                                            <td >
                                                ${banner.link}
                                            </td>
                                            <td >
                                                <a class="btn btn-info" id="update-banner-btn" href="<?= base_url()?>admin/banners/update?banner_id=${banner.uid}">
                                                    <i class="ri-edit-line fs-15"></i>
                                                </a>
                                            </td>
                                            <td >
                                                <button class="btn btn-danger" id="${banner.uid}-delete-banner-btn" onclick="delete_banner('${banner.uid}')">
                                                    <i class="ri-delete-bin-line fs-15"></i>
                                                </button>
                                            </td>

                                        </tr>`
                        })
                        $('#table-banner-list-all-body').html(html)
                        $('#table-banner-list-all').DataTable();
                    }
                }else{
                    $('#table-banner-list-all-body').html(`<tr >
                        <td>
                            DATA NOT FOUND!
                        </td>
                    </tr>`)
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

    function delete_banner(banner_id){
        // alert(banner_id)
        $.ajax({
            url: "<?= base_url('/api/banner/delete') ?>",
            type: "GET",
            data:{banner_id:banner_id},
            beforeSend: function () {
                $('#'+banner_id+'-delete-banner-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+banner_id+'-delete-banner-btn').attr('disabled', true)
            },
            success: function (resp) {
                var html = ""
                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }else{
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                }
                $('#alert').html(html)
                load_banners()
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#'+banner_id+'-delete-banner-btn').html(`submit`)
                $('#'+banner_id+'-delete-banner-btn').attr('disabled', false)
            }
        })
    }
</script>