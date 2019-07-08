
// Scripts used by the admin elements

var $bentoadmin = jQuery.noConflict();

$bentoadmin(window).load(function() {
	
	
	// Display grid settings box when Grid page template is chosen 
	$bentoadmin('body').on( 'change', '.editor-page-attributes__template .components-select-control__input', function() {
		if ( $bentoadmin(this).val() == 'grid.php' ) {
			$bentoadmin('#grid_settings_metabox').slideDown();
		} else {
			$bentoadmin('#grid_settings_metabox').slideUp();
		}
    });	
	$bentoadmin('body').on( 'change', '#pageparentdiv #page_template', function() {
		if ( $bentoadmin(this).val() == 'grid.php' ) {
			$bentoadmin('#grid_settings_metabox').slideDown();
		} else {
			$bentoadmin('#grid_settings_metabox').slideUp();
		}
    });
	if ( $bentoadmin('.editor-page-attributes__template .components-select-control__input').val() == 'grid.php' || $bentoadmin('#pageparentdiv #page_template').val() == 'grid.php' ) {
		$bentoadmin('#grid_settings_metabox').show();
	}
	
	
	// Reveal extended page header settings when the respective checkbox is active
	var bento_revealExtheader = function() {
		if ( $bentoadmin('#bento_activate_header').is(':checked') ) {
			$bentoadmin('#cmb2-metabox-post_header_metabox .cmb-row:not(:first-child)').show();
		} else {
			$bentoadmin('#cmb2-metabox-post_header_metabox .cmb-row:not(:first-child)').hide();
		}
	}
	bento_revealExtheader();
	$bentoadmin('#bento_activate_header').change( function() {
		bento_revealExtheader();
	});
	
	
	// Reveal Google Maps header settings when the respective checkbox is active
	var bento_revealMapheader = function() {
		if ( $bentoadmin('#bento_activate_headermap').is(':checked') ) {
			$bentoadmin('#cmb2-metabox-post_headermap_metabox .cmb-row:not(:first-child)').show();
		} else {
			$bentoadmin('#cmb2-metabox-post_headermap_metabox .cmb-row:not(:first-child)').hide();
		}
	}
	bento_revealMapheader();
	$bentoadmin('#bento_activate_headermap').change( function() {
		bento_revealMapheader();
	});
	
		
});