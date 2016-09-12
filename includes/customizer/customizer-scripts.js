
// Scripts for the theme customizer

var $str = jQuery.noConflict();

$str(document).ready(function() {
	
	
	// Add theme links
	var links = ' \
		<li class="accordion-section customizer-bento-extras"> \
			<div class="bnt-section-helper-top-margin"> \
			</div> \
	';
	if ( bntCustomizerVars.license_status != 'valid' ) {
		links += ' \
			<a class="bnt-customizer-link bnt-extra-link bnt-extra-link-first bnt-extra-link-ep" href="http://satoristudio.net/bento-free-wordpress-theme/#expansion-pack" target="_blank"> \
				<span class="dashicons dashicons-carrot"> \
				</span>'
				+bntCustomizerVars.exp+
			'</a>';
	}
	links += ' \
			<a class="bnt-customizer-link bnt-extra-link bnt-extra-link-last bnt-extra-link-rate" href="https://wordpress.org/support/theme/bento/reviews/?filter=5#new-post" target="_blank"> \
				<span class="dashicons dashicons-heart"> \
				</span>'
				+bntCustomizerVars.review+
			'</a> \
		</li>';
	$str('#customize-theme-controls > ul').prepend(links);
	
	
	// Control visibility logic
	
	function bntWebsiteLayout() {
		var $parent = $str( '#customize-control-bnt_website_layout select' );
		var $child = $str( '#customize-control-bnt_website_background' );
		if ( $parent.attr('value') == 1 ) {
			$child.show();
		} else {
			$child.hide();
		}
	}
	bntWebsiteLayout();
	$str( '#customize-control-bnt_website_layout select' ).change( function() {
		bntWebsiteLayout();
		bntWebsiteBackground();
	});
	
	function bntWebsiteBackground() {
		var $parent = $str( '#customize-control-bnt_website_background select' );
		var $children = $str( '#customize-control-bnt_website_background_color, #customize-control-bnt_website_background_texture, #customize-control-bnt_website_background_image' );
		if ( $parent.is(':visible') ) {
			var pvalue = $parent.attr('value');
			$children.each(function( index, value ) {
				if ( index == pvalue ) {
					$str(value).show();
				} else {
					$str(value).hide();
				}
			});
		} else {
			$children.hide();
		}
	}
	bntWebsiteBackground();
	$str( '#customize-control-bnt_website_background select' ).change( function() {
		bntWebsiteBackground();
	});
	
	function bntMenuBackground() {
		var $parent = $str( '#customize-control-bnt_menu_config select' );
		var $child1 = $str( '#customize-control-bnt_primary_menu_background' );
		var $child2 = $str( '#customize-control-bnt_menu_separators' );
		if ( $parent.attr('value') == 2 ) {
			$child1.show();
			$child2.hide();
		} else if ( $parent.attr('value') == 3 ) {
			$child2.show();
			$child1.hide();
		} else {
			$child1.hide();
			$child2.hide();
		}
	}
	bntMenuBackground();
	$str( '#customize-control-bnt_menu_config select' ).change( function() {
		bntMenuBackground();
	});
	
	function bntPopupLocation() {
		var $parent = $str( '#customize-control-bnt_cta_location select' );
		var $child = $str( '#customize-control-bnt_cta_page' );
		if ( $parent.attr('value') == 4 ) {
			$child.show();
		} else {
			$child.hide();
		}
	}
	bntPopupLocation();
	$str( '#customize-control-bnt_cta_location select' ).change( function() {
		bntPopupLocation();
	});
	
	function bntPopupTrigger() {
		var $parent = $str( '#customize-control-bnt_cta_trigger select' );
		var $child = $str( '#customize-control-bnt_cta_timeonpage' );
		if ( $parent.attr('value') == 0 ) {
			$child.show();
		} else {
			$child.hide();
		}
	}
	bntPopupTrigger();
	$str( '#customize-control-bnt_cta_trigger select' ).change( function() {
		bntPopupTrigger();
	});
		
		
});