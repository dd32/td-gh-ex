<?php
/**
 * The template file to display the desktop logo
 *
 * @package agncy
 */

?>
<div class="logo-wrapper">
	<?php
	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :
		the_custom_logo();
	else :
		?>
	<a class="logo-text color-primary" href="<?php echo esc_url( home_url() ); ?>">
		<?php
			bloginfo( 'name' );
		?>
	</a>
		<?php
	endif;
	?>
</div>
