<?php
/**
 * The template for displaying search forms in D5 Smartia
 *
 * @D5 Creation
 * @Modified on Twenty_Eleven
 
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'd5smartia' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'd5smartia' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'd5smartia' ); ?>" />
	</form>
