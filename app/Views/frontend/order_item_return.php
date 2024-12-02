
<!-- end modal -->

    <!-- <a href="../backend/index.html" class="btn btn-warning position-fixed bottom-0 start-0 m-5 z-3 btn-hover d-none d-lg-block"><i class="bi bi-database align-middle me-1"></i> Backend</a> -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-info btn-icon" style="bottom: 50px;" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


    <section class="section pt-0 mt-5">
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
                            <textarea 
                                class="form-control form-control-md" 
                                type="text" 
                                placeholder="Please Add Reason For This Return" 
                                style="height: 200px;"
                                id="reason_inp"></textarea>
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
                                    <th scope="col">Quantity</th>
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
                        <button  type="button" class="btn btn-success btn-hover" id="return_btn">
                            Request a Return <i class="ri-arrow-right-line align-bottom ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section>



  