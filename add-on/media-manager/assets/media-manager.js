/**
 * Handle toggling media on archive pages.
 */
function aamlaMediaManager() {
	var open, close,
		elems = document.getElementsByClassName( 'entry-featured-media' ),
		length = elems.length,
		i = 0;
	
	for ( ; i < length; ++i ) {
		open = elems[i].parentElement.getElementsByClassName( 'post-permalink' )[0];
		if ( undefined === open ) {
			continue;
		}
		
		open.addEventListener( 'click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			toggleMedia.bind(this)();
		}.bind(elems[i]), false );
		
		close = elems[i].getElementsByClassName( 'close-media' )[0];
		close.addEventListener( 'click', toggleMedia.bind(elems[i]), false );
	}

	function toggleMedia() {
		var videoWrapper, audioWrapper, videoFrame, audioFrame, video, audio, src, thumb, bg;

		this.classList.toggle( 'makeitvisible' );

		videoWrapper = this.getElementsByClassName( 'entry-video' )[0];
		if ( videoWrapper ) {
			videoFrame = videoWrapper.getElementsByTagName( 'iframe')[0];
			if ( videoFrame ) {
				if ( this.classList.contains( 'makeitvisible' ) ) {
					if ( ! videoFrame.hasAttribute( 'src' ) ) {
						src = videoFrame.getAttribute( 'data-src' );
						if ( src ) {
							videoFrame.setAttribute( 'src', src );
						}
					}
				} else {
					video = videoFrame.getElementsByTagName( 'video' )[0];
					src   = videoFrame.getAttribute( 'src' );
					if ( src ) {
						videoFrame.setAttribute( 'src', src );
					}
					if ( video ) {
						video.pause();
					}
				}
				return;
			}
		}

		audioWrapper = this.getElementsByClassName( 'entry-audio' )[0];
		if ( audioWrapper ) {
			if ( ! audioWrapper.classList.contains( 'bg-img' ) ) {
				thumb = this.parentNode.getElementsByClassName( 'entry-thumbnail' )[0] || this.parentNode.getElementsByClassName( 'dp-thumbnail' )[0];
				bg = thumb ? thumb.getElementsByTagName( 'img' )[0].src : false;
				if ( bg ) {
					audioWrapper.style.backgroundSize = 'cover';
					audioWrapper.style.backgroundImage = 'url(' + bg + ')';
					audioWrapper.style.backgroundPosition = 'center center';
					audioWrapper.classList.add( 'bg-img' );
				}
			}
			if ( ! this.classList.contains( 'makeitvisible' ) ) {
				audio = audioWrapper.getElementsByTagName( 'audio' )[0];
				if ( audio ) {
					audio.pause();
				}
			}
			return;
		}

		audioWrapper = this.getElementsByClassName( 'entry-iaudio' )[0];
		if ( audioWrapper ) {
			audioFrame = audioWrapper.getElementsByTagName( 'iframe')[0];
			if ( audioFrame ) {
				if ( this.classList.contains( 'makeitvisible' ) ) {
					if ( ! audioFrame.hasAttribute( 'src' ) ) {
						src = audioFrame.getAttribute( 'data-src' );
						if ( src ) {
							audioFrame.setAttribute( 'src', src );
						}
					}
				} else {
					audio = audioWrapper.getElementsByTagName( 'audio' )[0];
					src   = audioFrame.getAttribute( 'src' );
					if ( src ) {
						audioFrame.setAttribute( 'src', src );
					}
					if ( video ) {
						video.pause();
					}
				}
				return;
			}
		}

		if ( this.classList.contains( 'makeitvisible' ) ) {
			return;
		}

		audioWrapper = this.getElementsByClassName( 'entry-playlist' )[0];
		if ( audioWrapper ) {
			audio = audioWrapper.getElementsByTagName( 'audio' )[0];
			if ( audio ) {
				audio.pause();
			}
			return;
		}
	}
}
window.onload = aamlaMediaManager;
