<style>
  #product_details{
    margin-top: 10px;
  }
  @media (max-width: 768px) {
        #banner_img {
            margin-top:100px;
        }
    }

    .style-available{
        color:green;
        font-size: 12px;
    }
</style>
<!--  Carousel banner start-->
<section class="carousel-section">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators" id="banner_img_indicator">
      <!-- <li
            data-target="#carouselExampleFade"
            data-slide-to="0"
            class="active"></li>
          <li data-target="#carouselExampleFade" data-slide-to="1"></li>
          <li data-target="#carouselExampleFade" data-slide-to="2"></li> -->
    </ol>
    <!-- Carousel Items -->
    <div class="carousel-inner" id="banner_img">
      <!-- <div class="carousel-item active">
            <div class="carousel-caption">
              <img
                class="carousel-img d-block w-100"
                src="https://s3-alpha-sig.figma.com/img/5956/f9e1/85a7c441656f9c04e060571847710c64?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=LLHlQ4rrfJCQzXUooWP0dOwcXLDE9v6W~3id-xQNX6oOPaTpKTeL7BHQZRIYctsASfUyzH6AJo3zX0lXZFy7fLRCpkDygi4o0aXHm-Uzn~APr7BfvPkaqXzhz011wjEZhir7~LUGTKDz2ubrvTdKLOX7KlAy0zWMy2sOOznfmD-5M6-wOh~UvDkHzjIyNt3J20zQ5fkeLnTBRfV0vEo~riw-safTppZoDogbxIfnYRUGOhJ1x9sG~2Qzzs2VCFGGcLfo39N6SmhRVUveqKAMRdSA8jY1wsXUXUZqadJCOKx4PuzhX4Z~GsHqAZKLNAJh-U3xqbPEWipHTdo-d1pbbA__"
                alt=""
              />
              <h2><span>80%</span><br>On Health Products</h2>
                  <button class="btn">SHOP NOW</button>
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
<!-- Carousel banner end -->

<!-- Categories section start -->
<div class="categories-section">
  <div class="categories-header">
    <h2>Categories</h2>
    <a href="<?= base_url('product/list') ?>">
      See All
      <img class="right-angle-arrow" src="<?= base_url() ?>public/assets/ztImages/right-angle-arrow.png"
        alt="right-angle-arrow" />
    </a>
  </div>

  <div class="categories-content mobile-screen-categories-content">
    <div class="left-side" id="left_side_category">
      <!-- <div class="category-card large">
            <img
              class="large-category-img"
              src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div> -->
    </div>
    <div class="right-side" id="right_side_category">
      <!-- <div class="category-card medium">
            <img
              class="large-category-img"
              src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card medium">
            <img
              class="large-category-img"
              src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card medium">
            <img
              class="large-category-img"
              src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card medium">
            <img
              class="large-category-img"
              src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div> -->
    </div>
  </div>
  <!-- Arrow buttons for scrolling on desktop screen -->
  <!-- <div class="scroll-buttons">
        <button id="left-arrow" class="arrow-btn">&#9664;</button>
        <button id="right-arrow" class="arrow-btn">&#9654;</button>
      </div> -->

  <div class="small-categories-container mobile-screen-categories-content" id="rest_category">
    <!-- <div class="small-category-card d-block d-md-none">
          <img
            class="small-category-img"
            src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
            alt=""
          />
          <div class="overlay">CATEGORY NAME</div>
        </div>
        <div class="small-category-card d-block d-md-none">
          <img
            class="small-category-img"
            src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
            alt=""
          />
          <div class="overlay">CATEGORY NAME</div>
        </div>
        <div class="small-category-card d-block d-md-none">
          <img
            class="small-category-img"
            src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
            alt=""
          />
          <div class="overlay">CATEGORY NAME</div>
        </div>
        <div class="small-category-card d-block d-md-none">
          <img
            class="small-category-img"
            src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
            alt=""
          />
          <div class="overlay">CATEGORY NAME</div>
        </div>
        <div class="small-category-card d-block d-md-none">
          <img
            class="small-category-img"
            src="https://s3-alpha-sig.figma.com/img/d3da/d0b6/f2caf6278d8c7fb61228cf53713715fa?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RqvnB~o9cwEL0QBBS-qmv5ipcsnrH0Sor4QHR~RQ6SZ5DylXKMqJMb~cJfonJ73xC4lV5RB6mJEXmGVJeb7eaHUQyhPg1rWQMisQo2xmda-kCccVjWoTT7H6hsxUf~OV6FfS~RCWuT-O~YniVtqKsyA~8H43Tw3KeqLZP4ZhhL9-kDfATSZ9mi9jc04bPYSzBpFxVnWtDoQc4y4jXJqsFWbC2pCoWoP5o9sRvvu7FLuIdb9~xi-BzqLPV6nxQqCUYa5dFG76qrhio~d9fS6u-9wTy~t0ekdwmaLB2JVvoQlDALa55FwtTWqJWrJBh7wmOGHFL9HCHdK3nNZIyqMlqA__"
            alt=""
          />
          <div class="overlay">CATEGORY NAME</div>
        </div> -->
  </div>
  <!-- for desktop screen -->
  <div class="categories-content desktop-screen-categories-content">
    <div class="desktop-side" id="all_categoris_desktop">
      <!-- <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div>
          <div class="category-card large">
            <img
              class="large-category-img"
              src="../assets/ztImages/category_bg_image.png"
              alt=""
            />
            <div class="overlay">CATEGORY NAME</div>
          </div> -->
    </div>
  </div>
  <!-- Arrow buttons for scrolling on desktop screen -->
  <div class="scroll-buttons">
    <button id="left-arrow" class="arrow-btn">&#9664;</button>
    <button id="right-arrow" class="arrow-btn">&#9654;</button>
  </div>
<br>
<br>

<!-- <div> -->
  <h2 class="product-h2">Products</h2>
  <section class="search-section desktop-search">
    <div class="custom-container">
      <form class="auth-form search-head" target="_blank">
          
        <div class="form-group">
          <div class="form-input">
            <input type="search" class="form-control search" id="inputproductname" onkeyup="search_product()"
              placeholder="Search Products" list="productssss" />
            <a href="#search-filter" class="header-search-icon" data-bs-toggle="modal">
              <img class="search_img" src="<?= base_url() ?>public/assets/ztImages/search-icon.png"
                alt="location_icon" />
            </a>
          </div>
        </div>
      </form>
        <datalist id="productssss">
            <option value="T-SHIRT">
            <option value="SHOES">
            <option value="JEANS">
            <option value="SAREE">
            <option value="FACE WASH">
        </datalist>
    </div>
  </section>

  <div class="container style-container">

    <div class="main-content" id="product-grid">

    </div>
  </div>
</div>
</div>
<!-- Categories section end -->
<!-- <h2 style="margin-left: 150px;">Products</h2> -->

<style>
    /* General Styles */
    .main-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        padding: 20px;
        background: linear-gradient(135deg, #e3f2fd 25%, #bbdefb 25%, #bbdefb 50%, #e3f2fd 50%, #e3f2fd 75%, #bbdefb 75%, #bbdefb 100%);
        background-size: 40px 40px;
        min-height: 55vh;
    }

    .confession-card,
    .guides-card,
    .survey-card {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 350px;
        transition: transform 0.3s ease;
        position: relative;
        z-index: 1; /* To ensure it is above the background pattern */
    }

    .confession-card:hover,
    .guides-card:hover,
    .survey-card:hover {
        transform: scale(1.05);
    }

    h2 {
        color: #333;
        margin-bottom: 10px;
    }

    p {
        color: #555;
        margin-bottom: 15px;
    }

    .btn {
        background-color: #0733ab;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #062b91;
    }

    /* Cards Row Styles for Larger Screens */
    .cards-row {
        display: flex;
        gap: 20px;
        justify-content: center;
        width: 100%;
    }

    .guides-card,
    .survey-card {
        flex: 1;
        max-width: 300px;
    }

    /* Responsive Breakpoints */
    @media (max-width: 768px) {
        .cards-row {
            flex-direction: column;
            align-items: center;
        }
    }

    /* Customers Section Styling */
    .testimonials-section {
        display: flex; /* Enable Flexbox */
        flex-direction: column; /* Stack children vertically */
        align-items: center; /* Center children horizontally */
        justify-content: center;
        margin: 40px auto;
        padding: 10px;
        text-align: center; /* Center text alignment */
    }

    .testimonials-section p {
        font-size: 18px;
        color: #333;
        margin-bottom: 20px;
    }

    .highlight-text {
        font-size: 32px;
        color: #0733ab;
        font-weight: bold;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .testimonials-section p {
            font-size: 14px;
        }

        .highlight-text {
            font-size: 28px;
        }
    }
</style>

<div class="main-container">
    <!-- Confession Card -->
    <div class="confession-card" style="background-color: #FAF0E6; padding: 20px;">
        <h2>The <span id='company_name'></span> Confessions</h2>
        <p>Unlock 100% Product Delivery!</p>
        <button class="btn" class="confession-btn">Unlock Confession</button>
    </div>

    <!-- Guides and Laid in India Cards -->
    <div class="cards-row">
        <!-- Guides Card -->
        <div class="guides-card" style="background-color: #F0EAD6; padding: 20px;">
            <h2>The <span id='company_name1'></span> Guides</h2>
            <p>Get the Ultimate Medicine Products Guides.</p>
            <button class="btn" class="guides-btn">Free Guides!</button>
        </div>
        <!-- Laid in India Card -->
        <div class="survey-card" style="background-color: #FFF5EE; padding: 20px;">
            <h2>The <span id='company_name2'></span> Laid in INDIA</h2>
            <p>India's Largest <b>LIVE</b> Survey.</p>
            <button class="btn" class="survey-btn">Take Me There!</button>
        </div>
    </div>
</div>

<!-- Customers Section -->
<div class="testimonials-section">
    <p><span class="highlight-text">125,000</span> happy customers believe in us! Hear from people who say our intimate products have changed their lives.</p>
</div>
<!--step1-->
   
<!--step2-->
<style>
    /* Quiz Section Styling */
    .quiz-section {
        background-color: #6a1b9a;
        /* Purple background */
        padding: 40px 20px;
        /* Padding for spacing */
        border-radius: 10px;
        /* Rounded corners */
        text-align: center;
        /* Center-align text */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        /* Shadow effect */
        max-width: 600px;
        /* Maximum width */
        margin: 40px auto;
        /* Center the section */
    }

    .quiz-content h1 {
        color: #ffffff;
        /* White text color */
        font-weight: bold;
        /* Bold text */
        margin-bottom: 20px;
        /* Space below the heading */
        font-size: 28px;
        /* Font size for heading */
    }

    .quiz-content p {
        color: #ffffff;
        /* White text color */
        font-weight: bold;
        /* Bold text */
        margin-bottom: 30px;
        /* Space below the paragraph */
        font-size: 18px;
        /* Font size for paragraph */
    }

    .quiz-btn {
        background-color: #ffffff;
        /* White button background */
        color: #6a1b9a;
        /* Purple text color */
        border: none;
        /* No border */
        padding: 12px 24px;
        /* Button padding */
        border-radius: 5px;
        /* Rounded button corners */
        cursor: pointer;
        /* Pointer cursor on hover */
        font-weight: bold;
        /* Bold button text */
        transition: background-color 0.3s ease;
        /* Transition for hover effect */
    }

    .quiz-btn:hover {
        background-color: #e1bee7;
        /* Light purple on hover */
    }
</style>
<div class="quiz-section">
    <div class="quiz-content">
        <h1>Take our quiz</h1>
        <p>Tell us about yourself and find the perfect match in 30 seconds. Plus, a
            secret discount at the end.</p>
        <button class="quiz-btn">Take Quiz</button>
    </div>
</div>
<!--step2-->   
   
   
<!--step3-->
<style>
    /* Feedback Carousel Section */
    .feedback-carousel {
        text-align: center;
        padding: 30px;
    }

    .feedback-carousel h2 {
        font-size: 24px;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    /* Carousel Container */
    .carousel-container {
        position: relative;
        overflow: hidden;
        max-width: 400px;
        margin: 0 auto;
    }

    .feedback-slide {
        display: none;
        background-color: #fefefe;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.5s ease-in-out;
    }

    .feedback-slide.active {
        display: block;
    }

    /* Carousel Image */
    .carousel-image-wrap {
        background-color: #e8f2d3;
        padding: 2px;
        border-radius: 90%;
        display: inline-block;
        margin-bottom: 10px;
    }

    .carousel-image-wrap img {
        max-width: 85px;
        border-radius: 50%;
    }

    /* Rating Section */
    .feedback-rating {
        margin-bottom: 20px;
    }

    .feedback-rating span {
        color: #f39c12;
        font-size: 22px;
        margin-right: 3px;
    }

    /* Review Text */
    .feedback-text {
        font-size: 16px;
        color: #34495e;
        margin: 20px 0;
        line-height: 1.6;
    }

    /* Shop Button */
    .feedback-shop-btn {
        background-color: #2980b9;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .feedback-shop-btn:hover {
        background-color: #1a6692;
    }

    /* Carousel Dots */
    .carousel-dots {
        margin-top: 15px;
    }

    .carousel-dots .dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #bdc3c7;
        border-radius: 50%;
        margin: 0 5px;
        cursor: pointer;
    }

    .carousel-dots .dot.active {
        background-color: #2c3e50;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .feedback-slide {
            padding: 20px;
        }

        .feedback-carousel h2 {
            font-size: 20px;
        }

        .feedback-text {
            font-size: 14px;
        }

        .feedback-shop-btn {
            padding: 8px 15px;
            font-size: 14px;
        }
    }
</style>
<div class="feedback-carousel">
    <h2>See What Our Customers Say!</h2>

    <div class="carousel-container">
        <div class="feedback-slide active">
            <div class="carousel-image-wrap">
                <img src="https://icons.veryicon.com/png/o/internet--web/website-blog-utility-icon/personal-center-human-shape.png"
                    alt="Product 1">
            </div>
            <div class="feedback-rating">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
            </div>
            <p class="feedback-text">
                "I started using the *Paracetamol 500mg* tablets for mild headaches and body aches, and they work wonders! Within 20-30 minutes, the pain starts to fade, and I can get on with my day. It's gentle on my stomach and doesn't cause drowsiness. Highly recommended for anyone looking for quick relief without any side effects!"
            </p>
        </div>

        <!-- Add more slides as needed -->
        <div class="feedback-slide">
            <div class="carousel-image-wrap">
                <img src="https://icons.veryicon.com/png/o/internet--web/website-blog-utility-icon/personal-center-human-shape.png"
                    alt="Product 2">
            </div>
            <div class="feedback-rating">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
            </div>
           <p class="feedback-text">
                "These *Vitamin C Tablets* have boosted my immunity significantly. I haven’t caught a cold in months!"
            </p>
        </div>
    </div>

    <!-- Carousel Navigation Dots -->
    <div class="carousel-dots">
        <span class="dot active"></span>
        <span class="dot"></span>
    </div>
</div>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.feedback-slide');
    const dots = document.querySelectorAll('.carousel-dots .dot');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            dots[i].classList.remove('active');
        });
        slides[index].classList.add('active');
        dots[index].classList.add('active');
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            showSlide(currentIndex);
        });
    });

    // Auto Slide
    setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }, 5000);

</script>
<!--step3-->   
<!--step4-->
<style>
    /* Custom Divider Styling */
    .custom-divider {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin: 40px 0;
        text-align: center;
    }

    .custom-divider::before,
    .custom-divider::after {
        content: '';
        flex: 1;
        border-bottom: 2px solid #ddd;
        margin: 0 10px;
    }

    .divider-text {
        padding: 0 15px;
        font-size: 18px;
        font-weight: bold;
        color: #555;
        background: linear-gradient(135deg, #ff6f61, #ffca28);
        border-radius: 10px;
        padding: 5px 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="custom-divider">
    <span class="divider-text"><span id='company_name4'></span></span>
</div>
<!--step4-->

<!--step5-->
<style>
    /* Promise Section Styling */
    .promise-section {
        background-color: #f9f9f9;
        /* Light background color */
        padding: 40px 20px;
        /* Padding for spacing */
        text-align: center;
        /* Center-align text */
    }

    .promise-section h2 {
        color: #333;
        /* Dark text color for the heading */
        font-size: 32px;
        /* Font size for the heading */
        margin-bottom: 30px;
        /* Space below the heading */
    }

    .promise-grid {
        display: grid;
        /* Enable grid layout */
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        /* Default responsive columns */
        gap: 20px;
        /* Space between grid items */
    }

    /* Modify grid layout for mobile devices */
    @media (max-width: 768px) {
        .promise-grid {
            grid-template-columns: repeat(2, 1fr);
            /* Two columns on mobile */
        }
    }

    .promise-item {
        background-color: #ffffff;
        /* White background for promise items */
        border: 1px solid #e0e0e0;
        /* Light border */
        border-radius: 8px;
        /* Rounded corners */
        padding: 20px;
        /* Padding inside each item */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        /* Shadow effect */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* Transition effects */
    }

    .promise-item:hover {
        transform: translateY(-5px);
        /* Lift effect on hover */
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        /* Deeper shadow on hover */
    }

    .promise-item i {
        font-size: 40px;
        /* Icon size */
        color: #6a1b9a;
        /* Purple color for icons */
        margin-bottom: 15px;
        /* Space below the icon */
    }

    .promise-item h3 {
        color: #333;
        /* Dark text color for subheadings */
        font-size: 20px;
        /* Font size for subheadings */
        margin: 10px 0;
        /* Space around the subheading */
    }

    .promise-item a {
        color: #6a1b9a;
        /* Purple color for links */
        text-decoration: none;
        /* Remove underline from links */
        font-weight: bold;
        /* Bold text for links */
        transition: color 0.3s ease;
        /* Transition for color change */
    }

    .promise-item a:hover {
        color: #5c0080;
        /* Darker purple on hover */
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .promise-section h2 {
            font-size: 28px;
            /* Adjust heading size for smaller screens */
        }

        .promise-item h3 {
            font-size: 18px;
            /* Adjust subheading size for smaller screens */
        }
    }
</style>
<section class="promise-section">
    <h2>The <span id='company_name3'></span> Promise</h2>
    <div class="promise-grid">
        <div class="promise-item">
            <i class="fas fa-heart"></i>
            <h3>Shipping Made Easy</h3>
            <a href="#">How?</a>
        </div>
        <div class="promise-item">
            <i class="fas fa-shipping-fast"></i>
            <h3>Discreet delivery</h3>
            <a href="#">Prove it!</a>
        </div>
        <div class="promise-item">
            <i class="fas fa-calendar-alt"></i>
            <h3>100 Days Warranty</h3>
            <a href="#">What’s the T&C?</a>
        </div>
        <div class="promise-item">
            <i class="fas fa-shield-alt"></i>
            <h3>Quality You Can Trust</h3>
            <a href="#">Show Me</a>
        </div>
    </div>
</section>
<!-- Add Font Awesome CDN for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!--step5-->
<br>
<br>
<br>
<br>
