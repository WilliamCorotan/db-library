<!-- Modal -->
<div class="modal fade" id="edit-admin-modal" tabindex="-1" aria-labelledby="edit-admin-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('', array('id' => 'edit-admin-form')) ?>
            <div class="modal-body">
                <input type="hidden" id="edit_id" name="id">
                <div class="mb-3 row">
                    <label for="edit_last_name" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_last_name" name="last_name">
                        <small id="edit-last_name_error" class="text-danger"></small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="edit_first_name" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_first_name" name="first_name">
                        <small id="edit-first_name_error" class="text-danger"></small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="edit_email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="edit_email" name="email">
                        <small id="edit-email_error" class="text-danger"></small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="edit_status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <div>
                            <select class="form-select" name="status" id="edit_status">
                                <option value="1">Active</option>
                                <option value="2">In-active</option>
                            </select>
                        </div>
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