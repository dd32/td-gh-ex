<?php
/**
 * The template for displaying search forms in Blue Planet
 *
 * @package Blue Planet
 */
?>
<?php
global $blueplanet_options_settings;
$bp_options = $blueplanet_options_settings;
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<fieldset>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'blue-planet' ); ?></span>
		<input type="search" class="search-field"
            placeholder="<?php echo $bp_options['search_placeholder']; ?>"
            value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
  <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'blue-planet' ); ?>">
	</fieldset>
</form>
