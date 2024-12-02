<script>
    lode_order();



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
                    var formattedDateTimestamp = date.getTime();
                    // Get current timestamp
                    var currentTimestamp = new Date().getTime();
                    // Calculate the difference in milliseconds
                    var timeDifference = currentTimestamp - formattedDateTimestamp;
                    // Convert milliseconds to seconds
                    var secondsDifference = Math.floor(timeDifference / 1000);
                    // Convert seconds to minutes
                    var minutesDifference = Math.floor(secondsDifference / 60);
                    // Convert minutes to hours
                    var hoursDifference = Math.floor(minutesDifference / 60);
                    // Convert hours to days
                    var daysDifference = Math.floor(hoursDifference / 24);


                    if (order.order_status == 'delivered') {
                        if (daysDifference <= 10) {
                            $('#return_cancel_bx').html(`<a href="<?= base_url('/order/return?o_id=' . $_GET['o_id']) ?>" class="btn btn-warning">Return Order</a>`)
                        }
                    } else {
                        if (hoursDifference <= 24) {
                            $('#return_cancel_bx').html(`<a href="<?= base_url('/order/cancel?o_id=' . $_GET['o_id']) ?>" class="btn btn-danger">Cancel Order</a>`)
                        }
                    }

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
                    let total_discount = 0
                    $.each(order.products, function (index, item) {
                        // console.log(item)
                         let img_link = item.product_config_id ? '/public/uploads/variant_images/' : '/public/uploads/product_images/'

                        let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg'
                        if(item.product_details.product_img != ""){
                            product_image = `<?=base_url()?>${img_link + item.product_details.product_img[0].src}`
                        }
                        let returnBtn = ``
                        if (order.order_status == 'delivered') {
                            if (daysDifference <= 10) {
                                returnBtn = `<a 
                                                href="<?= base_url('/order/item/return?o_id=' . $_GET['o_id']) . '&p_id=' ?>${item.product_id}"
                                                class="btn btn-warning">
                                                Return Product
                                            </a>`
                            }
                        }
                        product_html += `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-title bg-secondary-subtle rounded-3">
                                                    <img 
                                                        src="${product_image}" 
                                                        alt="" 
                                                        class="avatar-xs">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6>${item.product_details.name.substring(0, 25) + "..."}</h6>
                                                <p class="text-muted mb-0">${item.product_details.category}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">${returnBtn}</td>
                                    <td>₹ ${item.price}</td>
                                    <td>${item.qty}</td>
                                    <td class="text-end">₹ ${(item.price * item.qty).toFixed(2)}</td>
                                </tr>`
                                total_discount += parseInt(item.product_details.base_discount, 10);
                    })
                    $('#products-list').html(product_html)
                    $('#order_amount_dtls_bx').html(` <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end"> ₹ ${order.sub_total}</td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <td>Discount </small></td>
                                                        <td class="text-end">${total_discount}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping Charge</td>
                                                        <td class="text-end">Free</td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Total Amount</th>
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
                    $('#order_track').html(`<div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0 ${
                                                order.order_status == 'placed' || 
                                                order.order_status == 'confirmed' ||
                                                order.order_status == 'shipped' ||
                                                order.order_status == 'delivered' 
                                                ? 'completed' : ''} ">
                                                <span class="is-complete"></span>
                                                <h6 class="fs-15 mt-3 mt-md-4">Order Process</h6>
                                            </div>
                                            <div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0 ${
                                                order.order_status == 'confirmed' ||
                                                order.order_status == 'shipped' ||
                                                order.order_status == 'delivered' 
                                                ? 'completed' : ''}">
                                                <span class="is-complete"></span>
                                                <h6 class="fs-15 mt-3 mt-md-4">Order Shipped</h6>
                                            </div>
                                            <div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0 ${
                                                order.order_status == 'shipped' ||
                                                order.order_status == 'delivered' 
                                                ? 'completed' : ''}"> 
                                                <span class="is-complete"></span>
                                                <h6 class="fs-15 mt-3 mt-md-4">Out Of Delivery</h6>
                                            </div>
                                            <div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0 ${
                                                order.order_status == 'delivered' 
                                                ? 'completed' : ''}">
                                                <span class="is-complete"></span>
                                                <h6 class="fs-15 mt-3 mt-md-4">Delivered</h6>
                                            </div>`)

                }

            },
            error: function (err) {
                console.error(err)
            }

        })

    }



</script>