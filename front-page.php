<?php
/**
 * The front page file.
 * @package AccesspressLite
 */

get_header(); ?>

	<?php 
		$accesspresslite_options = accesspress_default_setting_value();
		$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
		$home_template            = isset( $accesspresslite_settings[ 'accesspresslite_home_template' ] ) ? $accesspresslite_settings[ 'accesspresslite_home_template' ] : '';
        //$home_template = $accesspresslite_settings['accesspresslite_home_template'];

		if ( 'page' == get_option( 'show_on_front' ) ) {
		    include get_page_template();
		}
        elseif($home_template == 'template_one'){
            
            get_template_part( 'index', 'one' );
        } 
        else {
			get_template_part( 'index', 'two' );
		}
		
		
	?>
	
<?php get_footer(); ?>
