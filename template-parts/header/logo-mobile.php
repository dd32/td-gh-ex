<?php
/**
 * The template file to display the mobile logo
 *
 * @package agncy
 */

?>
<div class="logo-wrapper">
	<?php
	if ( get_theme_mod( 'agncy_header_mobile_logo', false ) ) :
		$img_id = get_theme_mod( 'agncy_header_mobile_logo', false );
		?>
		<div class="logo">
			<a href="<?php echo esc_url( home_url() ); ?>" class="logo-link">
		<?php
			echo wp_kses_post( get_image_tag( $img_id, get_bloginfo( 'name' ), get_bloginfo( 'name' ), false, 'full' ) );
		?>
			</a>
		</div>
		<?php
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
