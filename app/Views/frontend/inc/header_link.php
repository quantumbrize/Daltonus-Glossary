<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Zettkart" />
    <meta name="keywords" content="Zettkart" />
    <meta name="author" content="Zettkart" />
    <link rel="manifest" href="<?=base_url()?>public/manifest.json" />

    <link
      rel="icon"
      href="<?=base_url()?>public/assets/images/logo/favicon.png"
      type="image/x-icon"
    />
    <title><?= $title ?></title>
    <link rel="apple-touch-icon" href="<?=base_url()?>public/assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#ff8d2f" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Zettkart" />
    <meta
      name="msapplication-TileImage"
      content="<?=base_url()?>public/assets/images/logo/favicon.png"
    />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- bootstrap css -->
    <link
      rel="stylesheet"
      id="rtl-link"
      type="text/css"
      href="<?=base_url()?>public/assets/css/vendors/bootstrap.min.css"
    />

    <!-- CUSTOM CSS- -->
    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/style.css" />
    <!-- Home css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Home.css" />
	<!-- Navbars & Footer css -->
	<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/navs_footer_style.css" />
	
	<?php if(isset($header['about'])){?>
        <!-- About css -->
	 	<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/About.css" />
    <?php }?>

	<?php if(isset($header['about'])){?>
        <!-- About css -->
	 	<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/About.css" />
    <?php }?>

	<?php if(isset($header['product_details'])){?>
       <!-- Product details css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Product_details.css" />
		  <!-- Product-reviews css -->
		  <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Product-reviews.css" />
    <?php }?>

	<?php if(isset($header['product_list']) || isset($header['home'])){?>
        <!-- Sub-Categories css -->
	 	<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Sub-Categories.css" />
    <?php }?>

	<?php if(isset($header['payment'])){?>
        <!-- Payment css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Payment.css" />
    <?php }?>

	<?php if(isset($header['account'])){?>
		<!-- Profile css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Profile.css" />
    <?php }?>
	 
	<?php if(isset($header['user_details'])){?>
		<!-- My_details css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/My_details.css" />
    <?php }?>

	<?php if(isset($header['about_us'])){?>
		  <!-- About css -->
		  <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/About.css" />
    <?php }?>

	<?php if(isset($header['notification'])){?>
		  <!-- Notifications css -->
		  <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Notifications.css" />
    <?php }?>

	<?php if(isset($header['promo_code'])){?>
		  <!-- Promo-Code css -->
		  <link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Promo-Code.css" />
    <?php }?>

	<?php if(isset($header['categoris'])){?>
		<!-- Categories css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Categories.css" />
    <?php }?>

	<?php if(isset($header['cart'])){?>
		<!-- Cart css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Cart.css" />
    <?php }?>

	<?php if(isset($header['billing'])){?>
		<!-- Billing css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Billing.css" />
    <?php }?>

	<?php if(isset($header['payment'])){?>
		<!-- Payment css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Payment.css" />
    <?php }?>

	<?php if(isset($header['order_history'])){?>
		<!-- Orders css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Orders.css" />
    <?php }?>

	<?php if(isset($header['address'])){?>
		<!-- My_details css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/My_details.css" />
		<!-- Billing css -->
		<link rel="stylesheet" id="change-link" type="text/css" href="<?=base_url()?>public/assets/css/style/Address.css" />
    <?php }?>
	  
	
	 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Toastify CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

	<!-- Toastify JS -->
	<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<script>
		 $.ajax({
			url: "<?= base_url('/api/about') ?>",
			type: "GET",
			success: function (resp) {
				console.log(resp)
				if (resp.status) {
				let newLogoSrc = `<?=base_url()?>public/uploads/logo/${resp.data.logo}`;
				$('#daltonus_logo_meta').attr('href', newLogoSrc);
				$('.company_name').text(resp.data.company_name)
				$('.company_address').text(resp.data.address)
				$('.about_description').html(resp.data.about_description)
				$('#mission').html(resp.data.mission)
				$('#vision').html(resp.data.vision)


				}else{
					console.log(resp)
				}
			},
			error: function (err) {
				console.log(err)
			},
		})

	</script>

	<?php
	if (!empty($header_asset_link)) {
		foreach ($header_asset_link as $link) {
			echo "<link href='" . base_url() . 'public/' . $link . "' rel='stylesheet' type='text/css'>";
		}
	}

	if (!empty($header_link)) {
		foreach ($header_link as $link) {
			require_once ('css/' . $link);
		}
	}
	?>
	<style>
		body {
			overflow-x: hidden;
		}
	</style>
</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function get_admin_meta() {
    $.ajax({
        url: "<?= base_url('api/get/admin/meta') ?>",
        type: "GET",
        data: {},
        success: function (resp) {
            // Check the response from the backend
            console.log('API Response:', resp);

            // Check if the status is true
            if (resp.status) {
                console.log('Meta Data:', resp.user_data);

                // Update the meta tags in the <head>
                $("head").append(`
                    <meta content="${resp.user_data.frontend_meta_description}" name="description">
                    <meta content="${resp.user_data.frontend_meta_author}" name="author">
                    <meta content="${resp.user_data.frontend_copyright}" name="copyright">
                `);

                // Display the metadata content in the div as readable text
                // var html = `
                //     <p><strong>Description:</strong> ${resp.user_data.admin_meta_description}</p>
                //     <p><strong>Author:</strong> ${resp.user_data.admin_meta_author}</p>
                //     <p><strong>Copyright:</strong> ${resp.user_data.admin_copyright}</p>
                // `;
                // $("#meta_details").html(html);
            } else {
                console.error('Error in API response:', resp);
            }
        },
        error: function (err) {
            console.error('AJAX Error:', err);
        }
    });
}
function load_tags() {
    $.ajax({
        url: "<?= base_url('/api/get/frontendtags') ?>",  // API endpoint to fetch tags
        type: "GET",
        success: function (resp) {
            if (resp.status) {
                if (resp.user_data.length > 0) {
                    // Iterate over the tags in the response
                    $.each(resp.user_data, function (index, tag) {
                        // Alert each tag name (optional for debugging)
                        // alert(tag.tag_name);  // Ensure you're accessing 'tag_name' correctly
                        
                        // Append each tag as a meta tag in the head of the document
                        $("head").append(`
                            <meta content="${tag.tag_name}" name="tags">
                        `);
                    });
                }
            } else {
                console.log('No tags found or error fetching data');
            }
        },
        error: function (err) {
            console.log(err);
        },
        complete: function () {
            // Optional: Any code to run after the AJAX request finishes
        }
    });
}

$(document).ready(function () {
    get_admin_meta();
	load_tags();
});

</script>