$(document).ready(function () {
    $('#edit-book-form').on('submit', function(event){
        event.preventDefault();
        const id = $('#edit-id').val();

        const formData = new FormData();

        
        $.ajax({
            type: "post",
            url: `${location.origin}/book/${id}/edit`,
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                console.log(response)
            }
        });
    })
});