<?php
/**
 *
 * Footer copyright
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Acoustics
 * @version     1.0.0
 *
 */

$acoustics_copyright = get_theme_mod( 'acoustics_footer_copyright', '')
?>
 <div class="section-copyright text-center">
	 <div class="container">
		 <div class="site-info">
			 	 <?php if( !empty( $acoustics_copyright ) ): ?>
					<span><?php echo wp_kses_post( $acoustics_copyright ); ?></span>
					<small class="copyright-credit">
						<a  title="<?php echo esc_html_e('Free WordPress Theme','acoustics');?>" href="<?php echo esc_url( THEMEURL ); ?>">
	 						<?php esc_html_e( 'Acoustics', 'acoustics' ); ?>
	 					</a>
	 					<span><?php echo esc_html_e(' by CodeGearThemes','acoustics');?></span>
					</small>
				 <?php else: ?>
				 	 <a  title="<?php echo esc_html_e('Free WordPress Theme','acoustics');?>" href="<?php echo esc_url( THEMEURL ); ?>">
						 <?php esc_html_e( 'Acoustics', 'acoustics' ); ?>
					 </a>
					 <span><?php echo esc_html_e(' by CodeGearThemes','acoustics');?></span>
					 <small><?php esc_html_e( 'Powered by WordPress', 'acoustics' );  ?></small>
				 <?php endif; ?>
		 </div><!-- .site-info -->
	 </div>
 </div>
