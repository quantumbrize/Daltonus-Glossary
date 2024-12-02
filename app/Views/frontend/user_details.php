<!-- Profile start -->
<div class="container">
        <div class="profile-pic" id="userImage">
            <img src="https://via.placeholder.com/50" alt="Profile Picture">
            
        </div>
        
        <div id="detailsForm">
            <div class="input-group">
                <input type="file" name="user_img[]" id="user_img_input" multiple>
            </div>
            <div class="input-group">
                <label for="fullName">Full name</label>
                <input class="pf-dts-input" type="text" id="fullName" placeholder="Full Name">
                <span style="color:red" id="name_val"></span>
            </div>
            <div class="input-group">
                <label for="mobileNumber">Mobile number</label>
                <input class="pf-dts-input" type="tel" id="mobileNumber" placeholder="Phone" readonly>
                <span style="color:red" id="number_val"></span>
            </div>
            <div class="input-group">
                <label for="email">Email Id</label>
                <input class="pf-dts-input" type="email" id="email" placeholder="Email">
                <span style="color:red" id="email_val"></span>
            </div>
            <input type="hidden" id="user_id">
            
            <button onclick="window.location.href='<?= base_url('user/address')?>'" type="button" id="locationButton">Add your Location</button>
            <div class="confirm-btn-bottom-fix">
                <button type="submit" id="confirmButton">Confirm</button>
            </div>
        </div>
    </div>
    <!-- Profile end -->