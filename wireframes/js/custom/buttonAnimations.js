/**
*
* This function makes buttons much more fancy - this is just a start
*
**/



// adding SVG into DOM
function injectSVG(){

  var baseSVG = '<svg class="linkIndicatorWhite" xmlns="http://www.w3.org/2000/svg" width="20.5" height="16.9" viewBox="0 0 20.5 16.9"><circle class="circWhite" cx="8.5" cy="8.5" r="8"/><circle class="dotWhite" cx="16.5" cy="8.5" r="4"/></svg>';
  $("a.linkIndicatorBtn").append(baseSVG);

} // end injectSVG();




// animating SVG that was added to DOM
function linkIndicatorBtnAnim(){

	var $svgElement = $(".linkIndicatorWhite .dotWhite");
	var $fancyBtn = $("a.linkIndicatorBtn");

	// Move dot back to orig place
	$fancyBtn.on('mouseenter', function (event) {
	  $svgElement = $(this).find('.dotWhite');
	  TweenMax.to($svgElement, .13, { x: -8, transformOrigin: 'center center', ease: Power1.easeOut }); // transform: translateY(0) scale(1);
	});

	// Move dot to center of circle
	$fancyBtn.on('mouseleave', function (event) {
	  $svgElement = $(this).find('.dotWhite');
	  TweenMax.to($svgElement, .13, { x: 0, transformOrigin: 'center center', ease: Power1.easeOut }); //  transform: translate(100%,-100%) scale(0.5);
	});

} // end linkIndicatorBtnAnim();
