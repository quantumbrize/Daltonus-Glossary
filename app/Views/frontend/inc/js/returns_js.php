<script>

    get_uers_returns()


    function get_uers_returns() {


        $.ajax({
            url: '<?= base_url('/api/order/returns') ?>',
            type: "GET",
            data: {
                user_id: '<?= $_COOKIE[SES_USER_USER_ID] ?>',
            },
            beforeSend: function () {},
            success: function (resp) {
                console.log(resp)
                if(resp.status){
                    let html = ``
                    $.each(resp.data, function(index,item){
                        html += `<tr class="tr_return">
                                    <td>${item.order_id}</td>
                                    <td>${item.request_date}</td>
                                    <td>${item.total}</td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info  fs-11">
                                            ${item.status.toUpperCase()}
                                        </span>
                                    </td>
                                </tr>`
                    })
                    $('#return_tb_body').html(html)
                }
            },
            error: function (err) {
                console.error(err)
            }

        })

    }

</script>