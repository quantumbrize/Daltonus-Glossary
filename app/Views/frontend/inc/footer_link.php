
<!-- Custom js -->
<script src="<?=base_url()?>public/assets/js/Pages_custom_JS/btns_horizontally_scroll_script.js"></script>
<!-- Custom script -->
<script src="<?=base_url()?>public/assets/js/Pages_custom_JS/product_details_script.js"></script>

<!-- bootstrap js -->
<script src="<?=base_url()?>public/assets/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->


<!-- swiper js -->
<script src="<?=base_url()?>public/assets/js/swiper-bundle.min.js"></script>
<script src="<?=base_url()?>public/assets/js/custom-swiper.js"></script>

<!-- script js -->
<!-- <script src="<?=base_url()?>public/assets/js/script.js"></script> -->
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