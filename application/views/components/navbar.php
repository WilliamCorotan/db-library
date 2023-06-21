<?php if (!empty($this->session->userdata('is_logged_in'))) : ?>
    <nav class="navbar bg-amber-300">
        <div class="container-fluid">
            <a class="navbar-brand h-1 p-0" href="<?= base_url('') ?>"><img class="h-100" src="<?= base_url('assets/images/site/tower-of-honai-logo-full-black.png') ?>" alt=""></a>
            <div class="d-flex align-items-center justify-content-center">
                <div class="btn-group">
                    <span>Welcome back, </span>
                    <span class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <a type="button"><?= (!empty($this->session->userdata('first_name'))) ? $this->session->userdata('first_name') : "User" ?></a>
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
<?php else : ?>

    <nav class="navbar navbar-expand-lg bg-amber-300">
        <div class="container-fluid">
            <a class="navbar-brand h-1 p-0"><img class="h-100" src="<?= base_url('assets/images/site/tower-of-honai-logo-full-black.png') ?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php endif; ?>