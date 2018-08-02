/**
 * Defer loading embedded videos.
 */

function aamlaDeferLoadingVideos() {
	var container = document.getElementsByClassName( 'entry-featured-media' ),
		videoFrame, src, i = 0;
	
	for ( ; i < container.length; i++ ) {
		videoFrame = container[i].getElementsByTagName( 'iframe' )[0];
		if ( videoFrame ) {
			src = videoFrame.getAttribute( 'data-src' );
			if ( src ) {
				videoFrame.setAttribute( 'src', src );
			}
		}
	}
}
window.onload = aamlaDeferLoadingVideos;
