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
<!-- Cart start -->
<div class="cart-container">
        <div class="product-tracker">
            <div class="track-line"></div>
            <div class="step active">
                <span>1</span>
                <p>Cart</p>
            </div>
            <div class="step middle-step">
                <span>2</span>
                <p>Billing</p>
            </div>
            <div class="step end-step">
                <span>3</span>
                <p>Pay</p>
            </div>
        </div>

        <div class="main-content-area">
          
          <div class="cart-items" id="cart_item">
              <!-- <div class="cart-item">
                  <div class="item-image" style="background-image: url('https://s3-alpha-sig.figma.com/img/fb4b/27f3/05bb9212ad4bab77ded2a533b28af299?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fBJqrr8YgZXntYItzLgxEdCV4T6BsEwURJU4wFeJkNwZHd7GZ5xgLLym~0sCQ69vdchrOy89Hsvn~INXzrsj9e9oGbxDAuuXduZkPO6wOpqNEhH5cJqK-akJGGuwcKZn9y1OMQzy9LxrG5MPPuwJ8fWqFut76~R2P7LaHrdJCR23wc~KA--UkoLdsBNFxEz67BWPrvyJafHGBB394R7a01hOLS-PRFdRiDkg7Jnvd04dT~5JrkJpUxiQSfCDJrKnVAwPkTOos0hh1yNr3wsXhd8xkj7QoIaH8zeov~JS6hFZ0yixxNrt0K4eXrXmirnYzR7PNYDDctohqCT-IHMmlw__');"></div>
                  <div class="item-info">
                      <h4>Product Name</h4>
                      <p>Small product description..</p>
                      <div class="item-controls">
                          <span>₹189.99</span>
                          <div class="item-quantity">
                              <button class="minus">-</button>
                              <input type="number" value="2" min="1">
                              <button class="plus">+</button>
                          </div>
                      </div>
                  </div>
                  <button class="remove-item">×</button>
              </div>

              <div class="cart-item">
                  <div class="item-image" style="background-image: url('https://s3-alpha-sig.figma.com/img/fb4b/27f3/05bb9212ad4bab77ded2a533b28af299?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fBJqrr8YgZXntYItzLgxEdCV4T6BsEwURJU4wFeJkNwZHd7GZ5xgLLym~0sCQ69vdchrOy89Hsvn~INXzrsj9e9oGbxDAuuXduZkPO6wOpqNEhH5cJqK-akJGGuwcKZn9y1OMQzy9LxrG5MPPuwJ8fWqFut76~R2P7LaHrdJCR23wc~KA--UkoLdsBNFxEz67BWPrvyJafHGBB394R7a01hOLS-PRFdRiDkg7Jnvd04dT~5JrkJpUxiQSfCDJrKnVAwPkTOos0hh1yNr3wsXhd8xkj7QoIaH8zeov~JS6hFZ0yixxNrt0K4eXrXmirnYzR7PNYDDctohqCT-IHMmlw__');"></div>
                  <div class="item-info">
                      <h4>Product Name</h4>
                      <p>Small product description..</p>
                      <div class="item-controls">
                          <span>₹189.99</span>
                          <div class="item-quantity">
                              <button class="minus">-</button>
                              <input type="number" value="2" min="1">
                              <button class="plus">+</button>
                          </div>
                      </div>
                  </div>
                  <button class="remove-item">×</button>
              </div> -->
          </div>

          <div class="price-content-area">
            <!-- <div class="promo-code">
                <input type="text" placeholder="Promo Code">
                <button>Apply</button>
            </div> -->

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
            </div>

            <div class="add-to-cart-btn mobile-screen-cart checkout_button">
                <!-- <p class="total-price subtotal_amount">₹0 </p>
                <a href="<?= base_url('billing')?>">
                  <button class="checkout">Checkout</button>
                </a> -->
            </div>
          </div>
      </div>
    </div>
    <!-- Cart end -->

    <!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="../../../gsqxdxog-1.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548"
                        style="width: 100px; height: 100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">
                            Are you sure you want to remove this product ?
                        </p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" onclick="delete_the_cart_item()" class="btn w-sm btn-danger"
                        id="remove-product">
                        Yes, Delete It!
                    </button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->