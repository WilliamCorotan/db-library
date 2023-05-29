<section id="registration-section" class="vh-100 vw-100 " style="
background-image: url('<?= base_url("assets/images/site/bg/bg-image1.jpg") ?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
">

    <!-- Register Form Container -->
    <div class="container vh-100 mx-auto row align-items-center justify-content-center position-relative">
        <!-- logo image top -->
        <div class="d-flex justify-content-center position-absolute top-0">
            <img class="w-4 mt-3" src="<?= base_url('assets/images/site/logo_full.png') ?>" alt="">
        </div>
        <div class="bg-light bg-gradient bg-opacity-75 max-w-36 row rounded py-3">
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

<script>
    $(document).ready(function() {
        $('#register-form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: "post",
                url: "register/user",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    // resets all error messages
                    $('.form-errors').html('');
                },
                success: function(response) {
                    console.log(response);

                    // Checks if form errors exits in the server response
                    if (response.form_errors) {

                        // Checks if the form errors has email error
                        if (response.form_errors.email) {
                            $('#email_error').html(response.form_errors.email);
                        }

                        // Checks if the form errors has password error
                        if (response.form_errors.password) {
                            $('#password_error').html(response.form_errors.password);
                        }

                        // Checks if the form errors has confirm password error
                        if (response.form_errors.confirm_password) {
                            $('#confirm_password_error').html(response.form_errors.confirm_password);
                        }
                    } else {
                        console.log(response.message);
                        window.location.replace(response.location);
                    }

                }
            });
        });
    });
</script>