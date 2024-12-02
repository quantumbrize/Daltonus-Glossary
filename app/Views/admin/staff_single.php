<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Add Staff</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item">Staff</li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div id="createproduct-form">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Staff Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" >Staff Name</label>
                                <input type="text" class="form-control" id="staff-name" placeholder="Enter Staff Name">
                                <input type="text" class="form-control" id="staff-id" placeholder="Enter Staff Name" hidden>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Staff Role</label>
                                <input type="text" class="form-control" id="staff-role" placeholder="Enter Staff Role">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Phone Number</label>
                                <input type="text" class="form-control" id="staff-number" placeholder="Enter Staff Phone Number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Email</label>
                                <input type="text" class="form-control" id="staff-email" placeholder="Enter Staff Email" readonly>
                            </div>
                          
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Staff Access</h5>
                        </div>
                        <div class="card-body" id="access_bx">
                           
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
            </div>

        </div>
        <div class="text-start mb-3">
            <button class="btn btn-success w-sm" id="staff_update_btn">Save</button>
        </div>
    </div>
</div>