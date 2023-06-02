<!-- Modal -->
<div class="modal fade" id="add-admin-modal" tabindex="-1" aria-labelledby="add-admin-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('', array('id' => 'add-admin-form')) ?>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="last_name" name="last_name">
                        <small id="last_name_error" class="text-danger"></small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="first_name" name="first_name">
                        <small id="first_name_error" class="text-danger"></small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email">
                        <small id="email_error" class="text-danger"></small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <div class="d-flex">
                            <input type="text" class="form-control disabled text-center w-75 rounded-0 rounded-start" id="password" name="password" disabled>
                            </input>
                            <a class="generate-password-btn btn btn-outline-secondary  w-25  rounded-0 rounded-end" role="button">Generate</a>
                        </div>
                        <small id="password_error" class="text-danger"></small>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="add" type="submit" class="btn btn-primary">Add</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>