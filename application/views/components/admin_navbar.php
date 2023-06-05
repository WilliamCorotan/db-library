<nav class="navbar bg-body-tertiary py-4">
    <div class="container-fluid">
        <i class="fa-solid fa-bars fa-xl ms-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"></i>
        <div class="d-flex align-items-center justify-content-center">
            <div class="btn-group">
                <span>Welcome back, </span>
                <span class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="nav-user-container" type="button" class="text-capitalize" data-user-id="<?= $this->session->userdata('user_id') ?>"></span>
                    <a type=button class="visually-hidden">Toggle Dropdown</a>
                </span>
                <ul class="dropdown-menu  dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?= base_url('admin/profile') ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="<?= base_url('assets/js/admin/adminNavbar.js') ?>">

</script>