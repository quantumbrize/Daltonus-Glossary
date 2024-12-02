
<div class="page-content">
    <div class="container-fluid">
        <div class="row">


            <div class="card">
                <div class="card-header">
                    <h3>Categories</h3>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordion">
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!--  Small modal example -->
    <div class="modal fade bs-example-modal-md" id="delete_modal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true" style="opacity: 1;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Do Youn Really Want to Delete This Category</h5>
                </div>
                <div class="modal-body">
                    <h3 class="fs-15">All the Sub Categories will Also be deleted</h3>
                    <input type="text" id="delete_cat_id" hidden>
                    <input type="text" id="delete_cat_bx" hidden>
                </div>
                <div class="modal-footer">
                    <a  class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal" onclick="hide_delete_modal()">
                        <i class="ri-close-line me-1 align-middle"></i> 
                        Close
                    </a>
                    <button type="button" class="btn btn-danger" id="delete_action_btn" onclick="delete_category_action()">DELETE</button>
                </div>
            </div>
        </div>
    </div>
</div>