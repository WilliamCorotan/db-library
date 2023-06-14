<section id="profile-container" class="container mt-5">
    <!-- Personal Information Fields -->
    <article class="card mb-3 bg-amber-100">
        <header class="card-header">
            <h3 class="card-title">Personal Information</h3>
        </header>
        <main class="card-body">

            <?= form_open('profile/update/user', array('id' => 'personal-information-form')) ?>
            <input type="hidden" name="id" class="form-control" value="<?= $userdata['id'] ?>" aria-describedby="firstNameHelp">
            <!-- First Name Field -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $userdata['first_name'] ?>" placeholder="Enter your first name..." aria-describedby="firstNameHelp">
                <small id="first_name_errors" class="form_errors text-danger"></small>
            </div>

            <!-- Last Name Field -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $userdata['last_name'] ?>" placeholder="Enter your last name..." aria-describedby="lastNameHelp">
                <small id="last_name_errors" class="form_errors text-danger"></small>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $userdata['email'] ?>" placeholder="Enter your email..." aria-describedby="EmailHelp">
                <small id="email" class="form_errors text-danger"></small>
            </div>

            <hr class=" border border-warning border-2 opacity-50">

            <!-- New Password Field -->
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password..." aria-describedby="newPasswordHelp">
                <small id="new_password_errors" class="form_errors text-danger"></small>
            </div>

            <!-- New Password Field -->
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-enter new password..." aria-describedby="confirmPasswordHelp">
                <small id="confirm_password_errors" class="form_errors text-danger"></small>
            </div>


            <!-- Update Button -->
            <div class="mb-3 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm-password-modal">Update</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirm-password-modal" tabindex="-1" aria-labelledby="confirmPassword" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Password</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <small id="password_errors" class="form_errors text-danger"></small>
                            <!-- Current Password Field -->
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter your current password..." aria-describedby="currentPasswordHelp">

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </main>
    </article>


</section>

<script src="<?= base_url('assets/js/profile/admin.js') ?>">

</script>