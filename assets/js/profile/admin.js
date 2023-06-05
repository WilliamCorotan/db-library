$(document).ready(function() {
    // Personal Information Form submit event
    $('#personal-information-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: "profile/update/user",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.form_errors').html('');
            },
            success: function(response) {
                // checks for form errors
                if (response.form_errors) {
                    // checks for current password errors
                    if (response.form_errors.current_password) {
                        $('#password_errors').html(response.form_errors.current_password);
                    } else {
                        $('#confirm-password-modal').modal('hide');

                        if (response.form_errors.first_name) {
                            $('#first_name_errors').html(response.form_errors.first_name);
                        }

                        if (response.form_errors.last_name) {
                            $('#last_name_errors').html(response.form_errors.last_name);
                        }

                        if (response.form_errors.email) {
                            $('#email_errors').html(response.form_errors.email);
                        }

                        if (response.form_errors.new_password) {
                            $('#new_password_errors').html(response.form_errors.new_password);
                        }

                        if (response.form_errors.confirm_password) {
                            $('#confirm_password_errors').html(response.form_errors.confirm_password);
                        }
                    }
                }
                if (!response.form_errors) {
                    $('#confirm-password-modal').modal('hide');
                    adminNavbar()
                }
                $('#current_password').val('');

            }
        });
    });
    $('#confirm-password-modal').on('hidden.bs.modal', function() {
        $('#password_errors').html('');
    })
});