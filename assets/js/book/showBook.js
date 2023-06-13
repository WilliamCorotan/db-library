$(document).on('click', '.book-row', function(){

    $.ajax({
        type: "get",
        url: `${location.origin}/book/${$(this).attr('data-book-id')}`,
        dataType: "json",
        success: function (response) {

            console.log(response)
            $('#id').html(`Book ID: ${response.data.id}`)
            $('#cover_image').attr('src',`${location.origin}/assets/images/books/${response.data.cover_image}`)
            $('#edit-id').val(response.data.id)
            $('#title').val(response.data.title)
            $('#description').val(response.data.description)
            $('#borrow_status').val(response.data.borrow_status_id)
            $('#author').val(response.data.author)
            $('#subject').val(response.data.subject)
            $('#call_number').val(response.data.call_number)
            $('#publisher').val(response.data.publisher)
            $('#publish_date').val(response.data.publish_date)
            $('#bookModal').modal('show')
        }
    });
})