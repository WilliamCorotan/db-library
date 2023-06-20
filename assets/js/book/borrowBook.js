$(document).ready(function () {
    if(sessionStorage.getItem('availability')){
        const availabilityMessage = sessionStorage.getItem('availabilityMessage')
        console.log(availabilityMessage)
        $('#toast-body').html('')
        $('#toast-body').html(availabilityMessage)
        $('#liveToast').addClass('text-bg-danger');
        const toast = $('#liveToast');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
        toastBootstrap.show()

        sessionStorage.removeItem('availability')
        sessionStorage.removeItem('availabilityMessage')
    }
    // Check if user information field has values
    if(!$('#first_name').val() || !$('#last_name').val() || !$('#contact_number').val() || !$('#street').val() || !$('#barangay').val() || !$('#city').val() || !$('#province').val() || !$('#zip_code').val()){
        $("#user_data").val('1')
        console.log('checking')
    }

    $('#borrow-btn').on('click', function(){
        console.log('borrooww!')
        $('#borrow-book-modal').modal('show')
    })
    
    $('#borrow-book').on('click', function(){
        console.log($('#borrow-book-form').serialize())
        $.ajax({
            type: "post",
            url: `${location.origin}/book/borrow`,
            data:  $('#borrow-book-form').serialize()
            ,
            dataType: "json",
            beforeSend: function(){
                $('.form-errors').html('')
            },
            success: function (response) {

            if(response.form_errors){
                if(response.form_errors.first_name){
                    console.log(response.form_errors.first_name)
                    $('#first-name-error').html(response.form_errors.first_name)
                }

                if(response.form_errors.last_name){
                    $('#last-name-error').html(response.form_errors.last_name)
                }

                if(response.form_errors.contact_number){
                    $('#contact-number-error').html(response.form_errors.contact_number)
                }

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

                if(response.form_errors.borrow_date){
                    $('#borrow-date-error').html(response.form_errors.borrow_date)
                }

                if(response.form_errors.due_date){
                    $('#return-date-error').html(response.form_errors.due_date)
                }
            } 

            if(response.availability){
                console.log(response.availability)
                sessionStorage.setItem('availability', false)
                sessionStorage.setItem('availabilityMessage', response.availability)
                location.reload()

            }

            if(response.first_save){
                console.log(response.message);
                $('#borrow-book-modal').modal('hide')
                $('#first-save-modal').modal('show')
                $('#first-save-modal').find('#modal-message').html(response.message)
            }

            if(response.reload){
                location.reload()
            }

            }
        });
    })

    $('#first-save-yes-btn').on('click', function(){
        $("#user_data").val('')
        $('#save').val('1')
        $.ajax({
            type: "post",
            url: `${location.origin}/book/borrow`,
            data:  $('#borrow-book-form').serialize()
            ,
            dataType: "json",
            beforeSend: function(){
                $('.form-errors').html('')
            },
            success: function (response) {

            if(response.form_errors){
                if(response.form_errors.first_name){
                    console.log(response.form_errors.first_name)
                    $('#first-name-error').html(response.form_errors.first_name)
                }

                if(response.form_errors.last_name){
                    $('#last-name-error').html(response.form_errors.last_name)
                }

                if(response.form_errors.contact_number){
                    $('#contact-number-error').html(response.form_errors.contact_number)
                }

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

                if(response.form_errors.borrow_date){
                    $('#borrow-date-error').html(response.form_errors.borrow_date)
                }

                if(response.form_errors.due_date){
                    $('#return-date-error').html(response.form_errors.due_date)
                }
            }

            if(response.availability){
                console.log(response)
                location.reload()
            }

            if(response.first_save){
                console.log(response.message);
                $('#borrow-book-modal').modal('hide')
                $('#first-save-modal').modal('show')
                $('#first-save-modal').find('#modal-message').html(response.message)
            }
            }
        });
    })

    $('#first-save-no-btn').on('click', function(){
        $("#user_data").val('')
        $('#save').val('')
        $.ajax({
            type: "post",
            url: `${location.origin}/book/borrow`,
            data:  $('#borrow-book-form').serialize()
            ,
            dataType: "json",
            beforeSend: function(){
                $('.form-errors').html('')
            },
            success: function (response) {

            if(response.form_errors){
                if(response.form_errors.first_name){
                    console.log(response.form_errors.first_name)
                    $('#first-name-error').html(response.form_errors.first_name)
                }

                if(response.form_errors.last_name){
                    $('#last-name-error').html(response.form_errors.last_name)
                }

                if(response.form_errors.contact_number){
                    $('#contact-number-error').html(response.form_errors.contact_number)
                }

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

                if(response.form_errors.borrow_date){
                    $('#borrow-date-error').html(response.form_errors.borrow_date)
                }

                if(response.form_errors.due_date){
                    $('#return-date-error').html(response.form_errors.due_date)
                }
            } 

            if(response.availability){
                console.log(response)
                location.reload()
            }

            if(response.first_save){
                console.log(response.message);
                $('#borrow-book-modal').modal('hide')
                $('#first-save-modal').modal('show')
                $('#first-save-modal').find('#modal-message').html(response.message)
            }
            }
        });
    })
});