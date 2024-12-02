<!-- Profile start -->
<div class="container">
        <div class="profile-pic" >
            <h1>User Address</h1>
        </div>
        <div id="detailsForm">
            <div class="input-group">
                <label for="fullName">City</label>
                <input class="pf-dts-input" type="text" id="city" placeholder="city">
                <span style="color:red" id="city_val"></span>
            </div>
            <div class="input-group">
                <label for="mobileNumber">Country</label>
                <input class="pf-dts-input" type="tel" id="country" placeholder="country">
                <span style="color:red" id="country_val"></span>
            </div>
            <div class="input-group">
                <label for="email">Zip Code</label>
                <input class="pf-dts-input" type="number" id="zip-code" placeholder="zip-code">
                <span style="color:red" id="zip_val"></span>
            </div>
            <div class="input-group">
                <label for="email">District</label>
                <input class="pf-dts-input" type="text" id="district" placeholder="district">
                <span style="color:red" id="district_val"></span>
            </div>
            <div class="input-group">
                <label for="email">State</label>
                <input class="pf-dts-input" type="text" id="state" placeholder="state">
                <span style="color:red" id="state_val"></span>
            </div>
            <div class="input-group">
                <label for="email">Locality</label>
                <input class="pf-dts-input" type="text" id="locality" placeholder="locality">
                <span style="color:red" id="locality_val"></span>
            </div>
            <input type="hidden" id="user_id">
            
            <button onclick="window.location.href='<?= base_url('user/details')?>'" type="button" id="locationButton">User Details</button>
            <div class="confirm-btn-bottom">
                <button type="submit" id="confirmButton" onclick="update_billing_address()">Update</button>
            </div>
        </div>
    </div>
    <!-- Profile end -->