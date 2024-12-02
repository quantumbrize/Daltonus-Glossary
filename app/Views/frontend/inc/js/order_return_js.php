<script>
    lode_order();


    $('#return_btn').on('click', function () {

        let reason = $('#reason_inp').val()
        $.ajax({
            url: '<?= base_url('/api/order/return') ?>',
            type: 'GET',
            data: {
                o_id: '<?= $_GET['o_id'] ?>',
                reason: reason
            },
            beforeSend: function(){},
            success:function(resp){
                if(resp.status){
                    Toastify({
                        text: resp.message.toUpperCase(),
                        duration: 3000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background: resp.status ? 'darkgreen' : 'darkred',
                        },
                    }).showToast();
                    // Redirect after 2 seconds
                    setTimeout(function () {
                        window.location.href = `<?= base_url('/order/returns')?>`;
                    }, 2000);
                }
            },
            error: function(err){
                console.error(err)
            }
        })

    })


    function lode_order() {
        $.ajax({
            url: '<?= base_url('/api/order') ?>',
            type: 'GET',
            data: {
                o_id: '<?= $_GET['o_id'] ?>'
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let order = resp.data
                    var dateString = order.created_at;
                    // Parse the date string into a Date object
                    var date = new Date(dateString);
                    // Options for formatting the date
                    var options = {
                        year: 'numeric',
                        month: 'long',
                        day: '2-digit',
                        hour12: false, // Display hours in 24-hour format
                        timeZone: 'Asia/Kolkata' // Set time zone to Indian Standard Time (IST)
                    };
                    // Format the date in IST as "01 Jan, 2023"
                    var formattedDate = date.toLocaleString('en-IN', options);


                    $('#order_details_bx').html(`<div class="col-lg-3 col-6">
                            <p class="text-muted mb-2 text-uppercase fw-medium fs-12">Order ID</p>
                            <h5 class="fs-14 mb-0"><span id="invoice-no">${order.order_id}</span></h5>
                        </div>
                        <div class="col-lg-3 col-6">
                            <p class="text-muted mb-2 text-uppercase fw-medium fs-12">Date</p>
                            <h5 class="fs-14 mb-0"><span id="invoice-date">${formattedDate}</sapn></h5>
                        </div>
                        <div class="col-lg-3 col-6">
                            <p class="text-muted mb-2 text-uppercase fw-medium fs-12">Payment Status</p>
                            <span class="badge bg-warning-subtle text-warning  fs-11" id="payment-status">${order.payment.status}</span>
                        </div>
                        <div class="col-lg-3 col-6">
                            <p class="text-muted mb-2 text-uppercase fw-medium fs-12">Total Amount</p>
                            <h5 class="fs-14 mb-0">₹<span id="total-amount">${order.total}</span></h5>
                        </div>`)

                    let product_html = ``
                    $.each(order.products, function (index, item) {
                        product_html += `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-secondary-subtle rounded-3">
                                                    <img 
                                                        src="<?= base_url('public/uploads/product_images/') ?>${item.product_details.product_img[0].src}" 
                                                        alt="" 
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6>${item.product_details.name}</h6>
                                                <p class="text-muted mb-0">${item.product_details.category}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${item.qty}</td>
                                </tr>`
                    })
                    $('#products-list').html(product_html)
                    $('#order_amount_dtls_bx').html(`<tr>
                                                        <td>Paid Amount</td>
                                                        <td class="text-end">₹ ${order.total}</td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Refundable Amount</th>
                                                        <th class="text-end">₹ ${order.total}</th>
                                                    </tr>`)
                    $('#address_bx').html(` <h6 class="text-muted text-uppercase fs-12 mb-3">Billing Address</h6>
                                            <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                                                <li class="fw-medium fs-14">${order.user_name}</li>
                                                <li>${order.phone_number}</li>
                                                <li>${order.address.locality}</li>
                                                <li>${order.address.city}, ${order.address.district}</li>
                                                <li>${order.address.state} , ${order.address.country}</li>
                                                <li>PIN - ${order.address.zipcode}</li>
                                            </ul>`)

                }

            },
            error: function (err) {
                console.error(err)
            }

        })

    }



</script>