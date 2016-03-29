// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

/*----------  NOTES  ----------*/
    // "ssm.min.js" // see http://www.simplestatemanager.com/api.html; 4kb solution
    // "classList.min.js"; // see https://developer.mozilla.org/en-US/docs/Web/API/Element/classList
/*----------  NOTES  ----------*/


	//@codekit-append "svgeezy.min.js";
    //@codekit-append "picturefill.min.js";
    //@codekit-append "fastclick.js";
    //@codekit-append "matchMedia.js";
    //@codekit-append "matchMedia.addListener.js";
    //@codekit-append "ssm.min.js";

    //@codekit-append "pace.min.js";

    //@codekit-append "jquery.slimmenu.js";

    //@codekit-append "jquery.placeholder.js";
    //@codekit-append "jquery.selectric.js";
    //@codekit-append "icheck.min.js";
    //@codekit-append "bootstrap.file-input.js";
	//@codekit-append "greensock/TweenMax.min.js";
	//@codekit-append "modals.min.js";
	//@codekit-append "tabby.min.js";
