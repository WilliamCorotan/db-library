$(document).ready(function () {
    const spinner = `
    <div style="width:98px;">
        <div class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>`;
    $('#edit-book-form').on('submit', function(event){
        event.preventDefault();
        const id = $('#edit-id').val();

        const formData = new FormData();

        // checks for empty cover image field
        if($('#edit-cover_image').get(0).files.length === 0 ){
            formData.append('cover_image', $('#edit-cover_image').attr('data-cover-image'));
        }
        else{
            formData.append('cover_image',$('#edit-cover_image').get(0).files[0]);
        }

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

        formData.append('title', $('#title').val());
        formData.append('description', $('#description').val());
        formData.append('borrow_status', $('#borrow_status').val());
        formData.append('call_number', $('#call_number').val());
        formData.append('publish_date', $('#publish_date').val());
        $.ajax({
            type: "post",
            url: `${location.origin}/book/${id}/edit`,
            processData: false,
            contentType: false,
            data: formData,
            dataType: "json",
            beforeSend: function(){
                $('input, select, textarea').attr('disabled', 'disabled');
                $('button[type=submit]').html(spinner);
            },
            success: function (response) {
                $('input, select, textarea').removeAttr('disabled');
                $('button[type=submit]').html('Save Changes');
                $('#bookModal').modal('hide');

                if(response.message){
                    $('#toast-body').html('')
                    $('#toast-body').html(response.message)
                    $('#liveToast').removeClass('text-bg-danger');
                    $('#liveToast').addClass('text-bg-success');
                    const toast = $('#liveToast');
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
                    toastBootstrap.show()

                }
                fetchBooks();
            }
        });
    })
});