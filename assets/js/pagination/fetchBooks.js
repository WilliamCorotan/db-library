function fetchBooks(url = `${location.origin}/book/fetch/`, search = null){
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
            data: {
                search
            },
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