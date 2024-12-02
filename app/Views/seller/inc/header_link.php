<!doctype html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8">
    <title>
        <?= $title ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description">
    <meta content="" name="author">
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
