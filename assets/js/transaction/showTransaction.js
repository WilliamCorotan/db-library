$(document).on('click', '.transaction-row', function(){

    $.ajax({
        type: "get",
        url: `${location.origin}/transaction/${$(this).attr('data-transaction-id')}`,
        dataType: "json",
        success: function (response) {

            console.log(response)
            $('#edit-id').val(response.data.id);
            $('#edit-book-id').val(response.data.book_id);
            $('#edit-title').val(response.data.book_title);
            $('#edit-borrow_date').val(response.data.borrow_date)
            $('#edit-return_date').val(response.data.return_date)
            $('#edit-first_name').val(response.data.first_name)
            $('#edit-last_name').val(response.data.last_name)
            $('#edit-contact_number').val(response.data.contact_number)
            $('#edit-return_status').val(response.data.return_status)

            // $('#delete-book-btn').attr('data-book-id', response.data.id)
            $('#transactionModal').modal('show')
        }
    });
})