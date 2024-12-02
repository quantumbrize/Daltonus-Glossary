 <!--  Carousel banner start-->
 <section class="carousel-section">
      <div
        id="carouselExampleFade"
        class="carousel slide carousel-fade"
        data-ride="carousel"
      >
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleFade"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleFade" data-slide-to="1"></li>
          <li data-target="#carouselExampleFade" data-slide-to="2"></li>
        </ol>
        <!-- Carousel Items -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-caption">
              <img
                class="carousel-img d-block w-100"
                src="https://s3-alpha-sig.figma.com/img/5956/f9e1/85a7c441656f9c04e060571847710c64?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=LLHlQ4rrfJCQzXUooWP0dOwcXLDE9v6W~3id-xQNX6oOPaTpKTeL7BHQZRIYctsASfUyzH6AJo3zX0lXZFy7fLRCpkDygi4o0aXHm-Uzn~APr7BfvPkaqXzhz011wjEZhir7~LUGTKDz2ubrvTdKLOX7KlAy0zWMy2sOOznfmD-5M6-wOh~UvDkHzjIyNt3J20zQ5fkeLnTBRfV0vEo~riw-safTppZoDogbxIfnYRUGOhJ1x9sG~2Qzzs2VCFGGcLfo39N6SmhRVUveqKAMRdSA8jY1wsXUXUZqadJCOKx4PuzhX4Z~GsHqAZKLNAJh-U3xqbPEWipHTdo-d1pbbA__"
                alt=""
              />
              <!-- <h2><span>80%</span><br>On Health Products</h2>
                  <button class="btn">SHOP NOW</button> -->
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-caption">
              <img
                class="carousel-img d-block w-100"
                src="https://natcopharmausa.com/wp-content/uploads/2023/11/Slider-img-07-1024x683.jpg"
                alt=""
              />
              <!-- <h2><span>80%</span><br>On Health Products</h2>
                  <button class="btn">SHOP NOW</button> -->
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-caption">
              <img
                class="carousel-img d-block w-100"
                src="https://natcopharmausa.com/wp-content/uploads/2023/11/Slider-img-06-1024x683.jpg"
                alt=""
              />
              <!-- <h2><span>80%</span><br>On Health Products</h2>
                  <button class="btn">SHOP NOW</button> -->
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- Carousel banner end -->

    <!-- Categories section start -->
    <div class="categories-section">
        <!-- Promo-Code section -->
        <!-- Mobile Promo-Code (hidden on desktop) -->
        <div class="refer-earn-container mobile">
            <div class="section-header">
                <h2>Promo Code</h2>
                <a href="Promo-Code.html">SEE ALL <img class="right-angle-arrow" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="right-angle-arrow" /></a>
            </div>
            <div class="refer-earn">
                <div class="coupon">
                    <div class="coupon-inner">
                        <img src="<?=base_url()?>public/assets/ztImages/placeholder.png" alt="offer">
                        <p>FLAT 50% off* <br> upto $50 Surprise Cashback</p>
                    </div>
                    <div class="coupon-inner2">
                        <span class="code">CODE: BCH12</span>
                        <img src="<?=base_url()?>public/assets/ztImages/round-arrow.png" alt="offer">
                    </div>
                </div>
                <div class="coupon">
                    <div class="coupon-inner">
                        <img src="<?=base_url()?>public/assets/ztImages/placeholder.png" alt="offer">
                        <p>FLAT 50% off* <br> upto $50 Surprise Cashback</p>
                    </div>
                    <div class="coupon-inner2">
                        <span class="code">CODE: BCH12</span>
                        <img src="<?=base_url()?>public/assets/ztImages/round-arrow.png" alt="offer">
                    </div>
                </div>
            </div>
        </div>
        <style>
            .discount_container{
                position: relative;

            }

            .discount_parcent{
                position: absolute;
                top: 9px;
                left: 7px;
                font-weight: 750;
                /* color: white; */
            }

            .discount_parcent_text{
                font-size: 18px;
                letter-spacing: 5px;
            }

            .discount_parcent_number{
                font-size: 18px;
            }
        </style>
        <!-- Desktop Promo-Code (hidden on mobile) -->
        <div class="refer-earn-container desktop">
            <div class="section-header">
                <h2>Promo Code</h2>
                <a href="<?= base_url('promo-code')?>">SEE ALL <img class="right-angle-arrow" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="right-angle-arrow" /></a>
            </div>
            <div class="refer-earn-grid" id="promo_codes">
                <!-- <div class="coupon-card">
                    <div class="coupon-content">
                        <div>
                            <img class="coupon-image" src="<?=base_url()?>public/assets/ztImages/placeholder.png" alt="offer">
                        </div>
                        <div>
                            <span class="discount">FLAT <span class="discount-amount">50%</span> off* upto $50 </br> Surprise Cashback</span>
                            <span class="conditions">Only on Healthcare Products on Orders above $100</span>
                        </div>
                        <div>
                            <img class="coupon-nav-icon" src="<?=base_url()?>public/assets/ztImages/round-arrow.png" alt="offer">
                        </div>
                    </div>
                    <div class="coupon-code">
                        <span>CODE: BCH12</span>
                        <a href="#" class="copy-code">COPY CODE</a>
                    </div>
                </div> -->
                <!-- <div class="coupon-card">
                    <div class="coupon-content">
                        <div>
                            <img class="coupon-image" src="<?=base_url()?>public/assets/ztImages/placeholder.png" alt="offer">
                        </div>
                        <div>
                            <span class="discount">FLAT <span class="discount-amount">50%</span> off* upto $50 </br> Surprise Cashback</span>
                            <span class="conditions">Only on Healthcare Products on Orders above $100</span>
                        </div>
                        <div>
                            <img class="coupon-nav-icon" src="<?=base_url()?>public/assets/ztImages/round-arrow.png" alt="offer">
                        </div>
                    </div>
                    <div class="coupon-code">
                        <span>CODE: BCH12</span>
                        <a href="#" class="copy-code">COPY CODE</a>
                    </div>
                </div>
                <div class="coupon-card">
                    <div class="coupon-content">
                        <div>
                            <img class="coupon-image" src="<?=base_url()?>public/assets/ztImages/placeholder.png" alt="offer">
                        </div>
                        <div>
                            <span class="discount">FLAT <span class="discount-amount">50%</span> off* upto $50 </br> Surprise Cashback</span>
                            <span class="conditions">Only on Healthcare Products on Orders above $100</span>
                        </div>
                        <div>
                            <img class="coupon-nav-icon" src="<?=base_url()?>public/assets/ztImages/round-arrow.png" alt="offer">
                        </div>
                    </div>
                    <div class="coupon-code">
                        <span>CODE: BCH12</span>
                        <a href="#" class="copy-code">COPY CODE</a>
                    </div>
                </div>
                <div class="coupon-card">
                    <div class="coupon-content">
                        <div>
                            <img class="coupon-image" src="<?=base_url()?>public/assets/ztImages/placeholder.png" alt="offer">
                        </div>
                        <div>
                            <span class="discount">FLAT <span class="discount-amount">50%</span> off* upto $50 </br> Surprise Cashback</span>
                            <span class="conditions">Only on Healthcare Products on Orders above $100</span>
                        </div>
                        <div>
                            <img class="coupon-nav-icon" src="<?=base_url()?>public/assets/ztImages/round-arrow.png" alt="offer">
                        </div>
                    </div>
                    <div class="coupon-code">
                        <span>CODE: BCH12</span>
                        <a href="#" class="copy-code">COPY CODE</a>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="scroll-buttons">
          <button id="left-arrow" class="arrow-btn">&#9664;</button>
          <button id="right-arrow" class="arrow-btn">&#9654;</button>
        </div>

        <!-- Top 10 Sub Category Section -->
        <div class="section">
            <div class="section-header">
                <h2>Top 10 Sub Category</h2>
                <a href="Sub-Categories.html">SEE ALL <img class="right-angle-arrow" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="right-angle-arrow" /></a>
            </div>
            <div class="sub-categories">
              <a href="Sub-Categories.html">
                <div class="sub-category">
                    <img src="https://s3-alpha-sig.figma.com/img/e979/6f75/7914ca7f0bf9ba676ac0c472ad8b32cf?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=FV6kLVCImLD31-55bEfEkb5jmb5SGWsWzcfVItsovMRxuaLn5H1T12X3En5ue2uCQ8wKDRimDQNeQWDVIqqdvbxnkOstdML2l36B7hn6-zGj2CHmhvDr4NrCe1300-l9Ay97i4R-O6SaDL5horlTeS4iAGDIZkyOIIAdgxwFxdyj1QzVQD4Zyax6wCwRWm9F7D~zqfKa8fUtjP3cRnk4dq3RM60yGa5VJJwlGe2MnfRmcPzpXpLpTx399GZeQsCFokthBYDkr9ScG052r6VWszCw-GzCWlM1NOVOI2M~f-Hom2JuVOup3QM3bgM8VF7dnV5UQ2mMdWtP~kG7Lwirgg__" alt="Sub Category Name">
                    <p>Sub Category Name</p>
                </div>
              </a>
                <div class="sub-category">
                    <img src="https://s3-alpha-sig.figma.com/img/e979/6f75/7914ca7f0bf9ba676ac0c472ad8b32cf?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=FV6kLVCImLD31-55bEfEkb5jmb5SGWsWzcfVItsovMRxuaLn5H1T12X3En5ue2uCQ8wKDRimDQNeQWDVIqqdvbxnkOstdML2l36B7hn6-zGj2CHmhvDr4NrCe1300-l9Ay97i4R-O6SaDL5horlTeS4iAGDIZkyOIIAdgxwFxdyj1QzVQD4Zyax6wCwRWm9F7D~zqfKa8fUtjP3cRnk4dq3RM60yGa5VJJwlGe2MnfRmcPzpXpLpTx399GZeQsCFokthBYDkr9ScG052r6VWszCw-GzCWlM1NOVOI2M~f-Hom2JuVOup3QM3bgM8VF7dnV5UQ2mMdWtP~kG7Lwirgg__" alt="Sub Category Name">
                    <p>Sub Category Name</p>
                </div>
                <div class="sub-category">
                    <img src="https://s3-alpha-sig.figma.com/img/e979/6f75/7914ca7f0bf9ba676ac0c472ad8b32cf?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=FV6kLVCImLD31-55bEfEkb5jmb5SGWsWzcfVItsovMRxuaLn5H1T12X3En5ue2uCQ8wKDRimDQNeQWDVIqqdvbxnkOstdML2l36B7hn6-zGj2CHmhvDr4NrCe1300-l9Ay97i4R-O6SaDL5horlTeS4iAGDIZkyOIIAdgxwFxdyj1QzVQD4Zyax6wCwRWm9F7D~zqfKa8fUtjP3cRnk4dq3RM60yGa5VJJwlGe2MnfRmcPzpXpLpTx399GZeQsCFokthBYDkr9ScG052r6VWszCw-GzCWlM1NOVOI2M~f-Hom2JuVOup3QM3bgM8VF7dnV5UQ2mMdWtP~kG7Lwirgg__" alt="Sub Category Name">
                    <p>Sub Category Name</p>
                </div>
                <div class="sub-category">
                    <img src="https://s3-alpha-sig.figma.com/img/e979/6f75/7914ca7f0bf9ba676ac0c472ad8b32cf?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=FV6kLVCImLD31-55bEfEkb5jmb5SGWsWzcfVItsovMRxuaLn5H1T12X3En5ue2uCQ8wKDRimDQNeQWDVIqqdvbxnkOstdML2l36B7hn6-zGj2CHmhvDr4NrCe1300-l9Ay97i4R-O6SaDL5horlTeS4iAGDIZkyOIIAdgxwFxdyj1QzVQD4Zyax6wCwRWm9F7D~zqfKa8fUtjP3cRnk4dq3RM60yGa5VJJwlGe2MnfRmcPzpXpLpTx399GZeQsCFokthBYDkr9ScG052r6VWszCw-GzCWlM1NOVOI2M~f-Hom2JuVOup3QM3bgM8VF7dnV5UQ2mMdWtP~kG7Lwirgg__" alt="Sub Category Name">
                    <p>Sub Category Name</p>
                </div>
                <!-- Add more sub-categories as needed -->
            </div>
        </div>

        <!-- Other Shops Section -->
        <div class="section">
            <div class="section-header">
                <h2>Other Shops</h2>
                <a href="#">SEE ALL <img class="right-angle-arrow" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="right-angle-arrow" /></a>
            </div>
            <div class="shops">
                <div class="shop">
                    <img src="https://s3-alpha-sig.figma.com/img/414d/d237/21ec4c29c2adca6253b02d15e6cdde21?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=FWLGCE-tCCiTo5purUOC1QUBBIXh7MV3r~Z4foVfZSHYu-tjwxZ2QUAdZdGMdZZVQ1G1nGhVBcq0D7rVzw4N0UUeC1Nt1VfnVoq62Zj7kELSWU7Sj7lRGE2urJwpQ9uRqtRHwPhfjeGyF-qaP66K4v~f6lYtUJStGVr00hQpmabsURbk5Ii7uqVCGQ5EItGFDevwybV0Cu7nUOWtAcH25lUFDgHyd-Rds80ej8J9qDUaH~3h~vsNCYX6LcU4NxeIuynEcEVAVOslKoAHTdkUdjz4iT3vfmKiDRwvz3KqCYxdW4uzTfNnHkbOiAioJSuM8eplN5cVfoetYGJd-xdTpQ__" alt="Shop Name">
                    <p>Shop Name</p>
                </div>
                <div class="shop">
                    <img src="https://s3-alpha-sig.figma.com/img/414d/d237/21ec4c29c2adca6253b02d15e6cdde21?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=FWLGCE-tCCiTo5purUOC1QUBBIXh7MV3r~Z4foVfZSHYu-tjwxZ2QUAdZdGMdZZVQ1G1nGhVBcq0D7rVzw4N0UUeC1Nt1VfnVoq62Zj7kELSWU7Sj7lRGE2urJwpQ9uRqtRHwPhfjeGyF-qaP66K4v~f6lYtUJStGVr00hQpmabsURbk5Ii7uqVCGQ5EItGFDevwybV0Cu7nUOWtAcH25lUFDgHyd-Rds80ej8J9qDUaH~3h~vsNCYX6LcU4NxeIuynEcEVAVOslKoAHTdkUdjz4iT3vfmKiDRwvz3KqCYxdW4uzTfNnHkbOiAioJSuM8eplN5cVfoetYGJd-xdTpQ__" alt="Shop Name">
                    <p>Shop Name</p>
                </div>
                <!-- Add more shops as needed -->
            </div>
        </div>
    </div>
    <!-- Categories section end -->