<?php
/**
 *Theme Name	: 	Corpbiz	
 * @file           searchform.php
 * @package        corpbiz
 * @author         Priyanshu Mittal
 * @copyright      2013 Webriti
*/
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="search_widget_input"  name="s" id="s" placeholder="<?php esc_attr_e( "Search Here", 'corpbiz' ); ?>" />
	<input type="submit" class="search_btn" style="" name="submit" value="<?php esc_attr_e( "Search", 'corpbiz' ); ?>" />
</form>