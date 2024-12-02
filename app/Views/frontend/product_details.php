<style>
    .varient_img{
        height: 60px !important;
        width: 60px !important;
        object-fit:contain;
    }
    .out_of_stock {
        background-color: #f8f9fa; 
        color: #fff; 
        background-color: #f8f9fa;
        color: #adb5bd;
        border: none;
        outline: none;
        cursor: not-allowed;
    }
    .size {
    height: 30px;              /* Fixed height */
    width: 30px;               /* Fixed width - same as height */
    border: 1px solid black;
    border-radius: 50%;        /* Ensures the button is circular */
    padding: 0;                /* Remove padding */
    display: inline-flex;      /* Ensures the button content aligns properly */
    justify-content: center;   /* Centers the content horizontally */
    align-items: center;       /* Centers the content vertically */
    box-sizing: border-box;    /* Includes border in the element's dimensions */
}

    
/* Active size styling */
    #product_size .size.active {
        font-weight: bold;
        background-color: #ff9f0d; /* Blue background for the selected size */
        color: white;  /* White text color for the selected size */
    }
    #size_chart_link{
        font-size: 50%;
        text-decoration: underline;
        margin-left:60px;
    } #size_chart_link_pc{
        font-size: 15px;
        text-decoration: underline;
    }
    #size_chart_button{
        margin-top: 10px;
    }
    @media (min-width: 600px) {
        #size_chart_link {
            display:none;
        }
    }
    @media (max-width: 600px) {
        #size_chart_link_pc {
            display:none;
            
            
        }
    }
    #size_chart_link a {
        color: #ff9f0d; /* Sets the link color to the desired color */
     
    }
    #size_chart_link_pc a {
        color: #ff9f0d; /* Sets the link color to the desired color */
     
    }
    #product_size_label{
        font-size: 19px;
    }
    .style-available{
        color:green;
        font-size: 12px;
    }
    
    /* @media only screen and (device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) {
        .add-to-cart {
            position: relative !important;
           
        }
    }

    @media only screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) {
        .add-to-cart {
            position: relative !important;
        }
    } */


</style>
     <!-- Product Details start -->
     <div class="container">
        <!-- banner section-->
        <div class="product-image">
            <!-- <img src="https://s3-alpha-sig.figma.com/img/fb4b/27f3/05bb9212ad4bab77ded2a533b28af299?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fBJqrr8YgZXntYItzLgxEdCV4T6BsEwURJU4wFeJkNwZHd7GZ5xgLLym~0sCQ69vdchrOy89Hsvn~INXzrsj9e9oGbxDAuuXduZkPO6wOpqNEhH5cJqK-akJGGuwcKZn9y1OMQzy9LxrG5MPPuwJ8fWqFut76~R2P7LaHrdJCR23wc~KA--UkoLdsBNFxEz67BWPrvyJafHGBB394R7a01hOLS-PRFdRiDkg7Jnvd04dT~5JrkJpUxiQSfCDJrKnVAwPkTOos0hh1yNr3wsXhd8xkj7QoIaH8zeov~JS6hFZ0yixxNrt0K4eXrXmirnYzR7PNYDDctohqCT-IHMmlw__" alt="Product Image">
            <a class="share-product-image">
                <img src="https://s3-alpha-sig.figma.com/img/e0aa/ea03/c381132ce1af427d89c38e358ab06a5a?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=UQxqG4JppzE-~s3Um3Gr553bvMQE3S6Iz8TY1nciswZSiwvmIb8nc~5WQhTW~20Fn9zI7UAA-YcI4dv773PFU5cp55Fvz6lbGkpjPdNwqozIPDO5WTAWrXg5K6HZhfu2VHVIoNRgIWv6gZVw5-803ZPlRgQ67MrWuWAmRbm9b6H1guKZQjlCPZA0l5W4Tff6ty8BdHmfwM-vY~KexrqbPlx0j-idL-JAXvFOUPqDbRe8BriF0T2wDNPORrL9JU0Pqew-~VlCpnGQtUwsknB73WfAYiqvHEYlQlDGyVc6ff3JXL5-zrXrAnAeLOnlmvrvROVeR8tgAacqHQtusc7lFA__" alt="Product Image">
            </a> -->
            <!--  Carousel banner start-->
        <section class="carousel-section">
          <div
            id="carouselExampleFade"
            class="carousel slide carousel-fade"
            data-ride="carousel"
          >
            <!-- Indicators -->
            <ol class="carousel-indicators" id="product_img_indecator">
              <!-- <li
                data-target="#carouselExampleFade"
                data-slide-to="0"
                class="active"
              ></li>
              <li data-target="#carouselExampleFade" data-slide-to="1"></li>
              <li data-target="#carouselExampleFade" data-slide-to="2"></li> -->
            </ol>
            <!-- Carousel Items -->
            <div class="carousel-inner" id="product_main_image">
              <!-- <div class="carousel-item active">
                <div class="carousel-caption">
                  <img
                    class="carousel-img d-block w-100"
                    src="https://natcopharmausa.com/wp-content/uploads/2023/11/Slider-img-06-1024x683.jpg"
                    alt=""
                  />
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption">
                  <img
                    class="carousel-img d-block w-100"
                    src="https://natcopharmausa.com/wp-content/uploads/2023/11/Slider-img-07-1024x683.jpg"
                    alt=""
                  />
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption">
                  <img
                    class="carousel-img d-block w-100"
                    src="https://natcopharmausa.com/wp-content/uploads/2023/11/Slider-img-06-1024x683.jpg"
                    alt=""
                  />
                </div>
              </div> -->
            </div>
          </div>
        </section>
        <!-- Carousel banner end -->
        </div>
        
        <!-- Details section -->
        <div class="product-details">
            <div class="row">
                <div class="col-sm-6 col-6">
                    <div class="keyword-div" id="keyword_div"></div> <br>
                </div>
                <div class="col-sm-6 col-6">
                    <div style="text-align:right;" class="col-lg-6 col-6" id="size_chart_link">
                </div>
                    
                </div>

                <!-- Popup Modal for Size Chart -->
                <div id="sizeChartModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7); z-index: 9999; text-align: center;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px;">
                        <img id="sizeChartImage" src="" alt="Size Chart" style="max-width: 100%; height: auto;">
                        <br>
                        <button class='btn btn-warning' id='size_chart_button' onclick="closePopup()"><i class="fa fa-close"></i></button>
                    </div>
                </div>
            </div>
            <h2 class="product-name" id="product_name" style="margin-top:-23px"></h2>
            <a class="share-desktop-screen">  <!--Share icon for Desktop screen -->
              <img src="<?= base_url() ?>public/assets/ztImages/share_img.png" alt="Product Image">
              Share now
            </a>

            <div class="rating">
                        <span class="star-cont"> <span class="star">★</span>  <span class="rating-num" id="overall_rateing"></span> <span class="rating-count" id="total_rateing"></span> </span>
                        <a href="javascript:void(0)" onclick="review_modal_open()" class="review-link">See Review</a>
                    </div>
            <div class="price-quantity">
                <span class="price" id="product_price"></span>
                <div class="quantity-selector">
                    <button class="quantity-btn" id="decrease" onclick="decrease_qty()">−</button>
                    <span id="quantity">1</span>
                    <button class="quantity-btn" id="increase" onclick="increase_qty()">+</button>
                </div>
            </div>
            <!-- <p class="product-description" id="product_description">
                Brown the beef better. Lean ground beef - I like to use 85% lean angus. Garlic - use fresh chopped. Spices - chili powder, cumin, onion powder.
                Brown the beef better. Lean ground beef - I like to use 85% lean angus. Garlic - use fresh chopped. Spices - chili powder, cumin, onion powder.
            </p> -->
            <ul id="product_stock"></ul><br>
            <span style="color:red;" id="stock_msg"></span>

            <div class="col-lg-6 col-6" id="size_chart_link_pc"></div>

           <div id="product_description">

           </div> <br>
           <div class="product-form product-variation-form product-color-swatch">
                <label style="font-size:19px"><b>Varient</b></label>
                <div class="d-flex align-items-center product-variations" id="all_varient_img">
                    <!-- <a href="#" class="color" style="background-color: #ffcc01"></a>
                    <a href="#" class="color" style="background-color: #ca6d00;"></a>
                    <a href="#" class="color" style="background-color: #1c93cb;"></a>
                    <a href="#" class="color" style="background-color: #ccc;"></a>
                    <a href="#" class="color" style="background-color: #333;"></a> -->
                </div>
            </div>
            <div class="product-form product-variation-form product-size-swatch">
                <label class="mb-1" id="product_size_label"><b>Size</b></label>
                <div class="flex-wrap d-flex align-items-center product-variations" id="product_size">
                    <!-- <a href="#" class="size">Small</a>
                    <a href="#" class="size">Medium</a>
                    <a href="#" class="size">Large</a>
                    <a href="#" class="size">Extra Large</a> -->
                </div>
                <!-- <a href="#" class="product-variation-clean">Clean All</a> -->
            </div>
            <!-- desktop screen cart section -->
            <div class="add-to-cart desktop-screen-cart" id="product_add_to_cart_button">
                <!-- <button class="add-to-cart-btn checkout-btn">Add to Cart</button>
                <button class="add-to-cart-btn Buy-btn">Buy Now</button> -->
            </div>
            <!-- ****For Mobile screen ui of details****-->
            <div class="addons mobile-screen-addons">
                <p>Choice of Add On</p>
                <div class="addons-op-wrapper" id="similar_product_mobile">
                    <!-- <div class="addon-option">
                        <div class="inner-divider">
                            <img src="https://s3-alpha-sig.figma.com/img/ef90/a617/1021c0e53988c049198d1c530de300eb?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=CBrGoiI3UOy4iPBpwI4gGwJ7cN9eFiN18cqi5mNu17Je~XBUxZJY0Usvkpu~gO70rS6TQvHKirwffLwcaqlyN0bsTC9eYaawqCJVTPi-s2pQ-ACalLg~HAGfPBh3D10HZqQ5Q1~C3AFW9BceELjHqE2Co-5DL773KohNX8Ih6nX62tYj3crOJf9F5YdQs-spE7D9i45PmakTlmV3qGMUYZdCGRvuBD8RJLAD98Vciz-CgYkll5QTrwb7gVvwvPHrlCOknK3Ip2~HzCKWteqjcEEg22O3Q6bEUqBKUQsSlQlSdyVBxqmRO8GB-~rlvF6yCw3uQFSLVRHsUGDnvXi3XQ__" alt="product-img">
                            <label for="pepper">Pepper Julienned</label>
                        </div>
                        <div class="inner-divider">
                            <span class="addon-price">+₹89.99</span>
                            <input type="radio" name="addon" id="pepper" checked>
                        </div>
                    </div> -->
                    <!-- <div class="addon-option">
                        <div class="inner-divider">
                            <img src="https://s3-alpha-sig.figma.com/img/ef90/a617/1021c0e53988c049198d1c530de300eb?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=CBrGoiI3UOy4iPBpwI4gGwJ7cN9eFiN18cqi5mNu17Je~XBUxZJY0Usvkpu~gO70rS6TQvHKirwffLwcaqlyN0bsTC9eYaawqCJVTPi-s2pQ-ACalLg~HAGfPBh3D10HZqQ5Q1~C3AFW9BceELjHqE2Co-5DL773KohNX8Ih6nX62tYj3crOJf9F5YdQs-spE7D9i45PmakTlmV3qGMUYZdCGRvuBD8RJLAD98Vciz-CgYkll5QTrwb7gVvwvPHrlCOknK3Ip2~HzCKWteqjcEEg22O3Q6bEUqBKUQsSlQlSdyVBxqmRO8GB-~rlvF6yCw3uQFSLVRHsUGDnvXi3XQ__" alt="product-img">
                            <label for="baby-spinach">Baby Spinach</label>
                        </div>
                        <div class="inner-divider">
                            <span class="addon-price">+₹89.99</span>
                            <input type="radio" name="addon" id="baby-spinach">
                        </div>
                    </div>
                    <div class="addon-option">
                        <div class="inner-divider">
                            <img src="https://s3-alpha-sig.figma.com/img/ef90/a617/1021c0e53988c049198d1c530de300eb?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=CBrGoiI3UOy4iPBpwI4gGwJ7cN9eFiN18cqi5mNu17Je~XBUxZJY0Usvkpu~gO70rS6TQvHKirwffLwcaqlyN0bsTC9eYaawqCJVTPi-s2pQ-ACalLg~HAGfPBh3D10HZqQ5Q1~C3AFW9BceELjHqE2Co-5DL773KohNX8Ih6nX62tYj3crOJf9F5YdQs-spE7D9i45PmakTlmV3qGMUYZdCGRvuBD8RJLAD98Vciz-CgYkll5QTrwb7gVvwvPHrlCOknK3Ip2~HzCKWteqjcEEg22O3Q6bEUqBKUQsSlQlSdyVBxqmRO8GB-~rlvF6yCw3uQFSLVRHsUGDnvXi3XQ__" alt="product-img">
                            <label for="masroom">Masroom</label>
                        </div>
                        <div class="inner-divider">
                            <span class="addon-price">+₹19.99</span>
                            <input type="radio" name="addon" id="masroom">
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- mobile screen cart section -->
            <div class="add-to-cart mobile-screen-cart">
                <p class="total-price" id="product_price_mobile"></p> &nbsp;
                <a href="javascript:void(0)" id="add_to_catr_btn_mobile">
                  <!-- <button class="add-to-cart-btn">Add to Cart</button> -->
                </a>
            </div>
        </div>
    </div>
    <!-- ****For Desktop screen ui of details****-->
    <div class="container addons desktop-screen-addons">
        <p>Choice of Add On</p>
        <div class="addons-op-wrapper" id="similar_product">
            <!-- <div class="addon-option">
                <div class="inner-divider">
                    <img src="https://s3-alpha-sig.figma.com/img/ef90/a617/1021c0e53988c049198d1c530de300eb?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=CBrGoiI3UOy4iPBpwI4gGwJ7cN9eFiN18cqi5mNu17Je~XBUxZJY0Usvkpu~gO70rS6TQvHKirwffLwcaqlyN0bsTC9eYaawqCJVTPi-s2pQ-ACalLg~HAGfPBh3D10HZqQ5Q1~C3AFW9BceELjHqE2Co-5DL773KohNX8Ih6nX62tYj3crOJf9F5YdQs-spE7D9i45PmakTlmV3qGMUYZdCGRvuBD8RJLAD98Vciz-CgYkll5QTrwb7gVvwvPHrlCOknK3Ip2~HzCKWteqjcEEg22O3Q6bEUqBKUQsSlQlSdyVBxqmRO8GB-~rlvF6yCw3uQFSLVRHsUGDnvXi3XQ__" alt="product-img">
                    <label for="pepper">Pepper Julienned</label>
                </div>
                <div class="inner-divider">
                    <span class="addon-price">+₹89.99</span>
                    <input type="radio" name="addon" id="pepper" checked>
                </div>
            </div> -->
            <!-- <div class="addon-option">
                <div class="inner-divider">
                    <img src="https://s3-alpha-sig.figma.com/img/ef90/a617/1021c0e53988c049198d1c530de300eb?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=CBrGoiI3UOy4iPBpwI4gGwJ7cN9eFiN18cqi5mNu17Je~XBUxZJY0Usvkpu~gO70rS6TQvHKirwffLwcaqlyN0bsTC9eYaawqCJVTPi-s2pQ-ACalLg~HAGfPBh3D10HZqQ5Q1~C3AFW9BceELjHqE2Co-5DL773KohNX8Ih6nX62tYj3crOJf9F5YdQs-spE7D9i45PmakTlmV3qGMUYZdCGRvuBD8RJLAD98Vciz-CgYkll5QTrwb7gVvwvPHrlCOknK3Ip2~HzCKWteqjcEEg22O3Q6bEUqBKUQsSlQlSdyVBxqmRO8GB-~rlvF6yCw3uQFSLVRHsUGDnvXi3XQ__" alt="product-img">
                    <label for="baby-spinach">Baby Spinach</label>
                </div>
                <div class="inner-divider">
                    <span class="addon-price">+₹89.99</span>
                    <input type="radio" name="addon" id="baby-spinach">
                </div>
            </div>
            <div class="addon-option">
                <div class="inner-divider">
                    <img src="https://s3-alpha-sig.figma.com/img/ef90/a617/1021c0e53988c049198d1c530de300eb?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=CBrGoiI3UOy4iPBpwI4gGwJ7cN9eFiN18cqi5mNu17Je~XBUxZJY0Usvkpu~gO70rS6TQvHKirwffLwcaqlyN0bsTC9eYaawqCJVTPi-s2pQ-ACalLg~HAGfPBh3D10HZqQ5Q1~C3AFW9BceELjHqE2Co-5DL773KohNX8Ih6nX62tYj3crOJf9F5YdQs-spE7D9i45PmakTlmV3qGMUYZdCGRvuBD8RJLAD98Vciz-CgYkll5QTrwb7gVvwvPHrlCOknK3Ip2~HzCKWteqjcEEg22O3Q6bEUqBKUQsSlQlSdyVBxqmRO8GB-~rlvF6yCw3uQFSLVRHsUGDnvXi3XQ__" alt="product-img">
                    <label for="masroom">Masroom</label>
                </div>
                <div class="inner-divider">
                    <span class="addon-price">+₹19.99</span>
                    <input type="radio" name="addon" id="masroom">
                </div>
            </div> -->
        </div>
    </div>
    <!-- Product Details start -->

    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->
<style>
    .modal-dialog {
        max-width: 750px; /* Adjust the width to your preference */
        margin: auto;
    }

    @media(max-width:430px) {
        .reviews-section{
            padding-bottom:50px;
        }
        #exampleModal{
            margin-top: 50px;
        }
    }
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Customer Reviews</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <!-- Reviews section start-->
        <div class="reviews-section" style="overflow-y:hidden;">
            <h2>Expart Review</h2>
            <div class="review">
                <div class="rating" id="expart_rateing"></div>
                <div class="user" id="expart_name"></div>
                <div class="comment" id="expart_review"></div>
            </div>
            <h2>Give your review</h2>
            <div class="review">
                <form class="product-review-form">
                    <div class="product-wrapper">
                        <div class="product-image" id="product_modal_img">
                            <!-- <img class="img-fluid" alt="Solid Collared Tshirts" src="../assets/images/fashion/product/26.jpg"> -->
                        </div>
                        <div class="product-content">
                            <h5 class="name" id="product_modal_name"></h5>
                            <div class="product-review-rating">
                                <div class="product-rating" id="product_modal_price">
                                    <!-- <h6 class="price-number">$16.00</h6> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="review-box">
                        <div class="product-review-rating">
                            <label>Rating</label>
                            <div class="product-rating">
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="review-box">
                        <label for="content" class="form-label">Your Review *</label>
                        <textarea id="reviewContent" rows="3" class="form-control" placeholder="Your Review"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mt-2" id="review_add_btn" onclick="submit_review()">submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="reviews-section" style="overflow-y:hidden; overflow-y:scroll;" id="list_of_reviews">
            <!-- <h2>Customer Reviews</h2>
            <div class="review">
                <form class="product-review-form">
                    <div class="product-wrapper">
                        <div class="product-image" id="product_modal_img">
                        </div>
                        <div class="product-content">
                            <h5 class="name" id="product_modal_name"></h5>
                            <div class="product-review-rating">
                                <div class="product-rating" id="product_modal_price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="review-box">
                        <div class="product-review-rating">
                            <label>Rating</label>
                            <div class="product-rating">
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="review-box">
                        <label for="content" class="form-label">Your Review *</label>
                        <textarea id="reviewContent" rows="3" class="form-control" placeholder="Your Review"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mt-2" id="review_add_btn">submit</button>
                    </div>
                </form>
            </div> -->
            <!-- <div class="review">
                <div class="rating">⭐⭐⭐⭐⭐</div>
                <div class="user">User Name</div>
                <div class="comment">Great product! Highly recommend.</div>
            </div> -->
            <!-- <div class="review">
                <div class="rating">⭐⭐⭐⭐</div>
                <div class="user">User Name</div>
                <div class="comment">Good quality, but a bit expensive.</div>
            </div>
            <div class="review">
                <div class="rating">⭐⭐⭐⭐</div>
                <div class="user">User Name</div>
                <div class="comment">Good quality, but a bit expensive.</div>
            </div>
            <div class="review">
                <div class="rating">⭐⭐⭐⭐</div>
                <div class="user">User Name</div>
                <div class="comment">Good quality, but a bit expensive.</div>
            </div> -->
            <!-- More reviews -->
        </div>
        <!-- Reviews section end -->
      </div>
      <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      <!-- </div> -->
    </div>
  </div>
</div>