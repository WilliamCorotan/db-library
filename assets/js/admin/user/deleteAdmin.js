$(document).ready(function () {
    $('#delete-admin-modal-btn').on('click', function(){
        const fullName = `${$('#edit_first_name').val()} ${$('#edit_last_name').val()}`
        $('#admin-name').html(fullName)
        $('#edit-admin-modal').modal('hide')
        $('#delete-admin-modal').modal('show')
    })
    
    $('#cancel-admin-delete').on('click', function(){
        $('#delete-admin-modal').modal('hide')
        $('#edit-admin-modal').modal('show')
    })

    $('#delete-admin').on('click', function(){  
        $.ajax({
            type: "post",
            url: `${location.origin}/admin/delete/admin/${$('#edit_id').val()}`,
            dataType: "json",
            success: function (response) {
                $('#delete-admin-modal').modal('hide')
                if(response.message){
                    $('#toast-body').html('')
                    $('#toast-body').html(response.message)
                    $('#liveToast').removeClass('text-bg-success');
                    $('#liveToast').addClass('text-bg-danger');
                    const toast = $('#liveToast');
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
                    toastBootstrap.show()

                }
                adminTable();
            }
        });
    })
});