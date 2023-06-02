<section id="registration-section" class="h-100 vw-100 " style="
background-image: url('<?= base_url("assets/images/site/bg/admin_bg.jpg") ?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
">

    <!-- Admin Login Form Container -->
    <div class="container h-100 mx-auto row align-items-center justify-content-center position-relative">
        <div class="bg-body-tertiary bg-opacity-75 max-w-36 row rounded py-3">

            <div>
                <h5 class="display-5">Welcome back, Keeper!</h5>
                <small id="login_error" class="text-danger form-errors"></small>
            </div>
            <!-- Registration Form -->
            <?= form_open('', array(
                'id' => 'admin-login-form',
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
            </div>


            <div class="d-flex justify-content-between">

                <!-- Submit Button -->
                <div class="mb-4 text-end w-100">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#admin-login-form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= base_url('admin/login/user') ?>",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    // resets all error messages
                    $('.form-errors').html('');
                },
                success: function(response) {
                    if (response.form_errors) {
                        if (response.form_errors.email) {
                            $('.form-control').val('');
                            $('#email_error').html(response.form_errors.email);
                        }
                    }
                    if (response.error_message) {
                        $('.form-control').val('');
                        $('#login_error').html(response.error_message);
                    }

                    if (response.location) {
                        window.location.replace(`<?= base_url() ?>${response.location}`)
                    }
                }
            });
        });
    });
</script>