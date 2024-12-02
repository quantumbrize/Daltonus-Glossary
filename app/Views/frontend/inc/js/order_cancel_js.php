<script>

    $('#res_btn').on('click', function () {

        $.ajax({
            url: '<?= base_url('/api/order/cancel') ?>',
            data: {
                o_id: "<?= $_GET['o_id'] ?>",
                reason: $('#res_inp').val()
            },
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    Toastify({
                        text: resp.message.toUpperCase(),
                        duration: 2000,
                        position: "center",
                        stopOnFocus: true,
                        style: {
                            background: 'green',
                        },
                    }).showToast();
                    setTimeout(function() {
                        window.location.href = "<?=base_url('/order/history')?>";
                    }, 3000);
                }


            },
            error: function (err) {
                console.error(err)
            }
        })

    })


</script>