$(document).ready(function () {
    $('#delete-admin-modal-btn').on('click', function(){
        const fullName = `${$('#edit_first_name').val()} ${$('#edit_last_name').val()}`
        $('#admin-name').html(fullName)
        $('#edit-admin-modal').modal('hide')
        $('#delete-admin').modal('show')
    })
    
    $('#cancel-admin-delete').on('click', function(){
        $('#delete-admin').modal('hide')
        $('#edit-admin-modal').modal('show')
    })

    $('#delete-admin').on('click', function(){  
        $.ajax({
            type: "post",
            url: `${location.origin}/admin/delete/admin/${$('#edit_id').val()}`,
            dataType: "json",
            success: function (response) {
                $('#delete-admin').modal('hide')
                adminTable();
                console.log(response)
            }
        });
    })
});