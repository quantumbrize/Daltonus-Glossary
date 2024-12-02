    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>public/assets_admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>public/assets_admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <!-- App js -->
    <script src="<?= base_url() ?>public/assets_admin/js/app.js"></script>
    <!-- jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                search: ""
            }
        });
        $('.dt-input').each(function () {
            $(this).attr("placeholder", "Search...");
            $(this).before('<span class="fa fa-search"></span>');
        });

       
        sessionStorage.setItem("data-preloader", "enable")
        //sessionStorage.setItem("data-bs-theme", "light");
        $('#darkmode_btn').on('click', function () {
            if (sessionStorage.getItem("data-bs-theme") == 'light') {
                sessionStorage.setItem("data-bs-theme", "dark");
            } else {
                sessionStorage.setItem("data-bs-theme", "light"); 
            }
        });


  

    </script>


    <?php //require_once('../../inc/main_js.php'); ?>

    <?php
        if (!empty ($footer_asset_link)) {
            foreach ($footer_asset_link as $link) {
                echo "<script src='" . base_url() . 'public/' . $link . "'></script>";
            }
        }
        if (!empty ($footer_link)) {
            foreach ($footer_link as $link) {
                require_once ('js/' . $link);
            }
        }
    ?>

</body>

</html>