<script>

    get_return_single()


    $('#order_status_select_bx').on('change', function () {

        // Get the selected value of the select box
        var return_status = $(this).val();
        $.ajax({
            url: "<?= base_url('/api/order/returns/status/update') ?>",
            data: {
                return_status: return_status,
                r_id: "<?= $_GET['r_id'] ?>"
            },
            beforeSend: function () {

            },
            success: function (resp) {
                get_return_single()
            },
            error: function (err) {
                console.error(err)
            }
        })
    })







    function get_return_single() {

        $.ajax({
            url: '<?= base_url('/api/order/returns') ?>',
            type: "GET",
            data: {
                r_id: "<?= $_GET['r_id'] ?>"
            },
            beforeSend: function () { },
            success: function (rtn) {
                console.log(rtn)
                if (rtn.status) {
                    $('#order_status_select_bx').val(rtn.data.status)
                    $('#reason_return').html(rtn.data.reason)
                    if (rtn.data.type == "order") {

                        $.ajax({
                            url: '<?= base_url('/api/order') ?>',
                            type: 'GET',
                            data: {
                                o_id: rtn.data.order_id
                            },
                            beforeSend: function () { },
                            success: function (resp) {
                                console.log(resp)
                                if (resp.status) {
                                    let order = resp.data
                                    $('#user_bx').html(`<li>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img 
                                                                style="height: 50px; width: 50px; object-fit: contain; background: white;"  
                                                                src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" 
                                                                alt="" 
                                                                class="avatar-sm rounded material-shadow">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="fs-14 mb-1">${order.user.user_name}</h6>
                                                            <p class="text-muted mb-0">Customer</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>${order.user.email}</li>
                                                <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>${order.user.number}</li>`)

                                    $('#user_addr_bx').html(`<ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                                                <li class="fw-medium fs-14">${order.user_name}</li>
                                                <li>${order.phone_number}</li>
                                                <li>${order.address.locality}</li>
                                                <li>${order.address.city}, ${order.address.district}</li>
                                                <li>${order.address.state} , ${order.address.country}</li>
                                                <li>PIN - ${order.address.zipcode}</li>
                                            </ul>`)
                                    $('#user_pay_bx').html(` <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Pay Id:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0">${order.payment.uid}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Payment Method:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0">${order.payment.type}</h6>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Payment Status:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0">${order.payment.status}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Total Amount:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0"> ${order.total}</h6>
                                                            </div>
                                                        </div>`)


                                    $('#order_id').html(order.order_id)
                                    let html = ``
                                    $.each(order.products, function (index, item) {
                                        if (item.product_details.vendor_id == "<?= $_SESSION[SES_SELLER_ID] ?>") {
                                            html += `<tr>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                                    <img
                                                                        style="height: 100%; width: 100%; object-fit: contain; background: white;"
                                                                        src="<?= base_url('public/uploads/product_images/') ?>${item.product_details.product_img[0].src}" 
                                                                        alt="" 
                                                                        class="img-fluid d-block">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h5 class="fs-15">
                                                                        <a href="" class="link-primary">${item.product_details.name.substring(0, 25) + "..."}</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>₹ ${item.price}</td>
                                                        <td>${item.qty}</td>
                                                        
                                                        <td class="fw-medium text-end">
                                                            ₹ ${(item.price * item.qty).toFixed(2)}
                                                        </td>
                                                    </tr>`
                                        }
                                    })
                                    $('#product_table_body').html(html)

                                }

                            },
                            error: function (err) {
                                console.error(err)
                            }
                        })
                    } else if (rtn.data.type == "item") {
                        $.ajax({
                            url: '<?= base_url('/api/order') ?>',
                            type: 'GET',
                            data: {
                                o_id: rtn.data.order_id
                            },
                            beforeSend: function () { },
                            success: function (resp) {
                                console.log(resp)
                                if (resp.status) {
                                    let order = resp.data
                                    $('#user_bx').html(`<li>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img 
                                                                style="height: 50px; width: 50px; object-fit: contain; background: white;"  
                                                                src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" 
                                                                alt="" 
                                                                class="avatar-sm rounded material-shadow">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="fs-14 mb-1">${order.user.user_name}</h6>
                                                            <p class="text-muted mb-0">Customer</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>${order.user.email}</li>
                                                <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>${order.user.number}</li>`)

                                    $('#user_addr_bx').html(`<ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                                                <li class="fw-medium fs-14">${order.user_name}</li>
                                                <li>${order.phone_number}</li>
                                                <li>${order.address.locality}</li>
                                                <li>${order.address.city}, ${order.address.district}</li>
                                                <li>${order.address.state} , ${order.address.country}</li>
                                                <li>PIN - ${order.address.zipcode}</li>
                                            </ul>`)
                                    $('#user_pay_bx').html(` <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Pay Id:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0">${order.payment.uid}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Payment Method:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0">${order.payment.type}</h6>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Payment Status:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0">${order.payment.status}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <p class="text-muted mb-0">Total Amount:</p>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2">
                                                                <h6 class="mb-0"> ${order.total}</h6>
                                                            </div>
                                                        </div>`)


                                    $('#order_id').html(order.order_id)
                                    let html = ``
                                    $.each(order.products, function (index, item) {
                                        if (item.product_id == rtn.data.item_id) {
                                            html += `<tr>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                                    <img
                                                                        style="height: 100%; width: 100%; object-fit: contain; background: white;"
                                                                        src="<?= base_url('public/uploads/product_images/') ?>${item.product_details.product_img[0].src}" 
                                                                        alt="" 
                                                                        class="img-fluid d-block">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h5 class="fs-15">
                                                                        <a href="" class="link-primary">${item.product_details.name.substring(0, 25) + "..."}</a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>₹ ${item.price}</td>
                                                        <td>${item.qty}</td>
                                                        
                                                        <td class="fw-medium text-end">
                                                            ₹ ${(item.price * item.qty).toFixed(2)}
                                                        </td>
                                                    </tr>`

                                            html += `<tr class="border-top border-top-dashed">
                                                                <td colspan="3"></td>
                                                                <td colspan="2" class="fw-medium p-0">
                                                                    <table class="table table-borderless mb-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Paid Amount :</td>
                                                                                <td class="text-end">₹ ${(item.price * item.qty).toFixed(2)}</td>
                                                                            </tr>
                                                                            <tr class="border-top border-top-dashed">
                                                                                <th scope="row">Refundable Amount (INR) :</th>
                                                                                <th class="text-end">₹ ${(item.price * item.qty).toFixed(2)}</th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>`
                                        }
                                    })

                                    $('#product_table_body').html(html)

                                }

                            },
                            error: function (err) {
                                console.error(err)
                            }

                        })

                    }
                }
            },
            error: function (err) {
                console.error(err)
            }

        })
    }

</script>