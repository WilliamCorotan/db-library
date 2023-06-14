<section class="py-3">
    <div id="datatable-container" class="container">
        <div class="my-3 d-flex justify-content-between">
            <h2>Admins</h2>
            <div class="d-flex gap-4">
                <input id="admin-search" class="form-control" type="search" placeholder="Search" aria-label="Search">
                <a name="add-admin" id="add-admin" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#add-admin-modal">Add</a>
            </div>
        </div>

        <!-- Modal -->
        <?php $this->load->view('components/admin/add_admin') ?>
        <?php $this->load->view('components/admin/edit_admin') ?>

        <div class="table-responsive">
            <table id="admin-table" class="table table-hover bg-amber-100">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
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


<script src="<?= base_url('assets/js/pagination/fetchAdmin.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/user/adminTable.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/user/addAdmin.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/user/editAdmin.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/user/searchAdmin.js') ?>"></script>