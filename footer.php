<?php
/**
 * @package mwsmall
 */
?>		
	</div><!-- .container -->

	<footer id="colophon" role="contentinfo">

		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 1') ) : ?>
					<?php endif; ?>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 2') ) : ?>
					<?php endif; ?>
				</div>	
				<div class="col-lg-4 col-md-4 col-sm-4">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 3') ) : ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		
		<div class="footer_info">
			<div class="container">
				<div class="row">
					<div class="f_left col-lg-6 col-md-6 col-sm-6">
						<?php _e('Copyright', 'mw-small'); ?> &copy; <?php echo date("Y") ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. <?php $txtfoo = get_theme_mod( 'mwsmall_text_footer' ); ?><?php if( $txtfoo != '') { echo esc_html( $txtfoo ); } else { _e('All Rights Reserved.', 'mw-small'); } ?>
					</div>
					<div class="f_right col-lg-6 col-md-6 col-sm-6">
						<?php _e( 'Proudly powered by', 'mw-small' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'mw-small' ) ); ?>" rel="generator" target="_blank">WordPress</a> 
						<?php _e( 'Theme by', 'mw-small' ); ?> <a target="_blank" href="<?php echo esc_url( __( 'http://www.mwthemes.net', 'mw-small' ) ); ?>">MW Themes</a>
					</div>
				</div>
			</div>
		</div><!-- .footer_info -->

	</footer><!-- #colophon -->
		
</div><!-- #page -->

<?php wp_footer();?>
 
</body>
</html>