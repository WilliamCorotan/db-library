$(document).ready(function () {

    $(document).on('click', '.book-card', function(){
        console.log($(this))
        location.href = `${location.origin}/collections/book/${$(this).attr('data-book-id')}`
    })

    $(document).on('mouseover', '.book-card', function(){
        $(this).css('cursor', 'pointer');
    })

    $(window).on('scroll', function(event){
        let totalBooks = $('#total-books').val()
        let limit = $('#limit').val()
        let pageNumber = $('#page-number').val() + 1
        if((limit * pageNumber) <= totalBooks ){
            if($(window).scrollTop() == $(document).height() - $(window).height()){
                console.log('refreshhhhh');
                pageNumber = parseInt($('#page-number').val()) + 1
                fetchBookCard(pageNumber)
            }
        }
    })
});     