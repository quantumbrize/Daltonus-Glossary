<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    load_orders()

    function load_orders() {
        $.ajax({
            url: '<?= base_url('/api/orders') ?>',
            type: 'GET',
            beforeSend: function () {
                $('#order_table_body').html(`<tr><td colspan="6" align="center"><div  class="spinner-border" role="status"></div></td><tr>`)
            },
            success: function (resp) {
                if (resp.status) {



                    let html = ``
                    $.each(resp.data, function (index, item) {
                        // Input date string
                        var dateString = item.created_at;


                        // Parse the date string into a Date object
                        var date = new Date(dateString);

                        // Define months array for formatting
                        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                        // Get hours and minutes
                        var hours = date.getHours();
                        var minutes = date.getMinutes();

                        // Determine AM/PM indicator and convert to 12-hour format
                        var ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // Handle midnight (0 hours)

                        // Format the date
                        var formattedDate =
                            ('0' + date.getDate()).slice(-2) + ' ' +  // Day with leading zero
                            months[date.getMonth()] + ', ' +          // Month abbreviation
                            date.getFullYear() + ', ' +               // Year
                            ('0' + hours).slice(-2) + ':' +           // Hours with leading zero
                            ('0' + minutes).slice(-2) + ' ' +         // Minutes with leading zero
                            ampm;                                     // AM/PM indicator
                            
                        html += `<tr onClick="open_order('${item.order_id}')" class="order_tr">
                                    <td>${item.order_id}</td>
                                    <td>${item.user_name}</td>
                                    <td>${formattedDate}</td>
                                    <td>${item.total}</td>
                                    <td>${item.payment_type}</td>
                                    <td>
                                        <span class="badge bg-warning-subtle text-warning text-uppercase">${item.order_status}</span>
                                    </td>
                                </tr>`
                    })
                    $('#order_table_body').html(html)
                    $('#order_table').DataTable({
                        columnDefs: [
                            { type: 'date', targets: 2 },
                        ],
                        "order": [[2, "desc"]],
                    });
                }else{
                    $('#order_table_body').html('<tr><td colspan="6" align="center"><h4>No Orders Found</h4></td><tr>')
                }

            },
            error: function (err) {
                console.error(err)
            }

        })

    }

    function open_order(order_id) {
        window.location.href = `<?= base_url('/admin/user/order?o_id=') ?>${order_id}`;
    }



</script>