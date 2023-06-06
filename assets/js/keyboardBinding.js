document.onkeyup = function (event) {
    if(event.ctrlKey && (event.key == 'q' || event.key == 'A')){
        if($('#add-admin-modal').is(':visible')){
            $('#add-admin-modal').modal('hide');
        }
        else{
            $('#add-admin-modal').modal('show');
        }
    }
}