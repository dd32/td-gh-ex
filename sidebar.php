<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Blue Planet
 */
?>
<?php
//
do_action( 'blue_planet_before_secondary_open' );
//
?>
	<div id="secondary" class="widget-area col-md-4" role="complementary">
	<?php
	//
	do_action( 'blue_planet_after_secondary_open' );
	//
	?>

		<?php
		//
		do_action( 'blue_planet_before_widget' );
		//
		?>

		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : endif; ?>



		<?php
		//
		do_action( 'blue_planet_after_widget' );
		//
		?>

		<?php
		//
		do_action( 'blue_planet_before_secondary_close' );
		//
		?>
	</div><!-- #secondary -->
