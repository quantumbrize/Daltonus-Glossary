<style>
    .section {
        margin: 100px 0px 100px 0px;
    }
</style>
<section class="section pt-0 ">
    <div class="container " style="padding: 50px 0px 0px 0px;">
        <div class="card border-dashed">
            <div class="card-header border-bottom border-bottom-dashed p-4">
                <div class="row g-3">
                    <h4 style="padding: 0px 20px 0px 20px;">
                        Order Id -
                        <?= $_GET['o_id'] ?>
                    </h4>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="form-group">
                        <label for="">Cancellation Reason</label>
                        <textarea type="text" class="form-control" id="res_inp"
                            placeholder="Please Enter Your Cancellation Reason"></textarea>
                        <button class="btn btn-info mt-4 center" id="res_btn">Cancel Order</button>
                    </div>

                </div>
            </div>
        </div>
    </div><!--end container-->
</section>