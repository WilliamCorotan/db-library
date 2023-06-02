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

                <h2>Personal Information</h2>
                <!-- Last Name  Field -->
                <div class="mb-3 row">
                    <label for="edit_last_name" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_last_name" name="last_name">
                        <small id="edit-last_name_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- First Name Field -->
                <div class="mb-3 row">
                    <label for="edit_first_name" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_first_name" name="first_name">
                        <small id="edit-first_name_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- Contact Number Field -->
                <div class="mb-3 row">
                    <label for="edit_contact_number" class="col-sm-3 col-form-label">Contact Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_contact_number" name="contact_number">
                        <small id="edit-contact_number_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- Address Information fields -->
                <h2>Address Information</h2>

                <!-- Street Field -->
                <div class="mb-3 row">
                    <label for="edit_street" class="col-sm-3 col-form-label">Street</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_street" name="street">
                        <small id="edit-street_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- Barangay Field -->
                <div class="mb-3 row">
                    <label for="edit_barangay" class="col-sm-3 col-form-label">Barangay</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_barangay" name="barangay">
                        <small id="edit-barangay_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- City Field -->
                <div class="mb-3 row">
                    <label for="edit_city" class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_city" name="city">
                        <small id="edit-city_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- Province Field -->
                <div class="mb-3 row">
                    <label for="edit_province" class="col-sm-3 col-form-label">Province</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_province" name="province">
                        <small id="edit-province_error" class="text-danger"></small>
                    </div>
                </div>

                <!-- Zip Code Field -->
                <div class="mb-3 row">
                    <label for="edit_zip_code" class="col-sm-3 col-form-label">Zip Code</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="edit_zip_code" name="zip_code">
                        <small id="edit-zip_code_error" class="text-danger"></small>
                    </div>
                </div>

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