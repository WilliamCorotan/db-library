$('#add-book-form').on('submit', function(event){
    event.preventDefault();

    const formData = new FormData();

    formData.append('cover_image',$('#cover_image').get(0).files[0]);
    formData.append('title',$('#title').val());
    formData.append('description',$('#description').val());
    if($('#author').attr('data-author-id')){
        formData.append('author',$('#author').attr('data-author-id'));
    } else{
        formData.append('author',$('#author').val());
    }
    
    if($('#subject').attr('data-subject-id')){
        formData.append('subject',$('#subject').attr('data-subject-id'));
    } else{
        formData.append('subject',$('#subject').val());
    }

    if($('#publisher').attr('data-publisher-id')){
        formData.append('publisher',$('#publisher').attr('data-publisher-id'));
    } else{
        formData.append('publisher',$('#publisher').val());
    }


    formData.append('call_number',$('#call_number').val());
    formData.append('publish_date',$('#publish_date').val());
    

    $.ajax({
        type: "post",
        url: `${location.origin}/book/store`,
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function(){
            $('input, textarea').attr('disabled', 'disabled')
            $('.form-errors').html('');
        },
        success: function (response) {
            $('input, textarea').removeAttr('disabled')
            if(response.form_errors){
                console.log(response.form_errors)

                if(response.form_errors.title){
                        $('#title-error').html(response.form_errors.title)
                }

                if(response.form_errors.description){
                        $('#description-error').html(response.form_errors.description)
                }

                if(response.form_errors.author){
                        $('#author-error').html(response.form_errors.author)
                }

                if(response.form_errors.subject){
                        $('#subject-error').html(response.form_errors.subject)
                }

                if(response.form_errors.call_number){
                        $('#call_number-error').html(response.form_errors.call_number)
                }

                if(response.form_errors.publisher){
                        $('#publisher-error').html(response.form_errors.publisher)
                }

                if(response.form_errors.publish_date){
                        $('#publish_date-error').html(response.form_errors.publish_date)
                }
            }
            if(response.location){
                sessionStorage.setItem('message', response.message);
                location.replace(response.location);
            }
        }
    });
})