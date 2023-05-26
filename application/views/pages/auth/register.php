<section id="registration-section" class="vh-100 vw-100 " style="
background-image: url('<?= base_url("assets/images/site/bg/bg-image1.jpg") ?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
">
    <div class="container vh-100 mx-auto row align-items-center  justify-content-center">
        <div class="bg-dark max-w-36 row rounded py-3">
            <div>

            </div>
            <!-- Registration Form -->
            <form id="register-form" method="post">

                <!-- Email Field -->
                <div class="form-floating mb-3 mt-4">
                    <input type="email" class="form-control  rounded-0 border border-0 border-bottom" name="email" id="email" placeholder="Email Address">
                    <label for="email">Email Address</label>
                </div>

                <!-- Password -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-0 border border-0 border-bottom" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <!-- Confirm Password -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-0 border border-0 border-bottom" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                    <label for="confirm_password">Confirm Password</label>
                </div>

                <div class="d-flex text-white justify-content-between">
                    <!-- Redirect link to login -->
                    <div class="mb-3 d-inline">
                        <span>Already have an account? </span><a href="<?= base_url('login') ?>">Login</a>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

    });
</script>