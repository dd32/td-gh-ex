<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @package WordPress
 * @subpackage Abacus
 * @since Abacus 1.0
 */
$remove_credit = get_theme_mod( 'abc_remove_credit' );
$class = ( $remove_credit ) ? 'screen-reader-text' : 'abc-credit';
?>
		</main><!-- main -->

		<div class="search-bar">
			<div class="search-wrapper">
				<?php get_search_form(); ?>
				<div class="close-search"><?php printf( __( '%s Close', 'abacus' ), '<i class="fa fa-close"></i>' ); ?></div>
			</div>
		</div>

		<footer id="footer" role="contentinfo">
			<div class="container">
				<?php do_action( 'abc_extended_footer' ); ?>

				<div class="copyright">
					<span id="abc-custom-copyright" class="pull-left"><?php echo apply_filters( 'abc_footer_notice', sprintf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'abacus' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ) ); ?></span>
					<span id="abc-credit-link" class="pull-right <?php echo esc_attr( $class ); ?>"><?php printf( __( 'The %s Theme by %s.', 'abacus' ), ABC_THEME_NAME, '<a href="https://alphabetthemes.com/downloads/abacus-wordpress-theme">Alphabet Themes</a>' ); ?> <a href="#" id="back-to-top" title="Back to top">&uarr;</a></span>
				</div>
			</div>
		</footer><!-- #footer -->
	</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>