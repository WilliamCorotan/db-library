$(document).ready(function() {

    const udt = $('#user-table').DataTable({
        'ajax': {
            type: "get",
            url: "http://localhost/admin/fetch/users",
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
                "data": null,
                "defaultContent": actions('user')
            },
        ],
    });


   





    $(document).on('click', '.edit-user', function(){
        $.ajax({
            type: "get",
            url: `http://localhost/admin/fetch/user/${$(this).parent().parent().siblings().first().html()}`,
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#edit_id').val(response.data.id);
                $('#edit_last_name').val(response.data.last_name);
                $('#edit_first_name').val(response.data.first_name);
                $('#edit_email').val(response.data.email);

                $('#edit-user-modal').modal('show');
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
