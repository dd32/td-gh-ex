<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer">
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		<div class="footer-content">
			<div class="container">
				<?php
				$footer_menu = has_nav_menu( 'footer-menu' );
				?>
				<div class="footer-wrapper <?php if ( $footer_menu ) echo esc_attr( 'has-footer-menu' ); ?>">
					<?php
					if ( get_theme_mod( 'footer_show_social_menu', artpop_defaults( 'footer_show_social_menu' ) ) ) {
						get_template_part( 'template-parts/navigation/navigation', 'social' );
					}
					?>
					<?php
					if ( $footer_menu ) :

						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'container'      => false,
							'depth'          => 1,
							'menu_class'     => 'footer-menu',
							'fallback_cb'    => false,
						) );

					endif;
					?>
					<div class="footer-credits">
						<?php artpop_credits(); ?>
						<span>
							<a href="<?php echo esc_url( __( 'https://www.designlabthemes.com/', 'artpop' ) ); ?>" rel="nofollow">
								<?php printf( __( 'Artpop Theme by %s', 'artpop' ), 'Design Lab' ); ?>
							</a>
						</span>
						<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( '<span>', '</span>' );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- .site-footer -->

</div><!-- #page -->

<?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
<?php wp_footer(); ?>

</body>
</html>
