function adminNavbar(){
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: `/admin/fetch/admin/${$("#nav-user-container").attr('data-user-id')}`,
            dataType: "json",
            success: function(response) {
                if (response.data.first_name) {
                    $('#nav-user-container').html(response.data.first_name);
                }
            }
        });
    });
}

adminNavbar();
