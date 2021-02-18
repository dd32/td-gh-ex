<?php
/**
 * @package Themefreesia
 * @subpackage Arise
 * @since Arise 1.0
 */
?>
<?php
/************************* ARISE FOOTER DETAILS **************************************/

function arise_site_footer() {
if ( is_active_sidebar( 'arise_footer_options' ) ) :
		dynamic_sidebar( 'arise_footer_options' );
	else:
		echo '<div class="copyright">' .'&copy; ' . date('Y') .' '; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | 
						<?php _e('Designed by:','arise'); ?> <a title="<?php echo esc_attr__( 'Themefreesia', 'arise' ); ?>" target="_blank" href="<?php echo esc_url( 'http://themefreesia.com' ); ?>"><?php _e('Theme Freesia','arise');?></a> | 
						<?php _e('Powered by:','arise'); ?> <a title="<?php echo esc_attr__( 'WordPress', 'arise' );?>" target="_blank" href="<?php echo esc_url( 'http://wordpress.org' );?>"><?php _e('WordPress','arise'); ?></a>
					</div>
	<?php endif;
}
add_action( 'arise_sitegenerator_footer', 'arise_site_footer');
?>
