/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( 'h1.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( 'h2.site-description' ).text( to );
		} );
	} );
	

	wp.customize( 'agency-x-primary-color-setting', function( value ) {
		value.bind( function( to ) {
			$( '.pri-color-bg, .btn-danger' ).css( {
				'background': to
			} );
			$( '.pri-color, a' ).css({
				'color': to
			});
		} );
	} );

	wp.customize( 'agency-x-secondary-color-setting', function( value ) {
		value.bind( function( to ) {
			$( '.sec-color-bg, .theme-slider, .widget-main' ).css( {
				'background': to
			} );
		} );
	} );

} )( jQuery );


jQuery(document).ready(function($){
$('textarea[name="footer_content"]').attr('data-customize-setting-link','footer_content');

setTimeout(function(){

var editor2 = tinyMCE.get('footer_content');


if(editor2){
editor2.onChange.add(function (ed, e) {
// Update HTML view textarea (that is the one used to send the data to server).

ed.save();

$('textarea[name="footer_content"]').trigger('change');
});
}
},1000);
})
