$(document).ready(function() {
    // Personal Information Form submit event
    $('#personal-information-form').on('submit', function(event) {
        event.preventDefault();
        console.log($(this).serialize())
        $.ajax({
            type: "post",
            url: "profile/update/user",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                console.log(response);
            }
        });
    });

    // Address Information Form submit event
    $('#address-information-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: "profile/update/address",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                console.log(response);

            }
        });
    });

    //Security Information Form submit event
    $('#security-information-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: "profile/update/security",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                console.log(response);

            }
        });
    });
});