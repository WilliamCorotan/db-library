function fetchTransactions(url = `${location.origin}/transaction/fetch/`, search = null){
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
                $('#transaction-table-container').children().remove()
                $('#transaction-table-container').append(spinner)
            },
            success: function (response) {
                $('#transaction-table-container').children().remove()
                $('#transaction-table-container').append(response)
            }
        });
    });
    }
    
 fetchTransactions()