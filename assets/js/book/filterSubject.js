//setup before functions

let $subjectInput = $('#subject');

const subjectHint = (el)=>{
     return (`<a type="button" data-subject-id="${el.id}" class="list-group-item subject-filter" aria-describedby="authorFilter">${el.name}</a>`)
};
//on keyup, start the countdown
$subjectInput.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTypingSubject, doneTypingInterval);
});

//on keydown, clear the countdown 
$subjectInput.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTypingSubject () {
  //do something
  $('#subject').removeAttr('data-subject-id');
  
  if(!$('#subject').val()){
    $('#subject-hint').children().remove();
    return
  }
  $.ajax({
    type: "get",
    url: `${location.origin}/filter/subject`,
    data: {input: $subjectInput.val()},
    dataType: "json",
    beforeSend: function(){
        $('#subject-hint').html(spinner)
        $('#subject-hint').removeClass('d-none')
    },
    success: function (response) {
        $('#subject-hint').children().remove();
        response.forEach(element => {
            $('#subject-hint').append(subjectHint(element));
        });
    }
  });
}

$(document).on('click', '.subject-filter', function(){
    $('#subject').val($(this).html());
    $('#subject').attr('data-subject-id',$(this).attr('data-subject-id'));
    $('#subject-hint').children().remove();
})