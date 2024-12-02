<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-info btn-icon" style="bottom: 50px;" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


  <style>
    .avatar-xs {
        height: 2rem;
        width: 2rem
    }
    .section{
        margin: 80px 0px 100px 0px;
    }
    .table {
        width: 100%;
        /* Ensure the table takes up full width */
    }

    .table th, .table td{
        white-space: nowrap;
        /* Prevent text from wrapping */
        text-align: left;
        /* Align text to the left */
    }

    .table-responsive {
        overflow-x: auto;
        /* Allow horizontal scrolling if needed */
    }
  </style>
    <!-- <section class="section">
        <div class="container">
            <div class="track-orders">
                <div class="row justify-content-between gy-4 gy-md-0" id="order_track">
                    <div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0">
                        <span class="is-complete"></span>
                        <h6 class="fs-15 mt-3 mt-md-4">Order Process</h6>
                    </div>
                    <div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0">
                        <span class="is-complete"></span>
                        <h6 class="fs-15 mt-3 mt-md-4">Order Shipped</h6>
                    </div>
                    <div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0">
                        <span class="is-complete"></span>
                        <h6 class="fs-15 mt-3 mt-md-4">Out Of Delivery</h6>
                    </div>
                    <div class="col-md-2 order-tracking text-start text-md-center ps-4 ps-md-0">
                        <span class="is-complete"></span>
                        <h6 class="fs-15 mt-3 mt-md-4">Delivered</h6>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="section pt-0">
        <div class="container">
            <div class="card border-dashed">
                <div class="card-body border-bottom border-bottom-dashed p-4">
                    <div class="row g-3" id="order_details_bx">
                        
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-6" id="address_bx">
                            
                        </div>
                        <div class="col-6" id="return_cancel_bx">
                           
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                            <thead>
                                <tr class="table-active">
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Product Details</th>
                                    <th scope="col"></th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" class="text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody id="products-list">
                                
                            </tbody>
                        </table><!--end table-->
                    </div>
                    <div class="border-top border-top-dashed mt-2">
                        <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                            <tbody id="order_amount_dtls_bx">
                               
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="text-end mt-4">
                        <a href="<?=base_url()?>" type="button" class="btn btn-success btn-hover">Continue Shopping <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section>