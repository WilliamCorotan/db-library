$(document).ready(function() {
    const actions = `
    <div class="text-center">
        <span class="edit-admin h-100"> <i class="fa-solid fa-pencil fa-md"></i> </span>      
    </div>
    `;
    
    function generatePassword() {
        var length = 8,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }

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
    });

    $(document).on('click', '.edit-admin', function(){
        console.log("id: " + $(this).parent().parent().siblings().first().html())
        $.ajax({
            type: "get",
            url: `http://localhost/admin/fetch/admin/${$(this).parent().parent().siblings().first().html()}`,
            dataType: "json",
            success: function (response) {
                $('#edit_id').val(response.data.id);
                $('#edit_last_name').val(response.data.last_name);
                $('#edit_first_name').val(response.data.first_name);
                $('#edit_email').val(response.data.email);
                console.log("status id: " + response.data.status_id)
                if(response.data.status_id == "1"){
                    console.log('me f')
                    $('#edit_status').val('1');
                }
                else{
                    console.log('me t')
                    $('#edit_status').val('2');
                }
                $('#edit-admin-modal').modal('show');
            }
        });
    });

    $('#edit-admin-form').on('submit', function(event){
        event.preventDefault();
        console.log( $(this).serialize());
        $.ajax({
            type: "post",
            url: `http://localhost/admin/fetch/admin/${$(this).parent().parent().siblings().first().html()}/edit`,
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.form_errors) {
                    if (response.form_errors.first_name) {
                        $('#edit_first_name_error').html(response.form_errors.first_name);
                    }
                    if (response.form_errors.last_name) {
                        $('#edit_last_name_error').html(response.form_errors.last_name);
                    }
                    if (response.form_errors.email) {
                        $('#edit_email_error').html(response.form_errors.email);
                    }

                } else {
                    $('input').val('');
                    $('#edit-admin-modal').modal('hide');
                    dt.ajax.reload();
                }   
            }
        });
    })
});
