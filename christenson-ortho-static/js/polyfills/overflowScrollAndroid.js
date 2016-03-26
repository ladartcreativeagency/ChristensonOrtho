// ***************************************************************
// *** Enables support for overflow: scroll; or overscroll: auto; on older Android browsers ***
// MORE INFO:
// Article - http://chris-barr.com/2010/05/scrolling_a_overflowauto_element_on_a_touch_screen_device/
// Github - https://github.com/chrismbarr/TouchScroll
// ***************************************************************

(function(){
	function isTouchDevice(){
		try{
			document.createEvent("TouchEvent");
			return true;
		}catch(e){
			return false;
		}
	}

	function touchScroll(id){
		if(isTouchDevice()){ //if touch events exist...
			var el=document.getElementById(id);
			var scrollStartPos=0;

			document.getElementById(id).addEventListener("touchstart", function(event) {
				scrollStartPos=this.scrollTop+event.touches[0].pageY;
				event.preventDefault();
			},false);

			document.getElementById(id).addEventListener("touchmove", function(event) {
				this.scrollTop=scrollStartPos-event.touches[0].pageY;
				event.preventDefault();
			},false);
		}
	}

	// On page load
	// change 'scrollMe' to ID of div that has overflow set to scroll
	touchScroll('scrollMe')

})();
/*-----  End of Overflow Scroll for Android Devices Polyfill  ------*/

