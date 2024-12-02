<script>
    $('#dis_add_btn').on('click', function () {
        let title = $('#dis_title').val()
        let minPurchase = $('#min_pur').val()
        let discount = $('#dis_per').val()

        if (title.length < 1) {
            $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Add A Title
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`)
        } else if (minPurchase.length < 1) {
            $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Add Minimum Purchase Value
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`)
        } else if (discount.length < 1) {
            $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Please Add Discount Percentage
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`)
        } else {
            $.ajax({
                url: "<?= base_url('/api/discounts/add') ?>",
                type: 'POST',
                data: {
                    title: title,
                    minPurchase: minPurchase,
                    discount: discount
                },
                beforeSend: function () {
                    $('#dis_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                },
                success: function (resp) {
                    if (resp.status == true) {
                        $('#alert').html(`<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i>Discount Added
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`)
                            $('#dis_title').val('')
                            $('#min_pur').val('')
                            $('#dis_per').val('')
                    } else {
                        $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal server Error
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`)
                    }
                    $('#dis_add_btn').html(`Submit`)
                },
                error: function (err) {
                    console.log(err)
                    $('#dis_add_btn').html(`Submit`)
                }


            })
        }


    })

</script>