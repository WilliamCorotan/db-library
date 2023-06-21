$(document).ready(function () {
    $('#return-btn').on('click', function(){

        $('#transactionModal').modal('hide');
        $('#return-book-prompt-modal').modal('show');
        $('#book-name').html($('#edit-title').val());
    })


    $('#return-book').on('click', function(){
        $.ajax({
            type: "post",
            url: `${location.origin}/transaction/return/book/${$('#edit-id').val()}`,
            data: {
                id: $('#edit-id').val(),
                book_id: $('#edit-book-id').val(),
                borrow_date: $('#edit-borrow_date').val(),
                return_date: $('#edit-return-date').val(),
                return_status_id: $('#edit-return_status_id').val()
            },
            dataType: "json",
            beforeSend: function(){
                $('#return-date-error').html('')
            },
            success: function (response) {
                if(response.form_errors){
                    $('#return-date-error').html(response.form_errors.return_date)
                }else{
                    $('#return-book-prompt-modal').modal('hide');
                    fetchTransactions();
                }
            }
        });
    })

    $('#cancel-book-return').on('click', function(){
        $('#return-book-prompt-modal').modal('hide');
        $('#transactionModal').modal('show');
    })
});