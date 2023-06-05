<section id="profile-container" class="container mt-5">
    <!-- Personal Information Fields -->
    <article class="card mb-3">
        <header class="card-header">
            <h3 class="card-title">Personal Information</h3>
        </header>
        <main class="card-body">
            <?= form_open('profile/update/user', array('id' => 'personal-information-form')) ?>
            <!-- First Name Field -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $userdata['first_name'] ?>" placeholder="Enter your first name..." aria-describedby="firstNameHelp">
            </div>

            <!-- Last Name Field -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $userdata['last_name'] ?>" placeholder="Enter your last name..." aria-describedby="lastNameHelp">
            </div>

            <!-- Contact Number Field -->
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" value="<?= $userdata['contact_number'] ?>" placeholder="Enter your contact..." aria-describedby="firstNameHelp">
            </div>

            <!-- Update Button -->
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary ">Update</button>
            </div>
            <?= form_close() ?>
        </main>
    </article>

    <!-- Address Information Fields -->
    <article class="card mb-3">
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
            </div>

            <!-- Barangay Field -->
            <div class="mb-3">
                <label for="barangay" class="form-label">Barangay</label>
                <input type="text" name="barangay" id="barangay" class="form-control" value="<?= $userdata['barangay'] ?>" placeholder="Enter your barangay..." aria-describedby="barangayHelp">
            </div>

            <!-- City Field -->
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control" value="<?= $userdata['city'] ?>" placeholder="Enter your city..." aria-describedby="cityHelp">
            </div>

            <!-- Province Field -->
            <div class="mb-3">
                <label for="province" class="form-label">Province</label>
                <input type="text" name="province" id="province" class="form-control" value="<?= $userdata['province'] ?>" placeholder="Enter your province..." aria-describedby="provinceHelp">
            </div>

            <!-- Zip Code Field -->
            <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" name="zip_code" id="zip_code" class="form-control" value="<?= $userdata['zip_code'] ?>" placeholder="Enter your zip code..." aria-describedby="zipCodeHelp">
            </div>

            <!-- Update Button -->
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?= form_close() ?>
        </main>
    </article>


    <!-- Security Fields -->
    <article class="card mb-3">
        <header class="card-header">
            <h3 class="card-title">Security</h3>
        </header>
        <main class="card-body">
            <?= form_open('profile/update/security', array('id' => 'security-information-form')) ?>
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $userdata['email'] ?>" placeholder="Enter your email..." aria-describedby="EmailHelp">
            </div>

            <!-- Current Password Field -->
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter your current password..." aria-describedby="currentPasswordHelp">
            </div>

            <!-- New Password Field -->
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password..." aria-describedby="newPasswordHelp">
            </div>

            <!-- New Password Field -->
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-enter new password..." aria-describedby="confirmPasswordHelp">
            </div>

            <!-- Update Button -->
            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?= form_close() ?>
        </main>
    </article>
</section>

<script src="assets/js/profile/user.js">

</script>