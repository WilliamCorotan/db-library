<section id="profile-container" class="py-5 overflow-hidden" style="
background-image: linear-gradient(to bottom,
                    rgba(33, 37, 41, 0.3),
                    rgba(25, 135, 84, 0.3)),
                    url('<?= base_url("assets/images/site/bg/abstract-painting-01.jpg") ?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
min-height: calc(100vh - 80px) !important;
max-height: calc(100vh - 80px) !important;
">
    <div class="container vh-100 overflow-scroll" style="padding-bottom: 10rem;">
        <!-- Personal Information Fields -->
        <article id="personal-information" class="card mb-3">
            <header class="card-header">
                <h3 class="card-title">Personal Information</h3>
            </header>
            <main class="card-body">
                <?= form_open('profile/update/user', array('id' => 'personal-information-form')) ?>
                <!-- First Name Field -->
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $userdata['first_name'] ?>" placeholder="Enter your first name..." aria-describedby="firstNameHelp">
                    <small id="first-name-error" class="text-danger form-errors"></small>
                </div>

                <!-- Last Name Field -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $userdata['last_name'] ?>" placeholder="Enter your last name..." aria-describedby="lastNameHelp">
                    <small id="last-name-error" class="text-danger form-errors"></small>
                </div>

                <!-- Contact Number Field -->
                <div class="mb-3">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" class="form-control" value="<?= $userdata['contact_number'] ?>" placeholder="Enter your contact..." aria-describedby="firstNameHelp">
                    <small id="contact-number-error" class="text-danger form-errors"></small>
                </div>

                <!-- Update Button -->
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
                <?= form_close() ?>
            </main>
        </article>

        <!-- Address Information Fields -->
        <article id="address-information" class="card mb-3">
            <header class="card-header">
                <h3 class="card-title">Address Information</h3>
            </header>
            <main class="card-body">
                <?= form_open('profile/update/address', array('id' => 'address-information-form')) ?>
                <!-- ID Field -->
                <input type="hidden" name="address_id" id="address_id" class="form-control" value="<?= $userdata['address_id'] ?>">

                <!-- Street Field -->
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?= $userdata['street'] ?>" placeholder="Enter your street address..." aria-describedby="streetHelp">
                    <small id="street-error" class="text-danger form-errors"></small>
                </div>

                <!-- Barangay Field -->
                <div class="mb-3">
                    <label for="barangay" class="form-label">Barangay</label>
                    <input type="text" name="barangay" id="barangay" class="form-control" value="<?= $userdata['barangay'] ?>" placeholder="Enter your barangay..." aria-describedby="barangayHelp">
                    <small id="barangay-error" class="text-danger form-errors"></small>
                </div>

                <!-- City Field -->
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" id="city" class="form-control" value="<?= $userdata['city'] ?>" placeholder="Enter your city..." aria-describedby="cityHelp">
                    <small id="city-error" class="text-danger form-errors"></small>
                </div>

                <!-- Province Field -->
                <div class="mb-3">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" name="province" id="province" class="form-control" value="<?= $userdata['province'] ?>" placeholder="Enter your province..." aria-describedby="provinceHelp">
                    <small id="province-error" class="text-danger form-errors"></small>
                </div>

                <!-- Zip Code Field -->
                <div class="mb-3">
                    <label for="zip_code" class="form-label">Zip Code</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control" value="<?= $userdata['zip_code'] ?>" placeholder="Enter your zip code..." aria-describedby="zipCodeHelp">
                    <small id="zip-code-error" class="text-danger form-errors"></small>
                </div>

                <!-- Update Button -->
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?= form_close() ?>
            </main>
        </article>


        <!-- Security Fields -->
        <article id="security-information" class="card mb-3">
            <header class="card-header">
                <h3 class="card-title">Security</h3>
            </header>
            <main class="card-body">
                <?= form_open('profile/update/security', array('id' => 'security-information-form')) ?>
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $userdata['email'] ?>" placeholder="Enter your email..." aria-describedby="EmailHelp">
                    <small id="email-error" class="text-danger form-errors"></small>
                </div>

                <!-- Current Password Field -->
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter your current password..." aria-describedby="currentPasswordHelp">
                    <small id="current-password-error" class="text-danger form-errors"></small>
                </div>

                <!-- New Password Field -->
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password..." aria-describedby="newPasswordHelp">
                    <small id="new-password-error" class="text-danger form-errors"></small>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-enter new password..." aria-describedby="confirmPasswordHelp">
                    <small id="confirm-password-error" class="text-danger form-errors"></small>
                </div>

                <!-- Update Button -->
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?= form_close() ?>
            </main>
        </article>
    </div>
</section>

<?php $this->load->view('components/user/profile_toast') ?>
<script src="<?= base_url('assets/js/profile/user.js') ?>">

</script>