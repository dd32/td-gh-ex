function wooCartToggle() {
	var elem = document.getElementById( 'wc-cart-widget' ),
		toggle = elem ? elem.parentElement.getElementsByClassName( 'wc-cart-toggle' )[0] : null;
	if ( toggle ) {
		toggle.addEventListener( 'click', function(e) {
			elem.classList.toggle( 'makeitvisible' );
			toggle.classList.toggle( 'toggled-btn' );
			toggle.setAttribute( 'aria-expanded', elem.classList.contains( 'makeitvisible' ) );
		}, false );
		document.documentElement.addEventListener( 'click', function(e) {
			if ( ! e.target.closest( '#wc-cart-widget' ) && ! e.target.closest( '.wc-cart-toggle' ) ) {
				elem.classList.remove( 'makeitvisible' );
				toggle.classList.remove( 'toggled-btn' );
				toggle.setAttribute( 'aria-expanded', false );
			}
		}, false );
	}
}
wooCartToggle();
