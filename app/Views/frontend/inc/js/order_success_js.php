<script>

    get_order()
    function shortenString(str, maxLength) {
        if (str.length <= maxLength) {
            return str;
        } else {
            return str.substring(0, maxLength) + '...';
        }
    }
    function get_order() {
        $.ajax({
            url: '<?= base_url('api/order') ?>',
            data: {
                o_id: "<?= $_GET['o_id'] ?>"
            },
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    let order = resp.data

                    // Input date string
                    var dateString = order.created_at;

                    // Parse the date string into a Date object
                    var date = new Date(dateString);

                    // Options for formatting the date
                    var options = {
                        year: 'numeric',
                        month: 'short',
                        day: '2-digit',
                        hour12: false, // Display hours in 24-hour format
                        timeZone: 'Asia/Kolkata' // Set time zone to Indian Standard Time (IST)
                    };

                    // Format the date in IST as "01 Jan, 2023"
                    var formattedDate = date.toLocaleString('en-IN', options);
                    let newLogoSrc = ''
                    $.ajax({
                        url: "<?= base_url('/api/about') ?>",
                        type: "GET",
                        success: function (resp) {
                            // console.log(resp)
                            if (resp.status) {
                                newLogoSrc = `<?= base_url() ?>public/uploads/logo/${resp.data.logo}`;
                                html = `<center  style="margin: 35px 0;color: #fafafa;">
                                    <a href="<?= base_url() ?>" class="btn btn-success">Continue Shopping <i class="ri ri-arrow-right-line"> </i></a>
                            </center>
                            <div
                                style="max-width: 650px;margin:auto; box-shadow: rgba(135, 138, 153, 0.10) 0 5px 20px -6px;border-radius: 6px;overflow: hidden;background-color: #06283D;">
                                <div style="padding: 1.5rem;background-color: #0f3146;">
                                    <a href="index.html">
                                        <img src="${newLogoSrc}" alt="" 
                                            style="display: block;margin: 0 auto; height: 140px;" >
                                    </a>
                                </div>
                                <div style="padding: 1.5rem;">
                                    <h5
                                        style="font-size: 18px;font-family: 'Inter', sans-serif;font-weight: 600;margin-bottom: 18px;margin-top: 0px;line-height: 1.2;color: #fafafa;">
                                        Your Order Confirmed!</h5>

                                    <h6
                                        style="font-size: 16px;font-weight: 500;margin-bottom: 12px;margin-top: 0px;line-height: 1.2;color: #fafafa;">Hello, ${order.user_name}</h6>
                                    <p style="color: #878a99 !important; margin-bottom: 20px;margin-top: 0px;">Your order has been Confirmed and will be shipping soon.</p>
                                    <table style="width: 100%;" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="padding: 5px; vertical-align: top;">
                                                <p
                                                    style="color: #878a99 !important; margin-bottom: 12px; font-size: 13px; text-transform: uppercase;font-weight: 500;margin-top: 0px;">
                                                    Order Date</p>
                                                <h6
                                                    style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                                    ${formattedDate} </h6>
                                            </td>
                                            <td style="padding: 5px; vertical-align: top;">
                                                <p
                                                    style="color: #878a99 !important; margin-bottom: 12px; font-size: 13px; text-transform: uppercase;font-weight: 500;margin-top: 0px;">
                                                    Order ID</p>
                                                <h6
                                                    style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                                    ${order.order_id}</h6>
                                            </td>
                                            <td style="padding: 5px; vertical-align: top;">
                                                <p
                                                    style="color: #878a99 !important; margin-bottom: 12px; font-size: 13px; text-transform: uppercase;font-weight: 500;margin-top: 0px;">
                                                    Payment</p>
                                                <h6
                                                    style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                                    ${order.payment.type}</h6>
                                            </td>
                                            <td style="padding: 5px; vertical-align: top;">
                                                <p
                                                    style="color: #878a99 !important; margin-bottom: 12px; font-size: 13px; text-transform: uppercase;font-weight: 500;margin-top: 0px;">
                                                    Address</p>
                                                <h6
                                                    style="font-size: 12px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                                    ${order.address.locality},<br/>
                                                    ${order.address.city},<br/>
                                                    ${order.address.district},<br/>
                                                    ${order.address.state},<br/>
                                                    PIN - ${order.address.zipcode}
                                                </h6>
                                            </td>
                                        </tr>
                                    </table>

                                    <h6
                                        style="font-family: 'Inter', sans-serif; font-size: 15px;font-weight: 600; text-decoration-line: underline;margin-bottom: 16px;margin-top: 20px;color: #fafafa;">
                                        Her'e what you ordered:</h6>
                                    <table style="width: 100%;border-collapse: collapse;" cellspacing="0" cellpadding="0">`

                    let total_discount = 0
                    if (order.products.length > 0) {
                        $.each(order.products, function (index, item) {
                            console.log(item);
                            let img_link = item.product_config_id ? '/public/uploads/variant_images/' : '/public/uploads/product_images/'

                            let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg'
                            if(item.product_details.product_img != ""){
                                product_image = `<?=base_url()?>${img_link + item.product_details.product_img[0].src}`
                            }

                            html += ` <tr>
                                        <td style="padding: 12px 5px; vertical-align: top;width: 65px;">
                                            <div
                                                style="border: 1px solid #ffffff14;height: 64px;width: 64px;display: flex; align-items: center;justify-content: center;border-radius: 6px;">
                                                <img src="${product_image}" alt="" height="38">
                                            </div>
                                        </td>
                                        <td style="padding: 12px 5px; vertical-align: top;">
                                            <h6
                                                style="font-size: 15px; margin: 0px;font-weight: 500; font-family: 'Inter', sans-serif;color: #fafafa;">
                                                ${shortenString(item.product_details.name, 15)}</h6>
                                            <p
                                                style="color: #878a99 !important; margin-bottom: 10px; font-size: 13px;font-weight: 500;margin-top: 6px;">
                                                ${item.product_details.category}</p>
                                        </td>
                                        <td style="padding: 12px 5px; vertical-align: top;">
                                            <h6
                                                style="font-size: 15px; margin: 0px;font-weight: 400; font-family: 'Inter', sans-serif;color: #fafafa;">
                                                Qty - ${item.qty}<br>
                                                Price - ₹ ${item.price}</h6>
                                        </td>
                                        <td style="padding: 12px 5px; vertical-align: top;text-align: end;">
                                            <h6
                                                style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                                ₹ ${item.qty * item.price}</h6>
                                        </td>
                                    </tr>`
                                    total_discount += parseInt(item.product_details.base_discount, 10);
                        })
                    }
                    html += `<tr>
                                <td colspan="3" style="padding: 12px 8px; font-size: 15px;border-top: 1px solid #ffffff14;">
                                    Subtotal
                                </td>
                                <td style="padding: 12px 8px; font-size: 15px;text-align: end; border-top: 1px solid #ffffff14;">
                                    <h6
                                        style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                        ₹ ${order.sub_total}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding: 12px 8px; font-size: 15px;">
                                    Shipping Charge
                                </td>
                                <td style="padding: 12px 8px; font-size: 15px;text-align: end; ">
                                    <h6
                                        style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                        Free</h6>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding: 12px 8px; font-size: 15px;">
                                    Discount)
                                </td>
                                <td style="padding: 12px 8px; font-size: 15px;text-align: end; ">
                                    <h6
                                        style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                         ${total_discount}%</h6>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding: 12px 8px; font-size: 15px;border-top: 1px solid #ffffff14;">
                                    Total Amount
                                </td>
                                <td style="padding: 12px 8px; font-size: 15px;text-align: end; border-top: 1px solid #ffffff14;">
                                    <h6
                                        style="font-size: 15px; margin: 0px;font-weight: 600; font-family: 'Inter', sans-serif;color: #fafafa;">
                                        ₹ ${order.total}</h6>
                                </td>
                            </tr>
                        </table>
                        <p style="color: #878a99 !important; margin-bottom: 20px;margin-top: 15px;">We'll send you shipping
                            Confirmation when your item(s) are on the way! We appreciate your business, and hope you enjoy your
                            purchase.</p>
                        <div style="text-align: right;">
                            <h6
                                style="font-size: 15px; margin: 0px;font-weight: 500;font-size: 17px; font-family: 'Inter', sans-serif;color: #fafafa;">
                                Thank you!</h6>
                            <p style="color: #878a99 !important; margin-bottom: 0;margin-top: 8px;">${resp.data.company_name}</p>
                        </div>
                    </div>
                    <div style="padding: 1.5rem;background-color: #0f3146;">
                        <div style="display: flex;gap: 5px;justify-content: space-between;">
                            <p style="color: #878a99 !important; margin: 0;">Questions? Contact Our <a href="#!"
                                    style="text-decoration: none;color: #fff;"> Customer Support</a></p>
                            <p style="color: #878a99 !important; margin: 0;">
                                ${new Date().getFullYear()} © ${resp.data.company_name}.
                            </p>
                        </div>
                    </div>
                </div>`
                    $('#order_con').html(html)

                            } else {
                                console.log(resp)
                            }
                        },
                        error: function (err) {
                            console.log(err)
                        },
                    })

                  
                }

            },
            error: function (err) {
                console.error(err)
            }
        })


    }

</script>