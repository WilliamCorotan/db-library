$(document).ready(function () {
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

                if(response.form_errors.return_date){
                    $('#return-date-error').html(response.form_errors.return_date)
                }
            } 
            }
        });
    })
});