
<script>
    user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'


    if (user_id != '') {
        load_orders()
    }



    function load_orders() {
        $.ajax({
            url: '<?= base_url('/api/user/orders') ?>',
            type: 'GET',
            data: {
                user_id: user_id
            },
            beforeSend: function () {

            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    resp.data.reverse()


                    html = ``
                    $.each(resp.data, function (index, item) {
                        var dateString = item.created_at;
                        var date = new Date(dateString);
                        var options = {
                            year: 'numeric',
                            month: 'short',
                            day: '2-digit',
                            hour12: false,
                            timeZone: 'Asia/Kolkata'
                        };
                        var formattedDate = date.toLocaleString('en-IN', options);
                        html += ` <tr onClick="open_order('${item.order_id}')" class="tr_order">
                                    <td>
                                        <span class="text-body">${item.order_id}</span>
                                    </td>
                                    <td><span class="text-muted">${formattedDate}</span></td>
                                    <td class="fw-medium">₹ ${item.total}</td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info ">${item.order_status.toUpperCase()}</span>
                                    </td>
                                    <td>
                                        <a href="#invoiceModal" data-bs-toggle="modal" class="btn btn-secondary btn-sm">Invoice</a>
                                    </td>
                                </tr>`
                    })
                    $('#orders_tb_body').html(html);
                }

            },
            error: function (err) {
                console.log(err)
            }
        })
    }


    function open_order(uid){

        window.location.href = `<?= base_url('/order/track?o_id=')?>${uid}`

    }


</script>