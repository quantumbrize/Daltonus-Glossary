<script>
    load_products();
    function calculateFinalPrice(originalPrice, discountPercentage) {
        // Calculate the discount amount
        var discountAmount = (originalPrice * discountPercentage) / 100;
        
        // Calculate the final price after applying the discount
        var finalPrice = originalPrice - discountAmount;
        
        // Return the final price
        return finalPrice;
    }

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function redirect_single_product(product_id) {
        if ($(event.target).hasClass('stock_number_bx') || $(event.target).hasClass('btn-number')) {
            return false
        }else{
            window.location.href = "<?= base_url('/seller/product?p_id=') ?>" + product_id;
        }
    }

    function updateStock(product_id,type){
        let stock = parseInt($(`#input-stock-${product_id}`).val())
        stock = type == 'add' ? stock + 1 : stock  - 1;

        $.ajax({
            url: "<?= base_url('/api/product/stock/update') ?>",
            type: "GET",
            data: {
                p_id : product_id,
                stock: stock
            },
            beforeSend: function(){
                $(`#btn-stock-add-${product_id}`).attr('disabled', true)
                $(`#btn-stock-sub-${product_id}`).attr('disabled', true)
            },
            success: function(resp){
                $(`#btn-stock-add-${product_id}`).attr('disabled', false)
                $(`#btn-stock-sub-${product_id}`).attr('disabled', false)
                if(resp.status){
                    $(`#input-stock-${product_id}`).val(stock)
                    $('#alert').html(`<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                        <i class="ri-checkbox-circle-fill label-icon"></i><strong>${resp.message}</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`) 
                }
            },
            error: function(err){
                console.log(err)
                $(`#btn-stock-add-${product_id}`).attr('disabled', false)
                $(`#btn-stock-sub-${product_id}`).attr('disabled', false)
                $('#alert').html(`<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - Internal Server Error
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`)
            }
        })

    }


    function load_products() {
        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            data: {
                v_id : '<?= !empty($_SESSION[SES_SELLER_USER_ID]) ? $_SESSION[SES_SELLER_USER_ID] : '' ?>'
            },
            beforeSend: function () {
                $('#table-product-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_product_count').html(resp.data.length)
                        let html = ``
                        console.log(resp)
                        $.each(resp.data, function (index, product) {
                            let product_img = product.product_img.length > 0 ? product.product_img[0]['src'] : ''
                            html += `<tr onclick="redirect_single_product('${product.product_id}')">
                                            <td >
                                                <p>${product.name.slice(0, 15) + (product.name.length > 15 ? '...' : '')}</p>
                                                <img src="<?= base_url('public/uploads/product_images/') ?>${product_img}" alt="" class="product-img">
                                            </td>
                                            <td >
                                                ${product.category}
                                            </td>
                                            <td >
                                                ${product.publish_date == '' ? formatDate(product.created_at) : formatDate(product.publish_date)}
                                            </td>
                                            <td >
                                                Base Price : ${product.base_price} ₹<br>
                                                Discount : ${product.base_discount} %<br>
                                                Final Price : <b class="fs-16 text-success">${calculateFinalPrice(product.base_price, product.base_discount)} ₹</b>
                                            </td>
                                            <td >
                                                <sapn class="badge bg-success-subtle text-success text-uppercase">${product.visibility}</sapn>
                                            </td>
                                        </tr>`
                        })
                        $('#table-product-list-all-body').html(html)
                        $('#table-product-list-all').DataTable();
                    }
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }



</script>