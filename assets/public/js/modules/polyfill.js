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
			const elemsArr = Array.from(elems);
			elemsArr.forEach(elem => {
				const image  = elem.getElementsByTagName('img');
				const imgsrc = image.length ? image[0].src : '';
				if (!imgsrc) return;
				image.style.visibility     = 'hidden';
				elem.style.backgroundImage = 'url(' + imgsrc + ')';
				elem.style.backgroundSize  = 'cover';
				
				// Position for display posts will be handled by css.
				if (! elem.classList.contains('dp-thumbnail')) {
					elem.style.backgroundPosition = 'center center';
				}
			});
		}
	}
}

export default PolyFill;