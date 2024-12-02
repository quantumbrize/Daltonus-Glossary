<style>
    .btn_disabled {
        background-color: #f8f9fa; 
        color: #fff; 
        background-color: #f8f9fa;
        color: #adb5bd;
        border: none;
        outline: none;
        cursor: not-allowed;
    }

</style>
  <!-- Billing start -->
  <div class="billing-container">
        <div class="product-tracker">
            <div class="track-line"></div>
            <div class="step first-step">
                <span>✓</span>
                <p>Cart</p>
            </div>
            <div class="step middle-step active">
                <span>2</span>
                <p>Billing</p>
            </div>
            <div class="step end-step">
                <span>3</span>
                <p>Pay</p>
            </div>
        </div>

        <div class="main-content-area">
            <form class="billing-form">
                <label for="full-name">Full name</label>
                <input type="text" id="full-name" name="full-name" placeholder="Enter your name">
                <span style="color:red;" id="name_val"></span>
    
                <label for="mobile-number">Mobile number</label>
                <input type="tel" id="mobile-number" name="mobile-number" placeholder="phone no.">
                <span style="color:red;" id="number_val"></span>

                <label for="mobile-number">Email</label>
                <input type="mail" id="email" name="email" placeholder="email">
                <span style="color:red;" id="email_val"></span>
    
                <label for="city">City</label>
                <input type="text" id="city" name="city" placeholder="city">
                <span style="color:red;" id="city_val"></span>

                <label for="city">Country</label>
                <input type="text" id="country" name="country" placeholder="country">
                <span style="color:red;" id="country_val"></span>

                <label for="city">Zip Code</label>
                <input type="number" id="zip-code" name="zip-code" placeholder="postal code">
                <span style="color:red;" id="zip_val"></span>

                <label for="city">District</label>
                <input type="text" id="district" name="district" placeholder="district">
                <span style="color:red;" id="district_val"></span>

                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="state">
                <span style="color:red;" id="state_val"></span>
    
                <label for="street">Locality</label>
                <input type="text" id="locality" name="locality" placeholder="Street">
                <span style="color:red;" id="locality_val"></span>
                <div class="" style="display: flex; justify-content: flex-end;">
                    <button class="checkout" type="button" style="background-color: #039e1d !important;" onclick="update_billing_address()">Update</button>
                </div>
    
                <div class="add-to-cart-btn mobile-screen-cart" id="payment_btn_mob">  <!-- Mobile ui Payment btn -->
                    <!-- <p class="total-price subtotal_amount"></p> -->
                    <!-- <a href="Payment.html"> -->
                      <!-- <button class="checkout mobile-checkout-btn" type="button">Payment</button> -->
                    <!-- </a> -->
                </div>
            </form>

            <div class="price-content-area desktop-only"> <!-- Desktop ui only section -->
    
                <div class="summary">
                    <div class="subtotal">
                        <span class="price-title">Subtotal</span>
                        <span class="price subtotal_amount"></span>
                    </div>
                    <!-- <div class="tax-fees">
                        <span class="price-title">Tax and Fees</span>
                        <span class="price" id="tax_fee">₹0</span>
                    </div> -->
                    <div class="delivery">
                        <span class="price-title">Delivery</span>
                        <span class="price" id="delivary_charge">₹0</span>
                    </div>
                </div>
                
                <div class="add-to-cart-btn desktop-screen-cart" id="payment_btn"> <!-- Desktop ui Payment btn -->
                    <!-- <p class="total-price"></p> -->
                      <!-- <button class="checkout desktop-checkout-btn" type="button">Payment</button> -->
                </div>
              </div>
        </div>
    </div>
    <!-- Cart end -->