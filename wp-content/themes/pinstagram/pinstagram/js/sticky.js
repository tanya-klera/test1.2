jQuery(document).ready(function() {
	function isScrolledTo(elem) {
		var docViewTop = jQuery(window).scrollTop(); //num of pixels hidden above current screen
		var docViewBottom = docViewTop + jQuery(window).height();

		var elemTop = jQuery(elem).offset().top; //num of pixels above the elem
		var elemBottom = elemTop + jQuery(elem).height();

		return ((elemTop <= docViewTop));
	}

	var catcher = jQuery('#catcher');
	var sticky = jQuery('#sticky');
	
	jQuery(window).scroll(function() {
		if(isScrolledTo(sticky)) {
			sticky.css('position','fixed');
			sticky.css('top','0');
			jQuery('.main-container').css('margin-top','42px');
		} 
		var stopHeight = catcher.offset().top + catcher.height();
		if ( stopHeight > sticky.offset().top) {
			sticky.css('position','relative');
			sticky.css('top', 'auto');
		}
	});
});