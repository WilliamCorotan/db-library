$(document).ready(function () {
    $(document).on('click', '.pagination li span a  ', function(event){
        event.preventDefault();
        console.log($(this).attr('data-ci-pagination-page'))
        fetchBooks($(this).attr('href'))
    })

    $(document).on('mouseover', 'td',function(){
        $(this).css('cursor', 'pointer');
    })
});