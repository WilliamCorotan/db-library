$(document).ready(function () {
    // Generate a random 8character password
    function generatePassword() {
        var length = 8,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }

    // Generate password button onclick event
    $('.generate-password-btn').on('click', function() {
        const password = generatePassword();
        $(this).siblings("[name=password]").val(password);
    })

    // Edit admin (Pencil Icon) button onclick event
    $(document).on('click', '.edit-admin', function(){
        const id = $(this).parent().siblings().first().html()
        $.ajax({
            type: "get",
            url: `${location.origin}/admin/fetch/admin/${id}`,
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
});