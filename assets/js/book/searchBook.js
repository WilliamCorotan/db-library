//setup before functions
let typingTimer;                //timer identifier
let doneTypingInterval = 300;  //time in ms, 5 second for example
let $input = $('#book-search');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {
  //do something
  fetchBooks(`${location.origin}/book/fetch/`,  $('#book-search').val())
}