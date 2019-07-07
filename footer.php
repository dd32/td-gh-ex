<?php
/**
 * File aeonblog.
 *
 * @package   AeonBlog
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2019, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

global $aeonblog_theme_options;
$copyright = wp_kses_post( $aeonblog_theme_options['aeonblog-copyright-text'] );

if ( ! is_page_template( 'elementor_header_footer' ) ) {
	?>
		</div><!-- #row -->
	</div><!-- #container -->
</div><!-- #content -->
	<?php } ?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
	<?php
	if ( has_nav_menu( 'social' ) ) {
		?>
		<div class="social-icons-footer">
			<nav class="footer-social-menu-navigation">
				<ul class="social-menu">
					<li class="social-link">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'social',
								'menu_class'     => 'aeonblog-menu-social',
								'depth'          => 0,
								'fallback_cb'    => false,
							)
						);
						?>
					</li>
				</ul>
			</nav>
		</div>
		<?php
	}
	?>
		<div class="copyright">
			<?php echo $copyright; ?>
		</div>
		<div class="site-info text-center">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'aeonblog' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'aeonblog' ), 'WordPress' );
			?>
			</a>

			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'aeonblog' ), 'AeonBlog', '<a href="#">AeonWP</a>' );
			?>
		</div><!-- .site-info -->
		<?php
		/**
		 * Go to Top Option.
		 */
		do_action( 'aeonblog_go_to_top_hook' );
		?>
	</div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
