$('#edit-user-form').on('submit', function(event){
    event.preventDefault();

    let formData = {
        email: $('#edit_email').val(),
    }
    // Stores password if generated
    if($('#edit_password').val()){
        formData.password = $('#edit_password').val();
    }

    // Post request to update user information
    $.ajax({
        type: "post",
        url: `http://localhost/admin/fetch/user/${$('#edit_id').val()}/edit`,
        data: formData,
        dataType: "json",
        beforeSend: function (){
        },
        success: function (response) {
            if (response.form_errors) {
                if (response.form_errors.email) {
                    $('#edit-email_error').html(response.form_errors.email);
                }
                
            } else {
                $('input').val('');
                $('#edit-user-modal').modal('hide');
                if(response.message){
                    $('#toast-body').html('')
                    $('#toast-body').html(response.message)
                    $('#liveToast').removeClass('text-bg-danger');
                    $('#liveToast').addClass('text-bg-success');
                    const toast = $('#liveToast');
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
                    toastBootstrap.show()

                }
                userTable();
            }   
        }
    });

    // Event for the login page of the user
    $('#edit-user-modal').on('hidden.bs.modal', function(){
        $('#edit_password').val('');
    });
});