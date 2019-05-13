<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * bhaga_before_footer hook.
 *
 */
do_action( 'bhaga_before_footer' );
?>

<div <?php bhaga_footer_class(); ?>>
	<?php
	/**
	 * bhaga_before_footer_content hook.
	 *
	 */
	do_action( 'bhaga_before_footer_content' );

	/**
	 * bhaga_footer hook.
	 *
	 *
	 * @hooked bhaga_construct_footer_widgets - 5
	 * @hooked bhaga_construct_footer - 10
	 */
	do_action( 'bhaga_footer' );

	/**
	 * bhaga_after_footer_content hook.
	 *
	 */
	do_action( 'bhaga_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * bhaga_after_footer hook.
 *
 */
do_action( 'bhaga_after_footer' );

wp_footer();
?>

</body>
</html>
