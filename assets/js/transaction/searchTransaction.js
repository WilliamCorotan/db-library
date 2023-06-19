//setup before functions
let searchTimer;                //timer identifier

//on keyup, start the countdown
$('#transaction-search').on('keyup', function () {
  clearTimeout(searchTimer);
  searchTimer = setTimeout(doneTyping, 300);
});

//on keydown, clear the countdown 
$('#transaction-search').on('keydown', function () {
  clearTimeout(searchTimer);
});

//user is "finished typing," do something
function doneTyping () {
  //do something
  fetchTransactions(`${location.origin}/transaction/fetch/`,  $('#transaction-search').val())
}