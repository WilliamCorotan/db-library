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
                    window.location.replace(response.location);
                }

            }
        });
    });
});
