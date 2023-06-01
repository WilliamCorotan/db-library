$(document).ready(function() {

    const actions = `
    <div class=" d-flex justify-content-between">
        <span> <i class="fa-solid fa-pencil fa-md"></i> </span>
        <span> <i class="fa-solid fa-eye fa-md"></i> </span>
        <span> <i class="fa-solid fa-trash-can fa-md"></i> </span>
    </div>
    `;
    
    const dt = $('#myTable').DataTable({
        'ajax': {
            type: "get",
            url: "http://localhost/admin/fetch/admins",
            dataSrc: ''
        },
        'columns': [{
                "data": "id"
            },
            {
                "data": "last_name"
            },
            {
                "data": "first_name"
            },
            {
                "data": "email"
            },
            {
                "data": "status"
            },
            {
                "data": null,
                "defaultContent": actions
            },
        ],
    });
    


    function generatePassword() {
        var length = 8,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }

    $('#generate-password-btn').on('click', function() {
        const password = generatePassword();
        $('#password').val(password);
    })
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
                console.log(formData);

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
                    dt.ajax.reload();
                }   
            }
        });
    })
});
