/**
 * Responsive videos
 *
 * Make iframe videos responsive on post/page content.
 */
class PolyFill {

	/**
	 * The constructor function.
	 *
	 * @since 1.3.5
	 */
	constructor() {

		this.objectFit();
		this.closest();
	}

	/**
	 * Object Fit polyfill.
	 * 
	 * @since 1.3.5
	 */
	objectFit() {

		let selectors = [
			'.entry-thumbnail',
			'.dp-thumbnail',
			'.gallery-icon a',
			'.header-image',
			'.has-featured-img .thumb-wrapper'
		];

		if (false === 'objectFit' in document.documentElement.style) {
			const elems = document.querySelectorAll(selectors.join(','));
			const elemsArr = Array.prototype.slice.call(elems);
			elemsArr.forEach(elem => {
				const image  = elem.getElementsByTagName('img');
				const imgsrc = image.length ? image[0].src : '';
				if (!imgsrc) return;
				image[0].style.visibility     = 'hidden';
				elem.style.backgroundImage = 'url(' + imgsrc + ')';
				elem.style.backgroundSize  = 'cover';
				
				// Position for display posts will be handled by css.
				if (! elem.classList.contains('dp-thumbnail')) {
					elem.style.backgroundPosition = 'center center';
				}
			});
		}
	}

	/**
	 * closest polyfill.
	 * 
	 * @since 1.3.5
	 */
	closest() {
		if (!Element.prototype.matches) {
			Element.prototype.matches = Element.prototype.msMatchesSelector || 
										Element.prototype.webkitMatchesSelector;
		}
		
		if (!Element.prototype.closest) {
			Element.prototype.closest = function(s) {
				var el = this;
		  
				do {
					if (el.matches(s)) return el;
					el = el.parentElement || el.parentNode;
				} while (el !== null && el.nodeType === 1);
				return null;
			};
		}
	}
}

export default PolyFill;