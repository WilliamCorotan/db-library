<section id="registration-section" class="h-100 vw-100 " style="
background-image: url('<?= base_url("assets/images/site/bg/bg-image1.jpg") ?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
">

    <!-- Register Form Container -->
    <div class="container h-100 mx-auto row align-items-center justify-content-center position-relative">
        <div class="bg-body-tertiary bg-opacity-75 max-w-36 row rounded py-3">
            <h5 class="display-5">Discover the joy of reading.</h5>
            <h5>Register and borrow books! </h5>
            <!-- Registration Form -->
            <?= form_open('', array(
                'id' => 'register-form',
                'method' => 'post'
            )) ?>

            <!-- Email Field -->
            <div class="form-floating mb-3 mt-4">
                <input type="email" class="form-control  rounded-0 border border-0 border-bottom" name="email" id="email" placeholder="Email Address">
                <label for="email">Email Address</label>
                <small id="email_error" class="text-danger form-errors"></small>
            </div>

            <!-- Password -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-0 border border-0 border-bottom" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
                <small id="password_error" class="text-danger form-errors"></small>
            </div>

            <!-- Confirm Password -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-0 border border-0 border-bottom" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                <label for="confirm_password">Confirm Password</label>
                <small id="confirm_password_error" class="text-danger form-errors"></small>
            </div>

            <div class="d-flex justify-content-between">
                <!-- Redirect link to login -->
                <div class="mb-3 d-inline">
                    <span>Already have an account? </span><a href="<?= base_url('login') ?>">Login</a>
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</section>

<script src="<?= base_url('assets/js/auth/register.js') ?>"></script>