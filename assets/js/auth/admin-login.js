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
                console.log('test')
                console.log(response)
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

                    window.location.replace(`${location.origin}/${response.location}`)
                }
            }
        });
    });
});