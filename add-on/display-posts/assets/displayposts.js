/**
 * Make embedded videos responsive.
 * 
 * Identify video iframes in main content and wrap them in a div containing 'video-container'
 * class. Now make it responsive using css.
 */

(function() {
	var wrapper, elem, frames, length, flength,
		bin = document.getElementsByClassName( 'dp-content' ),
		selectors = [
			'iframe[src*="youtube.com"]',
			'iframe[src*="vimeo.com"]',
			'iframe[src*="videopress.com"]'
		],
		i = 0,
		j = 0;

	length = bin.length;
	for ( ; j < length; j++ ) {
		frames  = bin[j].querySelectorAll(selectors.join(','));
		flength = frames.length;

		for( ; i < flength; i++ ) {
			elem = frames[i];
			wrapper = document.createElement('div');
			wrapper.className = 'video-container';
			elem.parentNode.insertBefore(wrapper, elem);
			wrapper.appendChild(elem);
		}
	}
}());
