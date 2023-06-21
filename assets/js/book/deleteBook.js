$(document).ready(function () {

    $('#delete-book-modal-btn').on('click', function(){
        $('#book-name').html($('#title').val())
        $('#bookModal').modal('hide');
        $('#delete-book').modal('show');
    })

    $(document).on('click', '#delete-book',function(){
        $.ajax({
            type: "post",
            url: `${location.origin}/book/${$('#edit-id').val()}/delete`,
            dataType: "json",
            success: function (response) {
                $('#delete-book').modal('hide');
                if(response.message){
                    $('#toast-body').html('')
                    $('#toast-body').html(response.message)
                    $('#liveToast').removeClass('text-bg-success');
                    $('#liveToast').addClass('text-bg-danger');
                    const toast = $('#liveToast');
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
                    toastBootstrap.show()

                }
                fetchBooks();
            }
        });
    })

    $('#cancel-book-delete').on('click', function(){
        $('#delete-book').modal('hide');
        $('#bookModal').modal('show');
    })
});