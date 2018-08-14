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
		var modal, video, audioWrapper, audioFrame, audio, src, thumb, bg,
			videoSelectors = [
				'iframe[data-src*="youtube.com"]',
				'iframe[data-src*="vimeo.com"]',
				'iframe[data-src*="dailymotion.com"]',
				'iframe[data-src*="videopress.com"]',
				'video'
			];

		this.classList.toggle( 'makeitvisible' );

		modal = this.getElementsByClassName( 'entry-video' )[0];
		if ( modal ) {
			video = modal.querySelector( videoSelectors.join( ',' ) );

			if ( this.classList.contains( 'makeitvisible' ) ) {

				// If an HTML5 video, play it
				if ( video && video.tagName.toLowerCase() === 'video' ) {
					video.play();
					return;
				}

				// Create ifrmae src attribute from data-src attribute.
				if ( video && ! video.src ) {
					src = video.getAttribute( 'data-src' );
					// Remove any autoplay instructions already present in dataset.
					src = src.replace('&autoplay=1', '').replace('?autoplay=1', '').replace('&autoplay=0', '').replace('?autoplay=0', '').replace('?autoPlay=1', '').replace('&autoPlay=1', '');

					// Create video src attribute.
					video.src = src ? src + ( src.indexOf('?') < 0 ? '?' : '&') + 'autoplay=1': '';
					return;
				} else if ( video ) {
					// Add autoplay instruction to src attribute.
					video.src = video.src + ( video.src.indexOf('?') < 0 ? '?' : '&') + 'autoplay=1';
					return;
				}

				// Let's check if modal have other iframe videos.
				video = modal.getElementsByTagName( 'iframe')[0];
				if ( video && ! video.hasAttribute( 'src' ) ) {
					src = video.getAttribute( 'data-src' );
					if ( src ) {
						video.setAttribute( 'src', src );
					}
				}
			} else {
				// If an HTML5 video, pause it
				if ( video && video.tagName.toLowerCase() === 'video' ) {
					video.pause();
					return;
				}

				// Remove autoplay from video src
				if ( video ) {
					video.src = video.src.replace('&autoplay=1', '').replace('?autoplay=1', '');
					return;
				}

				video = modal.getElementsByTagName( 'iframe')[0];
				src = video.getAttribute( 'src' );
				if ( src ) {
					video.setAttribute( 'src', src );
				}
			}
			return;
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
					src = audioFrame.getAttribute( 'src' );
					if ( src ) {
						audioFrame.setAttribute( 'src', src );
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
