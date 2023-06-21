function fetchBookCard(pageNumber = 0){
    const bookCard = (data)=>{
        return (`
        <div class="card book-card" data-book-id="${data.id}">
                <div class="card-img-top overflow-hidden" style="height: 32rem;">
                <img src="${location.origin}/assets/images/books/${data.cover_image}" class="w-100 object-fit-cover h-100" alt="${data.title}">
                </div>
                <div class="card-body p-0 px-3 pt-2">
                  <h5 class="card-text fw-semibold">${data.title}</h5>
                  <p> ${data.author} </p>
                </div>
              </div>
        `)
    }
    
    $.ajax({
        type: "get",
        url: "api/book/fetch",
        data: {page_number: pageNumber},
        dataType: "json",
        success: function (response) {
            $('#page-number').val(response.page)
            $('#total-books').val(response.total_books)
            $('#limit').val(response.limit)
            response.books.forEach(element => {
                $('#book-card-container').append(bookCard(element))
            });
        }
    });
}

fetchBookCard()