
// Scripts used by the admin elements

var $adm = jQuery.noConflict();

$adm(document).ready(function() {
	
	
	// Display grid settings box when Grid page template is chosen 
	$adm('#page_template').change( function() {
		$adm('#grid_settings_metabox').toggle( $adm(this).val() == 'page-grid.php' );
    }).change();
	
	
	// Reveal extended page header settings when the respective checkbox is active
	var bento_revealExtheader = function() {
		if ( $adm('#bento_activate_header').is(':checked') ) {
			$adm('#cmb2-metabox-post_header_metabox .cmb-row:not(:first-child)').show();
		} else {
			$adm('#cmb2-metabox-post_header_metabox .cmb-row:not(:first-child)').hide();
		}
	}
	bento_revealExtheader();
	$adm('#bento_activate_header').change( function() {
		bento_revealExtheader();
	});
	
	
	// Reveal Google Maps header settings when the respective checkbox is active
	var bento_revealMapheader = function() {
		if ( $adm('#bento_activate_headermap').is(':checked') ) {
			$adm('#cmb2-metabox-post_headermap_metabox .cmb-row:not(:first-child)').show();
		} else {
			$adm('#cmb2-metabox-post_headermap_metabox .cmb-row:not(:first-child)').hide();
		}
	}
	bento_revealMapheader();
	$adm('#bento_activate_headermap').change( function() {
		bento_revealMapheader();
	});
	
	
	// Migrate old theme options into Customizer
	$adm('.notice-migrate-bento-options .button-primary').click(function() { 
		$adm.ajax({
			url: bentoAdminVars.ajaxurl,
			type: 'POST',
			data: {
				action: 'bento_migrate_customizer_options',
			},
			success: function(response) {
				$adm('.notice-migrate-bento-options').hide(300, function() {
					$adm('.notice-migrate-bento-options-success').show(300);
				});
			},
			error: function(response) {
				alert('Shoot! Something went wrong. Please try again or contact support@satoristudio.net');
			}
		});
	});
	
		
});