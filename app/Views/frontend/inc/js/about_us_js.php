<script>
    $.ajax({
        url: "<?= base_url('/api/about') ?>",
        type: "GET",
        success: function (resp) {
            console.log(resp)
            if (resp.status) {
            $('#about_description').html(resp.data.about_description)
            
            
            }else{
                console.log(resp)
            }
        },
        error: function (err) {
            console.log(err)
        },
    })
    
</script>