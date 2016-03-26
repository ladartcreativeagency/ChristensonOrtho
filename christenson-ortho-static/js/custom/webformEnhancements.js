/**
*
* This function enhances a variety of form elements
*
**/

function webformEnhancements() { 
	
 
	// Placeholder polyfill init
	$('input, textarea').placeholder();


	// Custom fancy select input
	$('select').selectric({
  	disableOnMobile: false,
  	// arrowButtonMarkup: '&lt;b class=&quot;button&quot;&gt;&amp;#x25be;&lt;/b&gt;',
  	responsive: true
	});


  // Custom File upload input
	$('input[type=file]').bootstrapFileInput();


  // Append .fancy class to checkbox inputs
	$('input[type=checkbox]').addClass("fancy");
	$('input[type=radio]').addClass("fancy");


	// iCheck Custom Checkboxes and Radios Init
 	$('input.fancy').iCheck({
    checkboxClass: 'icheckbox_square-grey',
    radioClass: 'iradio_square-grey',
    increaseArea: '0%' // optional
  });
 


} // end webformEnhancements(); 



