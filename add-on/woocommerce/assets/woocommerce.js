function wooCartToggle() {
	var elem = document.getElementById( 'wc-cart-widget' ),
		toggle = elem ? elem.parentElement.getElementsByClassName( 'wc-cart-toggle' )[0] : null;
	if ( toggle ) {
		toggle.addEventListener( 'click', function(e) {
			elem.classList.toggle( 'makeitvisible' );
		}, false );
		document.documentElement.addEventListener( 'click', function(e) {
			if ( ! e.target.closest( '#wc-cart-widget' ) && ! e.target.closest( '.wc-cart-toggle' ) ) {
				elem.classList.remove( 'makeitvisible' );
			}
		}, false );
	}
}
wooCartToggle();
