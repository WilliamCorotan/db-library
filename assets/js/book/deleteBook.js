$(document).ready(function () {
    $(document).on('click', '#delete-book-btn',function(){
        console.log('clickkk')
        $.ajax({
            type: "post",
            url: `${location.origin}/book/${$(this).attr('data-book-id')}/delete`,
            dataType: "json",
            success: function (response) {
                console.log(response)
                $('#bookModal').modal('hide');
                fetchBooks();
            }
        });
    })
});