<?php
/**
 * The template for displaying search forms in appointment
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		
		<input type="text" class="input-small"  name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'appointment' ); ?>" />
		<input type="submit" class="submit" name="submit" value="<?php esc_attr_e( 'Search', 'appointment' ); ?>" />

	</form>
	