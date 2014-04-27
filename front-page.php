<?php
/**
 * The front page file.
 * @package AccesspressLite
 */

get_header(); ?>

	<?php 
		global $ak_accesspress_options;
		$ak_accesspress_settings = get_option( 'ak_accesspress_options', $ak_accesspress_options );

		if ( 'page' == get_option( 'show_on_front' ) ) {
		    get_template_part( 'index');
		} else {
		   if( $ak_accesspress_settings['ak_home_page_layout'] == 'Default' ) {
			get_template_part( 'index', 'one' ); 
			}elseif( $ak_accesspress_settings['ak_home_page_layout'] == 'Layout1' ) {
				get_template_part( 'index', 'two' ); 
			}elseif( $ak_accesspress_settings['ak_home_page_layout'] == 'Layout2' ) {
				get_template_part( 'index'); 
			}else{
				get_template_part( 'index', 'one' ); 
			}
		}
		
		
	?>
	
<?php get_footer(); ?>
