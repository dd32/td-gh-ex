<?php
/**
 * The template for displaying search forms in Catch Kathmandu
 *
 * @package AccesspressLite
 */
 ?>
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" class="s" placeholder="Search..." />
		<input type="submit" name="submit" class="searchsubmit" value="<?php esc_attr_e( 'Search', 'accesspresslite' ); ?>" />
	</form>
