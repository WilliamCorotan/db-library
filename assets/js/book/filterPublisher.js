//setup before functions

let $publisherInput = $('#publisher');

const publisherHint = (el)=>{
     return (`<a type="button" data-publisher-id="${el.id}" class="list-group-item publisher-filter" aria-describedby="authorFilter">${el.name}</a>`)
};
//on keyup, start the countdown
$publisherInput.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTypingPublisher, doneTypingInterval);
});

//on keydown, clear the countdown 
$publisherInput.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTypingPublisher () {
  //do something
  $('#publisher').removeAttr('data-publisher-id');
  
  if(!$('#publisher').val()){
    $('#publisher-hint').children().remove();
    return
  }
  $.ajax({
    type: "get",
    url: `${location.origin}/filter/publisher`,
    data: {input: $publisherInput.val()},
    dataType: "json",
    beforeSend: function(){
        $('#publisher-hint').html(spinner)
        $('#publisher-hint').removeClass('d-none')
    },
    success: function (response) {
        $('#publisher-hint').children().remove();
        response.forEach(element => {
            $('#publisher-hint').append(publisherHint(element));
        });
        console.log(response)
    }
  });
}

$(document).on('click', '.publisher-filter', function(){
    $('#publisher').val($(this).html());
    $('#publisher').attr('data-publisher-id',$(this).attr('data-publisher-id'));
    $('#publisher-hint').children().remove();
    console.log($(this).html())
})