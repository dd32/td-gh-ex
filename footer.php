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
 * asagi_before_footer hook.
 *
 */
do_action( 'asagi_before_footer' );
?>

<div <?php asagi_footer_class(); ?>>
	<?php
	/**
	 * asagi_before_footer_content hook.
	 *
	 */
	do_action( 'asagi_before_footer_content' );

	/**
	 * asagi_footer hook.
	 *
	 *
	 * @hooked asagi_construct_footer_widgets - 5
	 * @hooked asagi_construct_footer - 10
	 */
	do_action( 'asagi_footer' );

	/**
	 * asagi_after_footer_content hook.
	 *
	 */
	do_action( 'asagi_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * asagi_after_footer hook.
 *
 */
do_action( 'asagi_after_footer' );

wp_footer();
?>

</body>
</html>
