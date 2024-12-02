<style>
  .out_of_stock {
    background-color: #f8f9fa;
    color: #fff;
    background-color: #f8f9fa;
    color: #adb5bd;
    border: none;
    outline: none;
    cursor: not-allowed;
  }
  /* Ensure the welcome message is visible on mobile */
@media (max-width: 768px) {
    .welcome-msg {
        display: block !important; /* Ensure it's visible on smaller screens */
        color: #000; /* Ensure it's readable, change the color if needed */
        font-size: 8px; /* Make the font size appropriate for mobile */
        /* padding: 0px 15px; */
        /* margin-top: 20px; */
        /* z-index: 999 !important; */
    }
    .welcome-msg-pc{
      display: none;
    }
}

</style>



</head>

<body>
  <div class="container-sm">
    <div class="header-left">
      <p id="notice1" class="welcome-msg-pc"></p>
    </div>
  </div>

  <!-- desktop Navbar start -->
  <div class="desktop-navbar">
    <!-- <div class="container-sm">
      <div class="header-left">
        <p id="notice" class="welcome-msg"></p>
      </div>
    </div> -->
    <div class="logo">
      <div class="brand-logo"><img src="" id="company_logo" alt="Company Logo" /></div>
      <h1 class="company_name"></h1>
    </div>
    <nav>
      <ul>
        <li><a href="<?= base_url() ?>" class="nav-tab">Home</a></li>
        <li><a href="<?= base_url('product/list') ?>" class="nav-tab">Store</a></li>
        <li><a href="<?= base_url('categoris') ?>" class="nav-tab">Category</a></li>
        <li> <a href="javascript:void(0)" onclick="redirect_cart_page()" class="nav-tab">Cart<span class="badge total_cart_item">0</span></a>
        </li>
        <li><a href="<?= base_url('contact-us') ?>" class="contact-us">Contact Us</a></li>
      </ul>
    </nav>
    <a href="<?= base_url('user/account') ?>">
      <div class="profile-img">
        <img id="authorised_account" src="" alt="User Profile" class="profile" />
      </div>
    </a>
  </div>
  <!-- desktop Navbar end -->

  <!-- mobile header start -->
  <header class="section-t-space d-block d-md-none">
  <!-- <div class="container-sm">
    <div class="header-left">
      <p id="notice" class="welcome-msg"></p>
    </div>
  </div> -->
    <div class="custom-container">
      <div class="container-sm">
        <div class="header-left">
          <p id="notice" class="welcome-msg"></p>
        </div>
      </div>
      <div class="header">
        
        <?php if (isset($header['home'])) { ?>
          <div class="head-content">
            <button class="location-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
              <img class="location_img" src="" id="company_logo_mob"
                alt="location_icon" />
            </button>
            <div class="header-location">
              <a href="<?= base_url()?>" data-bs-toggle="modal">
                <h2 class="company_name"></h2>
              </a>

            </div>
          </div>
          <a href="javascript:void(0)" class="cart" onclick="redirect_cart_page()">
            <img src="<?= base_url() ?>public/assets/ztImages/shopping-cart.png" alt="location_icon" />
            <span class="count total_cart_item">0</span>
          </a>
        <?php } else { ?>
          <div class="head-content">
            <button onclick="goBack()" class="location-btn" type="button">
              <img class="back_img" src="<?= base_url() ?>public/assets/ztImages/back_img.png"
                style="height: 12px; width: 22px;" alt="location_icon" />
            </button>
            <div class="header-location">
              <a href="<?= base_url() ?>" data-bs-toggle="modal">
                <h2><?= $title ?></h2>
              </a>
            </div>
          </div>
          <a href="javascript:void(0)" class="cart" onclick="redirect_cart_page()">
            <img src="<?= base_url() ?>public/assets/ztImages/shopping-cart.png" alt="location_icon" />
            <span class="count total_cart_item">0</span>
          </a>
        </div>
      <?php } ?>
    </div>
    <?php if (isset($header['product_list'])) { ?>
      <!-- mobile search section starts -->
      <section class="search-section d-block d-md-none">
        <div class="custom-container">
          <form class="auth-form search-head" target="_blank">
            <div class="form-group">
              <div class="form-input">
                <input type="text" class="form-control search" id="inputusername" onkeyup="search_product_mobile()"
                  placeholder="Search Medicine & Health Products" />
                <a href="#search-filter" class="header-search-icon" data-bs-toggle="modal">
                  <img class="search_img" src="<?= base_url() ?>public/assets/ztImages/search-icon.png"
                    alt="location_icon" />
                </a>
              </div>
            </div>
          </form>
        </div>
      </section>
      <!-- mobile search section end -->
    <?php } ?>
  </header>
  <!-- mobile header end -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    let user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'
    $.ajax({
      url: "<?= base_url('/api/about') ?>",
      type: "GET",
      success: function (resp) {
        console.log(resp)
        if (resp.status) {
          $('#about_description_footer').html(resp.data.about_description)
          let newLogoSrc = `<?= base_url() ?>public/uploads/logo/${resp.data.logo}`;
          $('#company_logo').attr('src', newLogoSrc);
          $('#company_logo_mob').attr('src', newLogoSrc);
          $('#company_footer').attr('src', newLogoSrc);
          $('#daltonus_logo_header').attr('src', newLogoSrc);
          $('#daltonus_logo_sidebar').attr('src', newLogoSrc);

          $('#daltonus_logo').css('display', 'block')
          $('#daltonus_logo_header').css('display', 'block')
          $('#daltonus_logo_sidebar').css('display', 'block')

        } else {
          console.log(resp)
        }
      },
      error: function (err) {
        console.log(err)
      },
    })

    $.ajax({
      url: "<?= base_url('api/user') ?>",
      type: "GET",
      success: function (resp) {
        // resp = JSON.parse(resp)
        if (resp.status) {
          // console.log(resp)
          var image_url = `https://cdn-icons-png.flaticon.com/512/8847/8847419.png`
          if (resp.user_img != null) {
            image_url = `<?= base_url('public/uploads/user_images/') ?>${resp.user_img.img}`
          }
          $('#authorised_account').attr('src', image_url)
        } else {

          var image_url = `https://cdn-icons-png.flaticon.com/512/8847/8847419.png`
          $('#authorised_account').attr('src', image_url)

        }
      },
      error: function (err) {
        console.log(err)
      }
    })

    $(document).ready(function () {
      get_cart_header()
    });


    function get_cart_header() {
      $.ajax({
        url: '<?= base_url('/api/user/cart') ?>',
        type: "GET",
        data: {
          user_id: user_id
        },
        beforeSend: function () { },
        success: function (resp) {
          // alert('hello')
          // console.log(resp)

          if (resp.status) {
            // alert(resp.data.length)
            $('.total_cart_item').text(resp.data.length)
          } else {
            $('.total_cart_item').text('0')
          }

        },
        error: function (err) {
          console.error(err)
        }
      })
    }

    function redirect_cart_page(){
      $.ajax({
        url: '<?= base_url('/api/user/cart') ?>',
        type: "GET",
        data: {
          user_id: user_id
        },
        beforeSend: function () { },
        success: function (resp) {
          
          console.log(resp)

          if (resp.status) {
            window.location.href = '<?= base_url('user/cart')?>';
          } else {
            Toastify({
                text: 'cart is empty'.toUpperCase(),
                duration: 2000,
                position: "center",
                stopOnFocus: true,
                style: {
                    background: 'green',
                },
            }).showToast();
          }

        },
        error: function (err) {
          console.error(err)
        }
      })
    }




  


  </script>

  <style>
    #daltonus_logo {
      height: 150px;
      width: 150px;
    }

    #daltonus_logo_header {
      height: 100px;
      width: 100px;
    }

    #daltonus_logo_sidebar {
      height: 100px;
      width: 100px;
    }

    .navbar-brand {
      height: 100px !important;
      padding: 0px !important;
    }

    /* Custom CSS Subhankar Sharma */
    .style-unavailable{
      color:red;
      font-size: 12px;
    }
    @media (max-width: 430px) {
      .style-unavailable{
        font-size: 8px !important;
      }
    }
  </style>

  <script>
    function goBack() {
      window.history.back();
    }

  </script>
  <script>
    function get_notice_text(){
        $.ajax({
            url: "<?= base_url('api/get/notice') ?>",
            type: "GET",
            data: {},
            success: function (resp) {
                // resp = JSON.parse(resp)
                // console.log(resp.user_data.number)
                if (resp.status) {
                    console.log('not',resp);
                    
                    // html=`<a href="${resp.user_data.facebook}" class="social-icon social-facebook w-icon-facebook"></a>
                    //                     <a href="${resp.user_data.twitter}" class="social-icon social-twitter w-icon-twitter"></a>
                    //                     <a href="${resp.user_data.instagram}" class="social-icon social-instagram w-icon-instagram"></a>
                    //                     <a href="${resp.user_data.youtube}" class="social-icon social-youtube w-icon-youtube"></a>`


                    html=`${resp.user_data.notice}`


                    // $('#profile_image').html(`<img src="${user_img}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">`)
                    // $('#facebooklink').val(resp.user_data.facebook)
                    // $('#twitterlink').val(resp.user_data.twitter)
                    // $('#instagramlink').val(resp.user_data.instagram)
                    // $('#youtubelink').val(resp.user_data.youtube)
                    // $('#uid').val(resp.user_data.uid)
                    // $('#user_name').text(resp.user_data.user_name)
                    // $('#user_role').text(resp.user_data.type)
                    // var image_url = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
                    $('#notice').html(html);
                    $('#notice1').html(html);
                } else {
                    console.log(resp)
                }
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    $(document).ready(function () {
    
    get_notice_text();
});
  </script>