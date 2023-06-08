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
    formData.append('call_number',$('#call_number').val());
    formData.append('publisher',$('#publisher').val());
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
        },
        success: function (response) {
            $('input, textarea').removeAttr('disabled')
            console.log(response)
            if(response.location){
                location.replace(response.location);
            }
        }
    });
})