<nav class="navbar bg-amber-300 py-4 border-bottom border-warning">
    <div class="container-fluid">
        <i class="fa-solid fa-bars fa-xl ms-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"></i>
        <div class="d-flex align-items-center justify-content-center">
            <div class="btn-group">
                <span class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span type="button" class="text-capitalize fw-bold nav-user-container" data-user-id="<?= $this->session->userdata('user_id') ?>"></span>
                    <a type=button class="visually-hidden">Toggle Dropdown</a>
                </span>
                <ul class="dropdown-menu  dropdown-menu-end">
                    <li><span class="text-capitalize fw-bold nav-user-container px-3"></span></li>
                    <hr>
                    <li><a class="dropdown-item" href="<?= base_url('admin/profile') ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="<?= base_url('assets/js/admin/adminNavbar.js') ?>">

</script>