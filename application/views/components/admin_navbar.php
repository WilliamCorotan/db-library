<nav class="navbar bg-body-tertiary py-4">
    <div class="container-fluid">
        <i class="fa-solid fa-bars fa-xl ms-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"></i>
        <div class="d-flex align-items-center justify-content-center">
            <div class="btn-group">
                <span>Welcome back, </span>
                <span class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span id="nav-user-container" type="button" class="text-capitalize"></span>
                    <a type=button class="visually-hidden">Toggle Dropdown</a>
                </span>
                <ul class="dropdown-menu  dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "<?= base_url("admin/fetch/admin/") . $this->session->userdata('user_id') ?>",
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.data.first_name) {
                    $('#nav-user-container').html(response.data.first_name);
                }
            }
        });
    });
</script>