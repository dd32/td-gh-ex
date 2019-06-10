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
			container = document.querySelectorAll(selectors.join(','));
			for (i = 0; i < container.length; i++) {
				imageSource = container[i].querySelector('img').src;
				container[i].querySelector('img').style.visibility = 'hidden';
				container[i].style.backgroundSize = 'cover';
				container[i].style.backgroundImage = 'url(' + imageSource + ')';
				container[i].style.backgroundPosition = 'center center';
			}
		}
	}
}

export default PolyFill;