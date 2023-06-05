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




});
