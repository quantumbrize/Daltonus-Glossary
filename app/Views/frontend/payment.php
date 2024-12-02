    <!-- payment start -->
    <div class="payment-container">
        <div class="product-tracker">
            <div class="track-line"></div>
            <div class="step first-step">
                <span>✓</span>
                <p>Cart</p>
            </div>
            <div class="step middle-step">
                <span>✓</span>
                <p>Billing</p>
            </div>
            <div class="step end-step active">
                <span>3</span>
                <p>Pay</p>
            </div>
        </div>

        <div class="main-content-area">
          
            <div class="card-wrapper">
                <div class="card-inner">
                    <div class="payment-type">
                        <div class="card-contents">
                            <img src="../assets/ztImages/wallet.png" alt="wallet">
                        </div>
                        <label>
                        <input type="radio" checked name="option" value="option1">
                    </label><p>Case On Delivery</p>
                        

  
                    </div>
                    <div class="payment-type">
                        <div class="card-contents">
                            <img src="../assets/ztImages/credit-card.png" alt="wallet">
                        </div>
                        <label>
                        <input type="radio" name="option" value="option2">
                    </label><p>Visa/Mastercard/JCB</p>
                    </div>
                    <div class="payment-type">
                        <div class="card-contents">
                            <img src="../assets/ztImages/paypal.png" alt="wallet">
                        </div>
                        <label>
                            <input type="radio" name="option" value="option3">
                        </label><p>PayPal</p>
                    </div>
                </div>
            </div>

          <div class="price-content-area">
            <div class="summary">
                <div class="subtotal">
                    <span class="price-title">Subtotal</span>
                    <span class="price subtotal_amount">₹0</span>
                </div>
                <!-- <div class="tax-fees">
                    <span class="price-title">Tax and Fees</span>
                    <span class="price" id="tax_fee">₹0</span>
                </div> -->
                <div class="delivery">
                    <span class="price-title">Delivery</span>
                    <span class="price" id="delivary_charge">₹0</span>
                </div>
                <!-- <div class="delivery">
                    <input class="form-control" type="file" name="user_prescription[]" id="user_prescription" multiple>
                    <span class="price-title">Upload prescription*</span>
                </div> -->
            </div>

            <div class="add-to-cart-btn mobile-screen-cart" id="oder_placed_btn">
                <!-- <p class="total-price" id="grand_total">₹0</p>
                <button class="checkout" id="place_order_btn">Confirm</button> -->
            </div>
          </div>
        </div>

        <!-- success payment modal start -->
        <div class="modal fade success-modal" id="success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                <div class="confirm-title">
                  <img class="img-fluid confirm-offer for-light" src="../assets/ztImages/success-payment-light.gif"alt="success-payment" />
                  <h2 class="Congrat-text text-center fw-semibold mt-2">Congratulations!!!</h2>
                  <h5 class="mt-3 msg-text text-center w-75 mx-auto">Your payment was successful! <br/> Just wait Daltonus Glossary arrive <br/> at home</h5> 
                </div>
                <a href="Order_tracking.html" class="btn theme-btn mt-4 track-order-btn" role="button">Track Order</a>
                <a href="Home.html" class="btn btn-link mt-0 back-home-btn">Continue Shopping</a>
              </div>
            </div>
          </div>
        </div>
        <!-- susses payment modal end -->
    </div>
    <!-- payment end -->