$(document).ready(function () {
    $('#borrow-btn').on('click', function(){
        console.log('borrooww!')
        $('#borrow-book-modal').modal('show')
    })

    $('#borrow-book').on('click', function(){
        console.log('me borrowww!!!')
    })
});