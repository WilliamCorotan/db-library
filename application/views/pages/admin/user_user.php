<section class="py-3">
    <div id="datatable-container" class="container">
        <div class="my-3 d-flex justify-content-between">
            <h2>Users</h2>
            <div class="d-flex gap-4">
                <input id="user-search" class="form-control" type="search" placeholder="Search" aria-label="Search">
            </div>
        </div>

        <!-- Modal -->
        <?php $this->load->view('components/user/edit_user') ?>

        <div class="table-responsive">
            <table id="user-table" class="table table-hover bg-amber-100">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id='liveToast' class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
                <div class="d-flex">
                    <div id="toast-body" class="toast-body">
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="<?= base_url('assets/js/pagination/fetchUser.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/user/userTable.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/user/editUser.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/user/searchUser.js') ?>"></script>