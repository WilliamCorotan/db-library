//setup before functions
let searchTimer;                //timer identifier

//on keyup, start the countdown
$('#book-search').on('keyup', function () {
  clearTimeout(searchTimer);
  searchTimer = setTimeout(doneTyping, 300);
});

//on keydown, clear the countdown 
$('#book-search').on('keydown', function () {
  clearTimeout(searchTimer);
});

//user is "finished typing," do something
function doneTyping () {
  //do something
  fetchBooks(`${location.origin}/book/fetch/`,  $('#book-search').val())
}