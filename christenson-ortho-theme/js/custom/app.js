
jQuery(document).ready(function($) {

	// SVGeezy SHOULD BE FIRST THING CALLED!
	// MAY NEED TO BE ADDED TO INIT???
	// don't forget to generate pngs from svgs for production
	svgeezy.init(false, 'png');

	// 300ms click delay polyfill
	// NOTE: Ignore certain elements by adding a class of "needsclick" on link elements
	$(function() {
    FastClick.attach(document.body);
	});
	//console.log("fastclick works");

	// Placeholder polyfill init
	$('input, textarea').placeholder();


	// iCheck Custom Checkboxes and Radios Init
 	$('input.fancy').iCheck({
    checkboxClass: 'icheckbox_square-grey',
    radioClass: 'iradio_square-grey',
    increaseArea: '0%' // optional
  });








	// CALL INIT
	init();

  // call all custom functions
  function init() {
      modals.init({
				modalActiveClass: 'active',
				modalBGClass: 'modal-bg',
				backspaceClose: true,
				callbackBeforeOpen: function () {},
				callbackAfterOpen: function () {},
				callbackBeforeClose: function () {},
				callbackAfterClose: function () {}
			});
			tabby.init({
			    selector: '[data-tab]', // Tab toggle selector
			    toggleActiveClass: 'active', // Class added to active toggle elements
			    contentActiveClass: 'active', // Class added to active tab content areas
			    initClass: 'js-tabby', // Class added to <html> element when initiated
			    callback: function ( toggle, tabID ) {} // Function that's run after tab content is toggled
			});  
      exampleScript();
      injectSVG();
  		linkIndicatorBtnAnim();
  }


  //@codekit-append "buttonAnimations.js";
  //@codekit-append "exampleScript.js";





    








 	// Simple State manager breakpoint testing
	ssm.addStates([
	{
	    id: 'mobile',
	    query: '(max-width: 767px)',
	    onEnter: function(){
	        console.log('enter mobile');
	    }
	},
	{
	    id: 'tablet',
	    query: '(min-width: 768px) and (max-width: 1023px)',
	    onEnter: function(){
	        console.log('enter tablet');
	    }
	},
	{
	    id: 'desktop',
	    uery: '(min-width: 1024px)',
	    onEnter: function(){
	        console.log('enter desktop'); 
	    }
	}
	]);








}); // END jQuery(document).ready(function($)
