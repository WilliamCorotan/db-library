function fetchBooks(url = `${location.origin}/book/fetch/`){
    const spinner = `
    <div class="text-center">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>`;
    $(document).ready(function () {
        $.ajax({
            type: "get",
            url: url,
            dataType: "html",
            beforeSend: function(){
                $('#book-table-container').children().remove()
                $('#book-table-container').append(spinner)
            },
            success: function (response) {
                $('#book-table-container').children().remove()
                $('#book-table-container').append(response)
            }
        });
    });
    }
    
    fetchBooks()