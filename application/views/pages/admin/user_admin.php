<section class="py-3">
    <div id="datatable-container" class="container">
        <div class="my-3 d-flex justify-content-between">
            <h2>Admins</h2>
            <div>
                <a name="add-admin" id="add-admin" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#add-admin-modal">Add</a>
            </div>
        </div>

        <!-- Modal -->
        <?php $this->load->view('components/admin/add_admin') ?>
        <?php $this->load->view('components/admin/edit_admin') ?>

        <div class="table-responsive">
            <table id="admin-table" class="table table-striped table-hover">
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

    </div>
</section>

<script src="<?= base_url('assets/js/admin/user/adminTable.js') ?>"></script>