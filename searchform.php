<?php
/* Small Business Theme's Search Form
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/
?>

		<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"> </label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Text Here', 'small-business' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'small-business' ); ?>" />
		</form>