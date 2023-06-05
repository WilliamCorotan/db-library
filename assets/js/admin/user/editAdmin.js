$('#edit-admin-form').on('submit', function(event){
    event.preventDefault();

    let formData = {
        last_name: $('#edit_last_name').val(),
        first_name: $('#edit_first_name').val(),
        email: $('#edit_email').val(),
        status_id: $('#edit_status').val(),
    }
    // Stores password if generated
    if($('#edit_password').val()){
        formData.password = $('#edit_password').val();
    }

    // Post request to update admin information
    $.ajax({
        type: "post",
        url: `http://localhost/admin/fetch/admin/${$('#edit_id').val()}/edit`,
        data: formData,
        dataType: "json",
        beforeSend: function (){
            console.log(formData)
        },
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
                adminTable();
            }   
        }
    });

    // Event for the login page of the admin
    $('#edit-admin-modal').on('hidden.bs.modal', function(){
        $('#edit_password').val('');
    });
});