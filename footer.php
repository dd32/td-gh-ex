<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage asterion
 */
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	$copyright  = get_theme_mod( 'asterion_copyright', sprintf( __( '&copy; Copyright %s. All Rights Reserved.', 'asterion' ), date('Y')) );
?>
		</div><!-- /.container -->

		<!-- back to top button -->
		<p id="back-top" style="display: block;">
			<a href="#top">
				<i class="fa fa-angle-up"></i>
			</a>
		</p>

		<div class="mz-footer">
			<div class="container text-center">
				<div class="ot-copyright"><?php echo asterion()->customizer->sanitize_html(sprintf( __( '&copy; Copyright %s. All Rights Reserved.', 'asterion' ), date('Y'))); ?></div>
				<?php printf( '%s <a href="%s" title="%s" target="_blank">%s</a> %s.', esc_html__( 'Theme:', 'asterion' ), esc_url( 'http://www.orange-themes.com/asterion-wordpress-theme/' ), esc_attr__( 'Asterion', 'asterion' ), esc_html__( 'Asterion', 'asterion' ), esc_html__( 'by Orange Themes', 'asterion' ) ); ?>
			</div>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>