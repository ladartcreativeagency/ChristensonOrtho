/**
*
* This function does...
*
**/

function exampleScript() { 
	



	// add 'hovered' class to buttons on hover 
	$('.button').hover(function () {
	  $(this).toggleClass('hovered');
	});


	// any <a> element with a class of 'no-link' will have default action prevented
	$('a.no-link').click(function (e) {
  	e.preventDefault();
	});


} // end exampleScript(); 



