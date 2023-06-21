$(document).ready(function() {
    $('#register-form').on('submit', function(event) {
        event.preventDefault();

        let query = ''
        if(location.search){
            param = new URLSearchParams(location.search)
            query = param.get('location')
        }
        $.ajax({
            type: "post",
            url: `${location.origin}/login/user/?location=${query}`,
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                // resets all error messages
                $('.form-errors').html('');
            },
            success: function(response) {

                // Checks for form errors
                if (response.form_errors) {
                    if (response.form_errors.email) {
                        $('.form-control').val('');
                        $('#email_error').html(response.form_errors.email);
                    }
                }

                // Check for login credentials errors
                if (response.error_message) {
                    $('.form-control').val('');
                    $('#login_error').html(response.error_message);
                }

                // Redirects if a redirect url is received from the server
                if (response.location) {
                    window.location.replace(response.location)
                }
            }
        });
    });
});