<script>

    $(document).ready(function() {
        total_product()
        total_order()
        total_customer()
        best_selling()
        revenue()
        
    });

    function total_product() {
        $.ajax({
            url: "<?= base_url('/api/total/product') ?>",
            type: "GET",
            beforeSend: function () {
                // $('#table-banner-list-all-body').html(`<tr >
                //         <td colspan="7"  style="text-align:center;">
                //             <div class="spinner-border" role="status"></div>
                //         </td>
                //     </tr>`)
            },
            success: function (resp) {
                // console.log(resp)
                if (resp.status) {
                    document.getElementById('product_counter').setAttribute('data-target', resp.data);
                }else{
                    document.getElementById('product_counter').setAttribute('data-target', resp.data);
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

    function total_order() {
        $.ajax({
            url: "<?= base_url('/api/total/order') ?>",
            type: "GET",
            beforeSend: function () {
                // $('#table-banner-list-all-body').html(`<tr >
                //         <td colspan="7"  style="text-align:center;">
                //             <div class="spinner-border" role="status"></div>
                //         </td>
                //     </tr>`)
            },
            success: function (resp) {
                // console.log(resp)
                if (resp.status) {
                    document.getElementById('order_counter').setAttribute('data-target', resp.data);
                }else{
                    document.getElementById('order_counter').setAttribute('data-target', resp.data);
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

    function total_customer() {
        $.ajax({
            url: "<?= base_url('/api/total/customer') ?>",
            type: "GET",
            beforeSend: function () {
                // $('#table-banner-list-all-body').html(`<tr >
                //         <td colspan="7"  style="text-align:center;">
                //             <div class="spinner-border" role="status"></div>
                //         </td>
                //     </tr>`)
            },
            success: function (resp) {
                // console.log(resp)
                if (resp.status) {
                    document.getElementById('customer_counter').setAttribute('data-target', "");
                    document.getElementById('customer_counter').setAttribute('data-target', resp.data);
                }else{
                    document.getElementById('customer_counter').setAttribute('data-target', resp.data);
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
    }

    function best_selling() {
        $.ajax({
            url: '<?= base_url('/api/best-selling') ?>',
            type: "GET",
            beforeSend: function () {
                $('#table-best-selling-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                        let html = ''
                        // console.log(resp)
                        $.each(resp.data, function (index, item) {
                            
                            if(item.product_data != null){
                                var original_price = item.product_data.base_discount ? (item.product_data.base_price - (item.product_data.base_price * item.product_data.base_discount / 100)).toFixed(2) : item.product_data.base_price.toFixed(2);
                                var base_price = item.product_data.base_discount ? item.product_data.base_discount : "";
                                var image = `<?=base_url()?>public/assets/ztImages/demo_img.jpg`
                                if(item.product_data.product_img != null && item.product_data.product_img != ""){
                                    image = `<?= base_url('public/uploads/product_images/') ?>${item.product_data.product_img[0].src}`
                                }
                                html += `<tr>
                                            <td style="text-align: center;">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                                        <img src="${image}" alt=""
                                                            class="img-fluid d-block" />
                                                    </div>
                                                    
                                                </div> 
                                                
                                            </td>
                                            <td style="text-align: center;">
                                                <p>${item.product_data.name.slice(0, 15) + (item.product_data.name.length > 15 ? '...' : '')}</p>
                                            </td>
                                            <td style="text-align: center;">
                                                ₹${original_price}
                                            </td>
                                            <td style="text-align: center;">
                                                ${item.total_qty}
                                            </td>
                                            <td style="text-align: center;">
                                                ${item.product_data.product_stock}
                                            </td>
                                            <td style="text-align: center;">
                                                ${(original_price*item.total_qty).toFixed(2)}
                                            </td>
                                            
                                        </tr>`
                            }

                        })

                        $('#table-best-selling-list-all-body').html(html)
                        $('#table-best-selling-list-all').DataTable();
                } else {
                    $('#table-best-selling-list-all-body').html(`<tr >
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

    function revenue() {
        $.ajax({
            url: '<?= base_url('/api/revenue') ?>',
            type: "GET",
            beforeSend: function () {
                $('#table-best-selling-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                
                console.log(resp);
                if (resp.status) {
                    var delivered_orders = resp.data.delivered_orders.length
                    var cancelled_orders = resp.data.cancelled_orders.length
                    var erning = 0;
                    var chart_orders = []



                    var monthly_order = {jan: 0, feb: 0, mar: 0, apr: 0, may: 0, jun: 0, jul: 0, aug: 0, sep: 0, oct: 0, nov: 0, dec: 0}
                    var monthly_erning = {jan: 0, feb: 0, mar: 0, apr: 0, may: 0, jun: 0, jul: 0, aug: 0, sep: 0, oct: 0, nov: 0, dec: 0}
                    var monthly_refunds = {jan: 0, feb: 0, mar: 0, apr: 0, may: 0, jun: 0, jul: 0, aug: 0, sep: 0, oct: 0, nov: 0, dec: 0}
                    $.each(resp.data.delivered_orders, function (index, item) {
                        erning += parseFloat(item.total);


                        var dateString = item.created_at;
                        var date = new Date(dateString);
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear();
                        var formattedDate = `${month < 10 ? '0' + month : month}-${year}`;
                        var monthPart = formattedDate.split("-")[0];

                    
                        if(monthPart == '01'){
                            monthly_order.jan += 1
                            monthly_erning.jan += parseFloat(item.total);
                        } else if(monthPart == '02'){
                            monthly_order.feb += 1
                            monthly_erning.feb += parseFloat(item.total);
                        } else if(monthPart == '03'){
                            monthly_order.mar += 1
                            monthly_erning.mar += parseFloat(item.total);
                        } else if(monthPart == '04'){
                            monthly_order.apr += 1
                            monthly_erning.apr += parseFloat(item.total);
                        } else if(monthPart == '05'){
                            monthly_order.may += 1
                            monthly_erning.may += parseFloat(item.total);
                        } else if(monthPart == '06'){
                            monthly_order.jun += 1
                            monthly_erning.jun += parseFloat(item.total);
                        } else if(monthPart == '07'){
                            monthly_order.jul += 1
                            monthly_erning.jul += parseFloat(item.total);
                        } else if(monthPart == '08'){
                            monthly_order.aug += 1
                            monthly_erning.aug += parseFloat(item.total);
                        } else if(monthPart == '09'){
                            monthly_order.sep += 1
                            monthly_erning.sep += parseFloat(item.total);
                        } else if(monthPart == '10'){
                            monthly_order.oct += 1
                            monthly_erning.oct += parseFloat(item.total);
                        } else if(monthPart == '11'){
                            monthly_order.nov += 1
                            monthly_erning.nov += parseFloat(item.total);
                        } else if(monthPart == '12'){
                            monthly_order.dec += 1
                            monthly_erning.dec += parseFloat(item.total);
                        }
                    })
                    $.each(resp.data.cancelled_orders, function (index, item) {
                        erning += parseFloat(item.total);


                        var dateString = item.created_at;
                        var date = new Date(dateString);
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear();
                        var formattedDate = `${month < 10 ? '0' + month : month}-${year}`;
                        var monthPart = formattedDate.split("-")[0];

                    
                        if(monthPart == '01'){
                            monthly_refunds.jan += 1
                        } else if(monthPart == '02'){
                            monthly_refunds.feb += 1
                        } else if(monthPart == '03'){
                            monthly_refunds.mar += 1
                        } else if(monthPart == '04'){
                            monthly_refunds.apr += 1
                        } else if(monthPart == '05'){
                            monthly_refunds.may += 1
                        } else if(monthPart == '06'){
                            monthly_refunds.jun += 1
                        } else if(monthPart == '07'){
                            monthly_refunds.jul += 1
                        } else if(monthPart == '08'){
                            monthly_refunds.aug += 1
                        } else if(monthPart == '09'){
                            monthly_refunds.sep += 1
                        } else if(monthPart == '10'){
                            monthly_refunds.oct += 1
                        } else if(monthPart == '11'){
                            monthly_refunds.nov += 1
                        } else if(monthPart == '12'){
                            monthly_refunds.dec += 1
                        }
                    })
                    console.log(monthly_order.aug);
                     
                    const xValues = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];

                    new Chart("myChart", {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [{ 
                        data: [monthly_order.jan, monthly_order.feb, monthly_order.mar, monthly_order.apr, monthly_order.may, monthly_order.jun, monthly_order.jul, monthly_order.aug, monthly_order.sep, monthly_order.oct, monthly_order.nov, monthly_order.dec],
                        borderColor: "red",
                        fill: false
                        }, 
                        // { 
                        // data: [monthly_erning.jan, monthly_erning.feb, monthly_erning.mar, monthly_erning.apr, monthly_erning.may, monthly_erning.jun, monthly_erning.jul, monthly_erning.aug, monthly_erning.sep, monthly_erning.oct, monthly_erning.nov, monthly_erning.dec],
                        // borderColor: "green",
                        // fill: false
                        // }, 
                        { 
                        data: [monthly_refunds.jan, monthly_refunds.feb, monthly_refunds.mar, monthly_refunds.apr, monthly_refunds.may, monthly_refunds.jun, monthly_refunds.jul, monthly_refunds.aug, monthly_refunds.sep, monthly_refunds.oct, monthly_refunds.nov, monthly_refunds.dec],
                        borderColor: "blue",
                        fill: false
                        }]
                    },
                    options: {
                        legend: {display: false}
                    }
                    });
                    
                    
                    const delivered_ordersElement = document.getElementById('delivered_orders');
                    delivered_ordersElement.textContent = delivered_orders;
                    const cancelled_ordersElement = document.getElementById('cancelled_orders');
                    cancelled_ordersElement.textContent = cancelled_orders;
                    // const totalEarningElement = document.getElementById('total_erning');
                    // totalEarningElement.textContent = erning.toFixed(2);
                    // console.log(erning);
                    document.getElementById('erning_counter').setAttribute('data-target', total_erning);

                    

                } else {
                    // $('#table-best-selling-list-all-body').html(`<tr >
                    //     <td>
                    //         DATA NOT FOUND!
                    //     </td>
                    // </tr>`)
                }
            },
            error: function (err) {
                console.log(err)
            }

        })

    }
</script>