function fetchUser(pageNumber = 1){
    const actions =  function(userType){ return (`
<div class="text-center">
    <span class="edit-${userType} h-100"> <i class="fa-solid fa-pencil fa-md"></i> </span>      
</div>
`)}
    let search = ($('#user-search').val())? $('#user-search').val() : null;
    $(document).ready(function () {
        $.ajax({
            type: "get",
            url: `http://localhost/admin/fetch/users/${pageNumber}/${search}`,
            dataType: "json",
            beforeSend: function(){
                $('tbody').children().remove();
                $('.table-responsive').append(`
                <div class="spinner-container d-block text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                `);
                $('#pagination').remove();

            },
            success: function (response) {
                $('.spinner-container').remove();
                response.data.forEach(element => {
                    $('tbody').append(`
                    <tr> 
                        <td>${element.id}</td>
                        <td>${element.last_name}</td>
                        <td>${element.first_name}</td> 
                        <td>${element.email}</td>
                        <td>${actions('user')} </td>
                    </tr>
                    `)
                });


                //!-------- Pagination Configuration ----------!//
                if(response.total_pages != 1){
                    // Appending pagination container
                    $('.table-responsive').append(`
                    <nav id="pagination" aria-label="Pagination">
                        <ul class="pagination justify-content-end">
                            
                        </ul>
                    </nav>`)
    
                    // Appending pagination page items
                    for(i = 1; i <= response.total_pages; i++){
                        // Checks for current page
                        if(response.current_page == i){
                            $('.pagination').append(`
                            <li class="page-item active" aria-current="page" >
                                <a type="button" data-page-number="${i}" class="page-link">${i}</a>
                            </li>
                            `)    
                        }
                        else{
                            $('.pagination').append(`
                                <li class="page-item" data-page-number="${i}">
                                    <a  type="button" data-page-number="${i}" class="page-link">${i}</a>
                                </li>
                                `)
                        }
                    }
    
                    // Appending prev page button
                    $('.pagination').prepend(`
                    <li class="page-item ${(response.prev_page == null) ? "disabled" : ""}">
                    <a type="button" class="page-link"  data-page-number="${response.prev_page}"  aria-label="Next">
                    <span aria-hidden="true">&lsaquo;</span>
                    </a>
                    </li>
                    `)
                    
                    // Appending next page button
                    $('.pagination').append(`
                    <li class="page-item ${(response.next_page == null) ? "disabled" : ""}">
                        <a type="button" class="page-link" data-page-number="${response.next_page}"  aria-label="Next">
                        <span aria-hidden="true">&rsaquo;</span>
                        </a>
                    </li>
                    `)
                    
                    // Appending first page button
                    $('.pagination').prepend(`
                    <li class="page-item ${(response.first_page == response.current_page) ? "disabled" : ""}">
                        <a type="button" class="page-link" data-page-number="${response.first_page}"  aria-label="Next">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    `)
                    
                    // Appending last page button
                    $('.pagination').append(`
                    <li class="page-item ${(response.last_page == response.current_page) ? "disabled" : ""}">
                        <a type="button" class="page-link" data-page-number="${response.last_page}"  aria-label="Last">
                        <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    `)
                        // Onclick Events 
                    $('.pagination').on('click', '.page-link', function(){
                        fetchUser($(this).attr('data-page-number'))
                    })
                }
            }
        });
    });
}