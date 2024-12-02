<!doctype html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8">
    <title>
        <?= $title ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <meta content="Themesbrand" name="copyright"> -->
    <div id="meta_details" class="meta-details">

    </div>

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>public/uploads/logo/1719471094_0d07ea021a9fc491eb74.png">

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>public/assets_admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?= base_url() ?>public/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?= base_url() ?>public/assets_admin/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>public/assets_admin/css/custom.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-ROBdErehxIu+Y/Bgy5ZsEgGQJ14gwYpS7YCS4xGOEl0x2TRccKoE+LYhCFOShXsO" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <? //require_once(APPPATH . 'views/inc/main_css.php');      ?>
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
        #alert {
            position: fixed;
            top: 80px;
            z-index: 10000;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            left: 0px;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        /* Scrollbar Track */
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }

        /* Scrollbar Thumb */
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            /* Blueish thumb color */
            border-radius: 10px;
        }

        /* Scrollbar Thumb Hover */
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.8);
            /* Lighter blueish thumb color on hover */
        }

        /* Scrollbar Thumb Active */
        ::-webkit-scrollbar-thumb:active {
            background: rgba(255, 255, 255, 1);
            /* Darkest blueish thumb color on click */
        }

        #table-product-list-all_wrapper {
            overflow-x: scroll;
        }

        .dt-input {
            position: relative;
        }

        .dt-input input {
            width: 250px;
            height: 32px;
            background: #fcfcfc;
            border: 1px solid #aaa;
            border-radius: 5px;
            box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
            text-indent: 10px;
        }

        .dt-input .fa-search {
            position: absolute;
            top: 10px;
            left: auto;
            right: 10px;
        }

        .dt-input {
            outline: none;
        }

        .dt-length label {
            display: none;
        }
    </style>
  
</head>

<body>
    <div id="alert">

    </div>
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