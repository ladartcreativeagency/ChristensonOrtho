
jQuery(document).ready(function($) {


	// invoke 300ms click delay polyfill
	// -- NOTE: Ignore certain elements by adding a class of "needsclick" on link elements
	$(function() {
    FastClick.attach(document.body);
	});
	//console.log("fastclick works");







	// CALL INIT
	init();

  // call all custom functions
  function init() {
		svgeezy.init(false, 'png'); // don't forget to generate pngs from svgs for production

      webformEnhancements();
		mainNav();

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

  //@codekit-append "webformEnhancements";
  //@codekit-append "mainNav.js";
  //@codekit-append "exampleScript.js";
  //@codekit-append "buttonAnimations.js";














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
