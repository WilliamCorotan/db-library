$(document).ready(function() {
    const param = new URLSearchParams(location.search)
    // Personal Information Form submit event
    $('#personal-information-form').on('submit', function(event) {
        event.preventDefault();
        console.log($(this).serialize())
        $.ajax({
            type: "post",
            url: `${location.origin}/profile/update/user`,
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                console.log(response);
                if(!response.form_errors){
                    location.href = param.get('location')
                }
            }
        });
    });

    // Address Information Form submit event
    $('#address-information-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: `${location.origin}/profile/update/address`,
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                console.log(response);
                if(!response.form_errors){
                    location.href = param.get('location')
                }
            }
        });
    });

    //Security Information Form submit event
    $('#security-information-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: `${location.origin}/profile/update/security`,
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                console.log(response);
            }
        });
    });
});