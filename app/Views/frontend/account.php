  <!-- Profile start -->
  <div class="profile-container">
        <div class="profile-header">
            <img src="https://via.placeholder.com/50" alt="Profile Picture" class="profile-pic">
            <div class="profile-info">
                <h2 class="profile-name">Natli Watson <span class="edit-icon">&#9998;</span></h2>
                <p class="profile-email">watson@gmail.com</p>
            </div>
        </div>
        <div class="profile-menu">
            <ul>
                <li><a href="<?= base_url('order/history')?>"><img src="<?=base_url()?>public/assets/ztImages/parcel.png" alt="Orders Icon"> Orders</a>  <img class="arrow" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="arrow"> </li>
                <li><a href="<?= base_url('user/details')?>"><img src="<?=base_url()?>public/assets/ztImages/user-profile.png" alt="My Details Icon"> My Details</a>  <img class="arrow2" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="arrow"> </li>

                <li><a href="javascript:void(0)" onclick="redirect_cart_page()"><img src="<?=base_url()?>public/assets/ztImages/shopping-cart.png" alt="Refer & Earn Icon"> Cart</a>  <img class="arrow3" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="arrow"> </li>
                <li><a href="<?=base_url('contact-us')?>"><img src="<?=base_url()?>public/assets/ztImages/question.png" alt="Promo Code Icon"> Help</a>  <img class="arrow4" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="arrow"> </li>
                <li><a href="<?=base_url('about-us')?>"><img src="<?=base_url()?>public/assets/ztImages/info.png" alt="Notifications Icon"> About</a>  <img class="arrow5" src="<?=base_url()?>public/assets/ztImages/right-angle-arrow.png" alt="arrow"> </li>
                <!-- <li><a href="<?=base_url('user/cart')?>"><img src="<?=base_url()?>public/assets/ztImages/info.png" alt="About Icon"> Cart</a>  
                <li><a href="<?=base_url('contact-us')?>"><img src="<?=base_url()?>public/assets/ztImages/question.png" alt="Help Icon"> </a>  
                <li><a href="<?=base_url('about-us')?>"><img src="<?=base_url()?>public/assets/ztImages/info.png" alt="About Icon"> About</a>   -->
                
            </ul>
        </div>
        <div class="logout">
            <button onclick="logout()">Log Out</button>
        </div>
    </div>
    <!-- Profile end -->