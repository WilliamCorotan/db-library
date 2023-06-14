$(document).ready(function () {
    $(document).on('click', '.pagination li span a  ', function(event){
        event.preventDefault();
        console.log($(this).attr('data-ci-pagination-page'))
        fetchBooks($(this).attr('href'))
    })

    $(document).on('mouseover', 'td',function(){
        $(this).css('cursor', 'pointer');
    })

    if(sessionStorage.getItem('message')){
        const message = sessionStorage.getItem('message')
        $('#toast-body').html('')
        $('#toast-body').html(message)
        $('#liveToast').removeClass('text-bg-danger');
        $('#liveToast').addClass('text-bg-success');
        const toast = $('#liveToast');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
        toastBootstrap.show()

        sessionStorage.removeItem('message')
    }
});