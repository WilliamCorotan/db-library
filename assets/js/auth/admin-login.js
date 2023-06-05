$(document).ready(function() {
    $('#admin-login-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: `${location.origin}/admin/login/user`,
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                // resets all error messages
                $('.form-errors').html('');
            },
            success: function(response) {

                // Checks for form error form the server response
                if (response.form_errors) {
                    
                    if (response.form_errors.email) {
                        $('.form-control').val('');
                        $('#email_error').html(response.form_errors.email);
                    }
                }

                // Checks for login credentials error from the server response
                if (response.error_message) {
                    $('.form-control').val('');
                    $('#login_error').html(response.error_message);
                }

                // Redirects to the url location if present in the server response
                if (response.location) {
                    window.location.replace(`${location.origin}/${response.location}`)
                }
            }
        });
    });
});