  <?php if(!isset($header['product_details']) && !isset($header['cart']) && !isset($header['billing']) && !isset($header['payment'])){?>
    <!-- bottom mobile navbar start -->
    <div class="navbar-menu d-block d-md-none">
        <ul>
          <li class="<?= isset($header['home']) ? 'active' : ""?>">
            <a href="<?=base_url()?>" class="icon logo">
              <img
                class="img-fluid home-logo"
                src="<?=base_url()?>public/assets/ztImages/home_icon.png"
                alt="logo"
              />
              <span>Home</span>
            </a>
          </li>
          <li class="<?= isset($header['product_list']) ? 'active' : ""?>">
            <a href="<?=base_url('product/list')?>" class="icon">
              <img
                class="img-fluid"
                src="<?=base_url()?>public/assets/ztImages/category_icon.png"
                alt="logo"
              />
              <span>Category</span>
            </a>
          </li>
          <li class="<?= isset($header['account']) ? 'active' : ""?>">
            <a href="<?=base_url('user/account')?>" class="icon">
              <img
                class="img-fluid"
                src="<?=base_url()?>public/assets/ztImages/profile_icon.png"
                alt="logo"
              />
              <span>Profile</span>
            </a>
          </li>
        </ul>
    </div>
    <!-- mobile bottom navbar end -->
  <?php }?>

    <!-- Desktop footer start -->
    <div class='footer_container'>
      <div class="footer_wrapper">
        <div class="content_area">

          <div class="brand_info">
            <div class="brand_img">
              <img id="company_footer" src="" alt="logo" />
            </div>
            <div class="brand_details">
              <p class='brand_name company_name'></p>
              <span class="brand_Location" style="color:white;">Address :</span><span class='brand_Location company_address'>Address : Company address</span>
              <br />
              <!-- <span class='brand_Location'>India, Asia</span> -->
            </div>
          </div>

          <div class="footer_links">
            <ul>
              <li><a href="<?=base_url('about-us')?>"> <span class="circle"></span> About Us</a></li>
              <li><a href="#"> <span class="circle"></span> Contact Us</a></li>
              <li><a href="#"> <span class="circle"></span> Blogs</a></li>
              <li><a href="#"> <span class="circle"></span> FAQs</a></li>
              <li><a href="#"> <span class="circle"></span> Chat Us</a></li>
            </ul>
          </div>
          <div class="footer_links">
            <ul>
              <li><a href="#"> <span class="circle"></span> Terms and Conditions</a></li>
              <li><a href="#"> <span class="circle"></span> Private Policy</a></li>
              <li><a href="#"> <span class="circle"></span> Return and Refunds</a></li>
              <li><a href="#"> <span class="circle"></span> Purchase Guide</a></li>
            </ul>
          </div>
          <div class="footer_social_links">
            <div class="social" id="social_link">
              <!-- <a href="#"><img src="<?=base_url()?>public/assets/ztImages/facebook_png.png" alt="facebook_icon" /></a>
              <a href="#"><img src="<?=base_url()?>public/assets/ztImages/insta_png.png" alt="insta_icon" /></a>
              <a href="#"><img src="<?=base_url()?>public/assets/ztImages/twitter_png.png" alt="twitter_icon" /></a>
              <a href="#"><img src="<?=base_url()?>public/assets/ztImages/whatsapp_pnp.png" class='desktop_only_position' alt="whatsapp_icon" /></a>
              <a href="#"><img src="<?=base_url()?>public/assets/ztImages/contact_call_png.png" class='desktop_only_position' alt="call_icon" /></a> -->
            </div>
            <div><p>2024 @Copyright Zettkart</p></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Desktop footer end -->

<script>
     $(document).ready(function () {
        get_categories();
        get_social_link();
    });

    function get_categories() {
        $.ajax({
            url: "<?= base_url('/api/categories') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                let html = ''
                if (resp.status) {
                    $.each(resp.data, function (key, val) {
                        html += `<li><a href="#!">${val.name}</a></li>`
                    })
                }
                $('#categories').html(html)
            },
            error: function (err) {
                console.log(err)
            }
        })

    }

    // $.ajax({
    //     url: "<?= base_url('/api/about') ?>",
    //     type: "GET",
    //     success: function (resp) {
    //         console.log(resp)
    //         if (resp.status) {
    //         // $('#about_description').html(resp.data.about_description)
    //         let newLogoSrc = `<?=base_url()?>public/uploads/logo/${resp.data.logo}`;
    //         $('#daltonus_logo').attr('src', newLogoSrc);
            
            
    //         }else{
    //             console.log(resp)
    //         }
    //     },
    //     error: function (err) {
    //         console.log(err)
    //     },
    // })

    function get_social_link(){
        $.ajax({
            url: "<?= base_url('api/get/social') ?>",
            type: "GET",
            data: {},
            success: function (resp) {
                // resp = JSON.parse(resp)
                // console.log(resp.user_data.number)
                if (resp.status) {
                    console.log('pro',resp);
                    
                    html=`<div class="social">
                        <a href="${resp.user_data.facebook}"><img src="<?=base_url()?>public/assets/ztImages/facebook_png.png" alt="facebook_icon" /></a>
                        <a href="${resp.user_data.instagram}"><img src="<?=base_url()?>public/assets/ztImages/insta_png.png" alt="insta_icon" /></a>
                        <a href="${resp.user_data.twitter}"><img src="<?=base_url()?>public/assets/ztImages/twitter_png.png" alt="twitter_icon" /></a>
                        <a href="${resp.user_data.youtube}"><img src="<?=base_url()?>public/assets/ztImages/whatsapp_pnp.png" class='desktop_only_position' alt="whatsapp_icon" /></a>
                        <a href="#"><img src="<?=base_url()?>public/assets/ztImages/contact_call_png.png" class='desktop_only_position' alt="call_icon" /></a>
                      </div>`

                    // $('#profile_image').html(`<img src="${user_img}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">`)
                    // $('#facebooklink').val(resp.user_data.facebook)
                    // $('#twitterlink').val(resp.user_data.twitter)
                    // $('#instagramlink').val(resp.user_data.instagram)
                    // $('#youtubelink').val(resp.user_data.youtube)
                    // $('#uid').val(resp.user_data.uid)
                    // $('#user_name').text(resp.user_data.user_name)
                    // $('#user_role').text(resp.user_data.type)
                    // var image_url = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
                    $('#social_link').html(html);
                } else {
                    console.log(resp)
                }
            },
            error: function (err) {
                console.log(err)
            }
        })
    }
</script>
