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
                console.log(response)
                fetchBooks();
            }
        });
    })

    $('#cancel-book-delete').on('click', function(){
        $('#delete-book').modal('hide');
        $('#bookModal').modal('show');
    })
});