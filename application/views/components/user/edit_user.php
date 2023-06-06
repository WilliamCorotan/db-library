<!-- Modal -->
<div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="editUserModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('', array('id' => 'edit-user-form')) ?>
            <div class="modal-body">
                <input type="hidden" id="edit_id" name="id">

                <!-- Security Information Fields -->
                <h2>Security Information</h2>

                <!-- Email Field -->
                <div class="mb-3 row">
                    <label for="edit_email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="edit_email" name="email">
                        <small id="edit-email_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mb-3 row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <div class="d-flex">
                            <input type="text" class="form-control disabled text-center w-75 rounded-0 rounded-start" id="edit_password" name="password" disabled>
                            </input>
                            <a class=" generate-password-btn btn btn-outline-secondary  w-25  rounded-0 rounded-end" role="button">Generate</a>
                        </div>
                        <small id="password_error" class="text-danger"></small>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="add" type="submit" class="btn btn-primary">Update</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>