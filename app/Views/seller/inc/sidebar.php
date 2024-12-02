<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajax({
        url: "<?= base_url('/api/about') ?>",
        type: "GET",
        success: function (resp) {
            // console.log(resp)
            if (resp.status) {
                let newLogoSrc = `<?= base_url() ?>public/uploads/logo/${resp.data.logo}`;
                $('.logo_dal').attr('src', newLogoSrc);


            } else {
                console.log(resp)
            }
        },
        error: function (err) {
            console.log(err)
        },
    })

</script>
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img class="logo_dal" src="" alt="" height="140">
            </span>
            <span class="logo-lg">
                <img class="logo_dal" src="" alt="" height="140">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img class="logo_dal" src="" alt="" height="140">
            </span>
            <span class="logo-lg">
                <img class="logo_dal" src="" alt="" height="140">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user"
                    src="<?= base_url() ?>public/assets_admin/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                            class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                            class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                    class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                    class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                    class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance :
                    <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span
                    class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                    class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                    class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock
                    screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                    data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item ">
                    <a class="nav-link menu-link <?= isset($sidebar['dashboard']) ? 'active' : '' ?>"
                        href="<?= base_url('/seller') ?>">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>





                <li class="nav-item">
                    <a class="nav-link menu-link <?= isset($sidebar['products']) ? 'active' : '' ?>"
                        href="#sidebarProduct" data-bs-toggle="collapse" role="button"
                        aria-expanded="<?= isset($sidebar['products']) ? 'true' : 'false' ?>"
                        aria-controls="sidebarProduct">
                        <i class="ri-archive-line"></i>
                        <span>Products</span>
                    </a>
                    <div class="<?= isset($sidebar['products']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarProduct">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= base_url('/seller/product/list') ?>" class="nav-link">
                                    All Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/seller/product/add') ?>" class="nav-link">
                                    Add Product
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link <?= isset($sidebar['orders']) ? 'active' : '' ?>" href="#sidebarOrder"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="<?= isset($sidebar['orders']) ? 'true' : 'false' ?>"
                        aria-controls="sidebarOrder">
                        <i class="ri ri-survey-line"></i> <span data-key="t-widgets">Orders</span>
                    </a>
                    <div class="<?= isset($sidebar['orders']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarOrder">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= base_url('seller/orders') ?>">
                                    <span>All Orders</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?= base_url('seller/orders/returns') ?>">
                                    <span>Returns</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">