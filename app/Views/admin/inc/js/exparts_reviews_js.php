<script>
    $(document).ready(function() {
        load_all_messages()
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function load_all_messages() {
        $.ajax({
            url: "<?= base_url('/api/exparts-review') ?>",
            type: "GET",
            beforeSend: function () {
                $('#table-banner-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_banner_count').html(resp.data.length)
                        let html = ``
                        console.log(resp)
                        $.each(resp.data, function (index, rev) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            html += `<tr>
                                            <td>
                                                ${index+1}
                                            </td>
                                            <td>
                                                ${rev.product_name}
                                            </td>
                                            <td>
                                                ${rev.rateing}
                                            </td>
                                            <td>
                                                ${rev.review}
                                            </td>
                                            <td>
                                                ${rev.user_name}
                                            </td>
                                            <td>
                                                <img src="<?= base_url('public/uploads/user_images/') ?>${rev.user_img}" alt="" class="product-img">
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" id="${rev.expart_review_id}-delete-review-btn" onclick="delete_banner('${rev.expart_review_id}')">
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

    function delete_banner(er_id){
        $.ajax({
            url: "<?= base_url('/api/delete/expart-review') ?>",
            type: "GET",
            data:{er_id:er_id},
            beforeSend: function () {
                $('#'+er_id+'-delete-review-btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#'+er_id+'-delete-review-btn').attr('disabled', true)
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
                load_all_messages()
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#'+er_id+'-delete-review-btn').html(`submit`)
                $('#'+er_id+'-delete-review-btn').attr('disabled', false)
            }
        })
    }

    // function delete_live_class(live_class_id){
    //     // alert(banner_id)
    //     $.ajax({
    //         url: "<?= base_url('/api/delete/live-class') ?>",
    //         type: "GET",
    //         data:{live_class_id:live_class_id},
    //         beforeSend: function () {
    //             $('#'+live_class_id+'-delete-banner-btn').html(`<div class="spinner-border" role="status"></div>`)
    //             $('#'+live_class_id+'-delete-banner-btn').attr('disabled', true)
    //         },
    //         success: function (resp) {
    //             var html = ""
    //             if (resp.status) {
    //                 html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
    //                             <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
    //                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                         </div>`
    //             }else{
    //                 html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
    //                             <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
    //                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                         </div>`
    //             }
    //             $('#alert').html(html)
    //             load_live_classes()
    //         },
    //         error: function (err) {
    //             console.log(err)
    //         },
    //         complete: function () {
    //             $('#'+live_class_id+'-delete-banner-btn').html(`submit`)
    //             $('#'+live_class_id+'-delete-banner-btn').attr('disabled', false)
    //         }
    //     })
    // }
</script>