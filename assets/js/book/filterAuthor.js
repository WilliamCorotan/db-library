//setup before functions
let typingTimer;                //timer identifier
let doneTypingInterval = 300;  //time in ms, 5 second for example

const hint = (el)=>{
     return (`<a type="button" data-author-id="${el.id}" class="list-group-item author-filter" aria-describedby="authorFilter">${el.name}</a>`)
};
const spinner = `
<div class="list-group-item text-center">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>`;

console.log('test fa')
console.log($('#author'))
//on keyup, start the countdown
$('#author').on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doeTypingAuthor, doneTypingInterval);
  console.log('keyup')
});

//on keydown, clear the countdown 
$('#author').on('keydown', function () {
  clearTimeout(typingTimer);
  console.log('keydown')
});

//user is "finished typing," do something
function doeTypingAuthor () {
  //do something
  $('#author').removeAttr('data-author-id');
  
  if(!$('#author').val()){
    $('#author-hint').children().remove();
    return
  }
  console.log('test')
  $.ajax({
    type: "get",
    url: `${location.origin}/filter/author`,
    data: {input: $('#author').val()},
    dataType: "json",
    beforeSend: function(){
        $('#author-hint').html(spinner)
        $('#author-hint').removeClass('d-none')
    },
    success: function (response) {
      console.log('response')
        $('#author-hint').children().remove();
        response.forEach(element => {
            $('#author-hint').append(hint(element));
        });
        console.log(response)
    }
  });
}

$(document).on('click', '.author-filter', function(){
    $('#author').val($(this).html());
    $('#author').attr('data-author-id',$(this).attr('data-author-id'));
    $('#author-hint').children().remove();
    console.log($(this).html())
})