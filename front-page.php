<?php
/**
 * The front page file.
 * @package AccesspressLite
 */

get_header(); ?>

	<?php 
		global $ak_options;
		$ak_settings = get_option( 'ak_options', $ak_options );
		
		if( $ak_settings['ak_home_page_layout'] == 'Default' ) {
			get_template_part( 'index', 'one' ); 
		}elseif( $ak_settings['ak_home_page_layout'] == 'Layout1' ) {
			get_template_part( 'index', 'two' ); 
		}elseif( $ak_settings['ak_home_page_layout'] == 'Layout2' ) {
			get_template_part( 'index'); 
		}else{
			get_template_part( 'index', 'one' ); 
		}
	?>
	
<?php get_footer(); ?>
