<?php
/**
 * The front page file.
 * @package AccesspressLite
 */

get_header(); ?>

	<?php 
		global $accesspresslite_options;
		$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );

		if ( 'page' == get_option( 'show_on_front' ) ) {
		    get_template_part( 'index');
		} else {
		   if( $accesspresslite_settings['accesspresslite_home_page_layout'] == 'Default' ) {
			get_template_part( 'index', 'one' ); 
			}elseif( $accesspresslite_settings['accesspresslite_home_page_layout'] == 'Layout1' ) {
				get_template_part( 'index', 'two' ); 
			}elseif( $accesspresslite_settings['accesspresslite_home_page_layout'] == 'Layout2' ) {
				get_template_part( 'index'); 
			}else{
				get_template_part( 'index', 'one' ); 
			}
		}
		
		
	?>
	
<?php get_footer(); ?>
