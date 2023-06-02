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

    $('.generate-password-btn').on('click', function() {
        const password = generatePassword();
        $(this).siblings("[name=password]").val(password);
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
        $.ajax({
            type: "get",
            url: `http://localhost/admin/fetch/admin/${$(this).parent().parent().siblings().first().html()}`,
            dataType: "json",
            success: function (response) {
                $('#edit_id').val(response.data.id);
                $('#edit_last_name').val(response.data.last_name);
                $('#edit_first_name').val(response.data.first_name);
                $('#edit_email').val(response.data.email);
                if(response.data.status_id == "1"){
                    $('#edit_status').val('1');
                }
                else{
                    $('#edit_status').val('2');
                }
                $('#edit-admin-modal').modal('show');
            }
        });
    });

    $('#edit-admin-form').on('submit', function(event){
        event.preventDefault();

        let formData = {
            last_name: $('#edit_last_name').val(),
            first_name: $('#edit_first_name').val(),
            email: $('#edit_email').val(),
            status_id: $('#edit_status').val(),
        }

        if($('#edit_password').val()){
            formData.password = $('#edit_password').val();
        }

            $.ajax({
            type: "post",
            url: `http://localhost/admin/fetch/admin/${$('#edit_id').val()}/edit`,
            data: formData,
            dataType: "json",
            success: function (response) {
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
    });

    $('#edit-admin-modal').on('hidden.bs.modal', function(){
        $('#edit_password').val('');
    });
});
