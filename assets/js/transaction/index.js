$(document).ready(function () {
    $(document).on('click', '.pagination li span a  ', function(event){
        event.preventDefault();
        fetchTransactions($(this).attr('href'))
    })

    $(document).on('mouseover', 'td',function(){
        $(this).css('cursor', 'pointer');
    })  
});