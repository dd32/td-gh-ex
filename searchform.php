<?php
/* 	Selfie Theme's Search Form
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Selfie 1.0
*/
?>


	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" placeholder="<?php _e('Search...', 'selfie'); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php _e('Search', 'selfie'); ?>" />
	</form>