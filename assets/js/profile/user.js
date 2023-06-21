$(document).ready(function() {
    if(sessionStorage.getItem('message')){
        const message = sessionStorage.getItem('message')
        $('#toast-body').html('')
        $('#toast-body').html(message)
        $('#liveToast').addClass('text-bg-success');
        const toast = $('#liveToast');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
        toastBootstrap.show()

        sessionStorage.removeItem('message')
    }

    const param = new URLSearchParams(location.search)
    // Personal Information Form submit event
    $('#personal-information-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: `${location.origin}/profile/update/user`,
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function(){
                $('.form-errors').html('')
            },
            success: function(response) {

                if(response.form_errors){
                   if(response.form_errors.first_name){
                        $('#first-name-error').html(response.form_errors.first_name)
                   }

                   if(response.form_errors.last_name){
                    $('#last-name-error').html(response.form_errors.last_name)
                   }

                   if(response.form_errors.contact_number){
                    $('#contact-number-error').html(response.form_errors.contact_number)
                   }
                }

                if(response.message){
                    location.reload()
                    sessionStorage.setItem('message', response.message)
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

                if(response.form_errors){
                    if(response.form_errors.street){
                        $('#street-error').html(response.form_errors.street)
                   }
                    if(response.form_errors.barangay){
                        $('#barangay-error').html(response.form_errors.barangay)
                   }
                    if(response.form_errors.city){
                        $('#city-error').html(response.form_errors.city)
                   }
                    if(response.form_errors.province){
                        $('#province-error').html(response.form_errors.province)
                   }
                    if(response.form_errors.zip_code){
                        $('#zip-code-error').html(response.form_errors.zip_code)
                   }
                }

                if(response.message){
                    location.reload()
                    sessionStorage.setItem('message', response.message)
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

                if(response.form_errors){
                    if(response.form_errors.email){
                        $('#email-error').html(response.form_errors.email)
                   }
                    if(response.form_errors.current_password){
                        $('#current-password-error').html(response.form_errors.current_password)
                   }
                    if(response.form_errors.new_password){
                        $('#new-password-error').html(response.form_errors.new_password)
                   }
                    if(response.form_errors.confirm_password){
                        $('#confirm-password-error').html(response.form_errors.confirm_password)
                   }
                }

                if(response.message){    
                    location.reload()
                    sessionStorage.setItem('message', response.message)
                }
            }
        });
    });
});