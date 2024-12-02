<style>
    .gallery-product img {
        height: 215px;
    }

    .gallery-product {
        overflow: hidden;
    }

    #all_products {
        height: fit-content !important;
    }

    .product-h2 {
        position: absolute;
        margin-left: 20px !important;
    }

    .search-section {
        /* position: absolute; */
        /* right: 0;
        top: 0; */
        margin-top: 40px;
    }

    

    /* Tablet view (portrait and landscape) */
    @media (min-width: 600px) and (max-width: 1024px) {
        /* .auth-form .form-group .form-input {
            width: 34%;
            position: relative;
        } */
    }

    /* Desktop view */
    @media (min-width: 1025px) {
        /* .auth-form .form-group .form-input {
            width: 34%;
            position: relative;
        } */
    }

    @media only screen and (max-width: 767px) {

        /* .view-all-products{
            margin-top: 800px !important;
        } */
        .ecommerce-home {
            min-height: 100px;
        }

        #product-grid {
            margin-top: 30px !important;
        }

        .carousel-fade {
            margin-top: -39px !important;
        }

        .style-container {
            margin-top: 10px !important;
            height: 112vh !important;

        }
    }

    @media only screen and (max-width: 767px) {

        /* .view-all-products{
            margin-top: 800px !important;
        } */
        .img-fluid {
            height: 40vh;
            object-fit: cover;
        }

        #promotion_card .col-md-6 {
            flex-basis: 50%;
            max-width: 50%;
        }
    }

    /* .img-fluid {
        width: 100%;
        height: 50%;
        object-fit: cover;
    } */

    #banner_img .nav-item {
        display: none;
    }


    /* CSS for side-by-side cards on large screens */
    /* @media (min-width: 992px) {
    .promotion_card .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
} */

    /* CSS for stacked cards on smaller screens */
    /* @media (max-width: 991px) {
    .promotion_card .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
} */






    .image-container {
        width: 100%;
        /* or any specific width you want */
        position: relative;
    }

    .image-container:before {
        content: "";
        display: block;
        padding-top: 45.25%;
        /* 9/16 = 0.5625; 16:9 aspect ratio */
    }

    .carousel_img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensure the image covers the container */
    }
</style>