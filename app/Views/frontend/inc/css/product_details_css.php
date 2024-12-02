<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: gray; /* Change arrow color to gray */
    }

    .fixed-size-image {
        max-width: 100%; 
        max-height: 100%;
        object-fit: cover; /* Maintain aspect ratio and crop image if needed */
    }

    .image-row {
            display: flex;
            justify-content: center; /* Center the images horizontally */
            align-items: center; /* Center the images vertically */
            flex-wrap: wrap; /* Wrap the images to the next line if they don't fit */
        }

        .image-row img {
            width: 80px; /* Set the width of each image */
            height: 80px; /* Set the height of each image */
            object-fit: cover; /* Ensure images cover the area without distortion */
            margin: 2px; /* Add some space between images */
            cursor: pointer;
        }

        .modal-dialog {
            max-width: 80%;
            margin: 1.75rem auto;
        }
        .size-chart-img {
            width: 100%;
            height: auto;
        }

        .see_size_chart{
            cursor:pointer;
        }
       
</style>


<style>
    
    .star-rating {
        direction: rtl;
        display: inline-block;
        font-size: 0;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        color: #ccc;
        font-size: 2rem;
        padding: 0;
        cursor: pointer;
        display: inline-block;
    }

    .star-rating input:checked ~ label {
        color: #f5b301;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f5b301;
    }
</style>