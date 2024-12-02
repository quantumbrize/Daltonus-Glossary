
<style>
    @media (max-width: 768px) {
        /* .row>* {
            margin-top: 25px !important;
        } */

        .container{
            margin-top: 70px !important;
        }
    }
</style>
    <!-- <a href="../backend/index.html" class="btn btn-warning position-fixed bottom-0 start-0 m-5 z-3 btn-hover d-none d-lg-block"><i class="bi bi-database align-middle me-1"></i> Backend</a> -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-info btn-icon" style="bottom: 50px;" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


    <section class="section">
        <div class="container">
        <a class="btn btn-info mb-5" href="<?= base_url('/order/history') ?>">My Orders <i
        class="ri-arrow-right-line align-middle ms-1"></i></a>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="table-responsive">
                            <table class="table fs-15 align-middle table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="return_tb_body">
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end">
                            <a href="<?= base_url()?>" class="btn btn-hover btn-primary">Continue Shopping <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end conatiner-->
    </section>


   