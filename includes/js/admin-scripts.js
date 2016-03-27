
// Scripts used by the admin elements

var $adm = jQuery.noConflict();

$adm(document).ready(function() {
	
	
	// Display grid settings box when Grid page template is chosen 
	$adm('#page_template').change( function() {
		$adm('#grid_settings_metabox').toggle( $adm(this).val() == 'page-grid.php' );
    }).change();
	
	
	// Reveal extended page header settings when the respective checkbox is active
	var revealExtheader = function() {
		if ( $adm('#bnt_activate_header').is(':checked') ) {
			$adm('#cmb2-metabox-post_header_metabox .cmb-row:not(:first-child)').show();
		} else {
			$adm('#cmb2-metabox-post_header_metabox .cmb-row:not(:first-child)').hide();
		}
	}
	revealExtheader();
	$adm('#bnt_activate_header').change( function() {
		revealExtheader();
	});
	
	
	// Reveal Google Maps header settings when the respective checkbox is active
	var revealMapheader = function() {
		if ( $adm('#bnt_activate_headermap').is(':checked') ) {
			$adm('#cmb2-metabox-post_headermap_metabox .cmb-row:not(:first-child)').show();
		} else {
			$adm('#cmb2-metabox-post_headermap_metabox .cmb-row:not(:first-child)').hide();
		}
	}
	revealMapheader();
	$adm('#bnt_activate_headermap').change( function() {
		revealMapheader();
	});
	
		
});