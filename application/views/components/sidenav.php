<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand text-start w-100 p-0"><img class="w-100" src="<?= base_url('assets/images/site/tower-of-honai-logo-full-black.png') ?>" alt=""></a>
    </div>
    <div class="offcanvas-body p-0">
        <nav class="nav justify-content-center row">
            <div class="py-3  bg-amber-300 border border-warning w-100">
                <div class="navbar-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item fs-6 ">
                            <a class="nav-link px-3 fs-5" href="<?= base_url('dashboard') ?>">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pt-3 bg-amber-300 border border-warning">
                <div class="navbar-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item fs-6 ">
                            <span class="nav-link px-3 fs-5">Books</span>
                        </li>
                    </ul>
                </div>
                <div class="row p-0 px-3  mt-2 bg-amber-100">
                    <ul class="navbar-nav">
                        <li class="nav-item fs-6 p-2">
                            <a class="nav-link px-3 " href="<?= base_url('admin/books') ?>">All Books</a>
                        </li>
                        <li class="nav-item fs-6 p-2">
                            <a class="nav-link px-3 " href="<?= base_url('book/add') ?>">Add</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=" pt-3 bg-amber-300 border border-warning">
                <div class="navbar-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item fs-6 ">
                            <span class="nav-link px-3 fs-5">Users</span>
                        </li>
                    </ul>
                </div>
                <div class="px-3 row mt-2 bg-amber-100">
                    <ul class="navbar-nav">
                        <li class="nav-item fs-6 p-2">
                            <a class="nav-link px-3 " href="<?= base_url('admin/users/admins') ?>">Admins</a>
                        </li>
                        <li class="nav-item fs-6 p-2">
                            <a class="nav-link px-3 " href="<?= base_url('admin/users/users') ?>">All Users</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="py-3  bg-amber-300 border border-warning w-100">
                <div class="navbar-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item fs-6 ">
                            <a class="nav-link px-3 fs-5" href="<?= base_url('admin/transaction') ?>">Transactions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>