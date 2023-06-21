$(document).on('click', '.book-row', function(){

    $.ajax({
        type: "get",
        url: `${location.origin}/book/${$(this).attr('data-book-id')}`,
        dataType: "json",
        success: function (response) {
            $('#id').html(`Book ID: ${response.data.id}`)
            $('#cover_image').attr('src',`${location.origin}/assets/images/books/${response.data.cover_image}`)
            $('#edit-cover_image').attr('data-cover-image', response.data.cover_image)
            $('#edit-id').val(response.data.id)
            $('#title').val(response.data.title)
            $('#description').val(response.data.description)
            $('#borrow_status').val(response.data.borrow_status_id)

            $('#author').val(response.data.author)
            $('#author').attr('data-author-id',response.data.author_id)
            
            $('#subject').val(response.data.subject)
            $('#subject').attr('data-subject-id',response.data.subject_id)

            $('#publisher').val(response.data.publisher)
            $('#publisher').attr('data-publisher-id',response.data.publisher_id)

            $('#call_number').val(response.data.call_number)
            $('#publish_date').val(response.data.publish_date)

            $('#delete-book-btn').attr('data-book-id', response.data.id)
            $('#bookModal').modal('show')
        }
    });
})