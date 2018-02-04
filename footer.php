<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency X
 */

?>

		</div>
			</div>
		</div>
		<footer id="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
						<p class="copyright">
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'agency-x' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'agency-x' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
							<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'agency-x' ), 'agency-x', '<a href="http://samuraithemes.com/">Samurai Theme</a>' );
			?></p>
					</div>
				</div>
			</div>
		</footer>

		<!-- Mobile Menu -->
		<div class="overlay overlay-hugeinc">
			<button type="button" class="overlay-close"><span class="ion-ios-close-empty"></span></button>
			<nav>
				<?php
											wp_nav_menu( array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
												'container'         => 'div',
							                	'menu_class'        => 'nav navbar-nav menu',
											) );
										?>
			</nav>
		</div>
		<?php wp_footer(); ?>

	</body>
</html>


