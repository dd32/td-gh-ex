<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package App_Landing_Page
 */

?>
				<?php if( is_404() ) { echo '</div>'; } ?>
			</div>
		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
			
			<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			
	
			<?php  } ?>


            <div class="site-info">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'app-landing-page' ); ?></p>
				<p><?php esc_html_e( 'Theme by ', 'app-landing-page' ); ?><a href="<?php echo esc_url( 'http://raratheme.com/' ); ?>" rel="designer"><?php esc_html_e( 'Rara Theme', 'app-landing-page' ); ?></a>. <?php printf( esc_html__( 'Powered by %s', 'app-landing-page' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'app-landing-page' ) ) .'">WordPress</a>' ); ?>.</span>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
