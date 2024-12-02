<script>

    get_returns()


    function get_returns() {


        $.ajax({
            url: '<?= base_url('/api/order/returns') ?>',
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let html = ``
                    resp.data.sort((a, b) => {
                        const dateA = new Date(a.request_date);
                        const dateB = new Date(b.request_date);
                        return dateB - dateA;
                    });
                    $.each(resp.data, function (index, item) {
                        // Input date string
                        var dateString = item.request_date;


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
                            ampm;

                        html += `<tr class="tr_return" onclick="open_single_return('${item.return_id}','${item.order_id}')">
                                    <td>${item.order_id}</td>
                                    <td>${item.user_name}</td>
                                    <td>${formattedDate}</td>
                                    <td>${item.total}</td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info  fs-11">
                                            ${item.status.toUpperCase()}
                                        </span>
                                    </td>
                                </tr>`
                    })
                    $('#returns_table_body').html(html)
                    $('#returns_table').DataTable();
                }
            },
            error: function (err) {
                console.error(err)
            }

        })
    }


    function open_single_return(r_id,o_id) {
        window.location.href = `<?= base_url('/admin/orders/returns/details?r_id=') ?>${r_id}&o_id=${o_id}`;
    }


</script>