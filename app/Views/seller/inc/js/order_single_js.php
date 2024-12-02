<script>
    lode_order();

    $('#order_status_select_bx').on('change', function () {

        // Get the selected value of the select box
        var order_status = $(this).val();
        $.ajax({
            url: "<?= base_url('/api/order/status/update') ?>",
            data: {
                order_status: order_status,
                o_id: "<?= $_GET['o_id'] ?>"
            },
            beforeSend: function () {

            },
            success: function (resp) {
                lode_order()
            },
            error: function (err) {
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
                    $('#order_status_select_bx').val(order.order_status)
                    $('#user_bx').html(
                        `<li>
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
                    let vendor_id = '<?= $_SESSION[SES_SELLER_ID] ?>'
                    $.each(order.products, function (index, item) {
                        console.log(item.status)

                        if (vendor_id == item.product_details.vendor_id) {
                            html += `    <tr>
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
                                            <td>
                                                <select class="form-select form-select-sm" onChange="change_order_item_status('${item.uid}')" id="status_slc_${item.uid}">
                                                    <option value="placed" ${item.status == 'placed' ? 'selected' : '' }>Placed</option>
                                                    <option value="confirmed" ${item.status == 'confirmed' ? 'selected' : '' }>Confirmed</option>
                                                    <option value="shipped" ${item.status == 'shipped' ? 'selected' : '' }>Shipped</option>
                                                    <option value="cancelled" ${item.status == 'cancelled' ? 'selected' : '' }>Cancelled</option>
                                                    <option value="delivered" ${item.status == 'delivered' ? 'selected' : '' }>Delivered</option>
                                                    <option value="returned" ${item.status == 'returned' ? 'selected' : '' }>Returned</option>
                                                </select>
                                            </td>
                                            <td class="fw-medium text-end">
                                                ₹ ${(item.price * item.qty).toFixed(2)}
                                            </td>
                                        </tr>`
                        }

                    })
                    // html += `<tr class="border-top border-top-dashed">
                    //             <td colspan="3"></td>
                    //             <td colspan="2" class="fw-medium p-0">
                    //                 <table class="table table-borderless mb-0">
                    //                     <tbody>
                    //                         <tr>
                    //                             <td>Sub Total :</td>
                    //                             <td class="text-end"> ₹ ${order.sub_total}</td>
                    //                         </tr>
                    //                         <tr>
                    //                             <td>Discount <span class="text-muted">(${order.order_discount_percentage}%)</span> : </td>
                    //                             <td class="text-end">- ₹ ${order.order_discount_amount}</td>
                    //                         </tr>
                    //                         <tr>
                    //                             <td>Shipping Charge <span class="text-muted">(free)</span> :</td>
                    //                             <td class="text-end">₹ 0</td>
                    //                         </tr>
                    //                         <tr class="border-top border-top-dashed">
                    //                             <th scope="row">Total (INR) :</th>
                    //                             <th class="text-end">₹ ${order.total}</th>
                    //                         </tr>
                    //                     </tbody>
                    //                 </table>
                    //             </td>
                    //         </tr>`
                    $('#product_table_body').html(html)

                }

            },
            error: function (err) {
                console.error(err)
            }

        })

    }

    function change_order_item_status(order_item_id){


        $.ajax({
            url: "<?= base_url('/api/order/item/status/update')?>",
            type: "GET",
            data: {
                order_item_id: order_item_id,
                status : $(`#status_slc_${order_item_id}`).val()
            },
            beforeSend: function(){},
            success: function(resp){
                html = ''
                if(resp.status){
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
            },
            error: function(err){
                console.error(err)
            }
        })

    }












</script>