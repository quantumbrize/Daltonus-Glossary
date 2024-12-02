<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Staff</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="staffList">
                    <div class="card-header border-bottom-dashed">

                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Staff List</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex flex-wrap align-items-start gap-2">
                                    <a href="<?= base_url('/admin/users/staff/add') ?>" type="button"
                                        class="btn btn-success add-btn">
                                        <i class="ri-add-line align-bottom me-1"></i>
                                        Add Staff
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 30px ;">

                        <div class="table-responsive table-card mb-1">
                            <table class="table align-middle" id="staff_table">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Number</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all" id="staff_table_data">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>