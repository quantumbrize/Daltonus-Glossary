<script>


    load_discount_table()
    function load_discount_table() {
        $.ajax({
            url: '<?= base_url('/api/discounts') ?>',
            type: "GET",
            beforeSend: function () {
                $('#table-discounts-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                console.log(resp);
                if (resp.status == 1) {
                    if (resp.data.length > 0) {
                        let html = ''
                        $.each(resp.data, function (index, item) {
                            html += `<tr>
                                        <td style="text-align: center;">
                                            ${item.name}
                                        </td>
                                        <td style="text-align: center;">
                                            ${item.minimum_purchase}
                                        </td>
                                        <td style="text-align: center;">
                                            ${item.discount_percentage}
                                        </td>
                                        <td style="text-align: center;">
                                            <sapn class="badge bg-success-subtle text-success text-uppercase"> ${item.status}</sapn>
                                        </td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-danger" id="dlt-${item.uid}" onClick="delete_dis('${item.uid}')">
                                            <i class="ri ri-delete-bin-line"></i>
                                            </button>
                                        </td>
                                    </tr>`

                        })

                        $('#table-discounts-list-all-body').html(html)
                        $('#table-discounts-list-all').DataTable();
                    }
                } else {
                    $('#table-discounts-list-all-body').html(`<tr >
                        <td>
                            DATA NOT FOUND!
                        </td>
                    </tr>`)
                }
            },
            error: function (err) {
                console.log(err)
            }

        })

    }


    function delete_dis(uid){

        $.ajax({
            url: '<?= base_url('/api/discounts/delete') ?>',
            type: "GET",
            data: {
                d_id : uid,
            },
            beforeSend: function(){
                $(`#dlt-${uid}`).html(`<div class="spinner-border" role="status"></div>`)
            },
            success: function(resp){
                if (resp.status == true) {
                        $('#alert').html(`<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i>Discount Deleted
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`)
                    } else {
                        $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal server Error
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`)
                    }
                    $(`#dlt-${uid}`).html(`<i class="ri ri-delete-bin-line"></i>`)
                    load_discount_table();
            },
            error: function(err){
                console.log(err)
                $(`#dlt-${uid}`).html(`<i class="ri ri-delete-bin-line"></i>`)
            }

        })

    }




</script>