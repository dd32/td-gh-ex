<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @since 1.0.0
 */
$remove_credit = get_theme_mod( 'abc_remove_credit' );
$class = ( $remove_credit ) ? 'screen-reader-text' : 'abc-credit';
?>
		</main><!-- main -->

		<footer id="footer" role="contentinfo">
			<div class="container">
				<?php do_action( 'abc_extended_footer' ); ?>

				<div class="copyright">
					<span id="abc-custom-copyright" class="pull-left"><?php echo apply_filters( 'abc_footer_notice', sprintf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'abacus' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ) ); ?></span>
					<span id="abc-credit-link" class="pull-right <?php echo esc_attr( $class ); ?>"><?php printf( __( 'The %s Theme by %s.', 'abacus' ), ABC_THEME_NAME, '<a href="https://alphabetthemes.com/downloads/abacus-wordpress-theme">Alphabet Themes</a>' ); ?></span>
				</div>
			</div>
		</footer><!-- #footer -->
	</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>