$(document).ready(function () {
    $('#add-admin-form').on('submit', function(event) {
        event.preventDefault();
    
        const formData = {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
        }
    
        $.ajax({
            type: "post",
            url: "http://localhost/admin/add/admin",
            data: formData,
            dataType: "json",
            beforeSend: function() {
    
                $('#first_name_error').html('');
                $('#last_name_error').html('');
                $('#email_error').html('');
                $('#password_error').html('');
    
            },
            success: function(response) {
    
                if (response.form_errors) {
                    if (response.form_errors.first_name) {
                        $('#first_name_error').html(response.form_errors.first_name);
                    }
                    if (response.form_errors.last_name) {
                        $('#last_name_error').html(response.form_errors.last_name);
                    }
                    if (response.form_errors.email) {
                        $('#email_error').html(response.form_errors.email);
                    }
                    if (response.form_errors.password) {
                        $('#password_error').html(response.form_errors.password);
                    }
                } else {
                    $('input').val('');
                    $('#add-admin-modal').modal('hide');
                    adminTable()
                }   
            }
        });
    });
});