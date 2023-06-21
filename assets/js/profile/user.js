$(document).ready(function() {
    const param = new URLSearchParams(location.search)
    // Personal Information Form submit event
    $('#personal-information-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: `${location.origin}/profile/update/user`,
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                location.reload()
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
                location.reload()
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
                location.reload()
            }
        });
    });
});