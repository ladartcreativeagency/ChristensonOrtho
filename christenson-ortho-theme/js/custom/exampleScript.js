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


	$('.entry-content p')
	    .each(function() {
	    var $this = $(this);
	    if($this.html()
	    .replace(/\s| /g, '').length == 0)
	    $this.addClass('empty');
	});

} // end exampleScript(); 



