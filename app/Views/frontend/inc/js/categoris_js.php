<script>


    load_discount_table()
    function load_discount_table() {
        $.ajax({
            url: '<?= base_url('/api/discounts') ?>',
            type: "GET",
            beforeSend: function () {
                $('#table-discounts-list-all-body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                console.log(resp);
                if (resp.status == 1) {
                    if (resp.data.length > 0) {
                        let html = ''
                        $.each(resp.data, function (index, item) {
                            html += `<div class="coupon-card">
                                        <div class="coupon-content">
                                            <div class="discount_container">
                                                <img class="coupon-image" src="<?=base_url()?>public/assets/ztImages/placeholder.png" alt="offer">
                                                <p class="discount_parcent"><span class="discount_parcent_text">FLAT</span></br><span class="discount_parcent_number">${item.discount_percentage}</span>% off</p>
                                            </div>
                                            <div>
                                                <span class="discount">${item.name}</span>
                                                <!-- <span class="conditions">Only on Healthcare Products on Orders above $100</span> -->
                                            </div>
                                            <div>
                                                <img class="coupon-nav-icon" src="<?=base_url()?>public/assets/ztImages/round-arrow.png" alt="offer">
                                            </div>
                                        </div>
                                        <div class="coupon-code">
                                            <span>Minimum Purchase: ${item.minimum_purchase}</span>
                                            <!-- <a href="#" class="copy-code">COPY CODE</a> -->
                                        </div>
                                    </div>`

                        })
                        $('#promo_codes').html(html)
                    }
                } else {
                }
            },
            error: function (err) {
                console.log(err)
            }

        })

    }

</script>