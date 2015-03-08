<?php
/**
 * @package fmi
 *
 */
 
$sid = rand(0,99);
?>
<div class="searchinfo">
<form role="search" method="get" id="search-form-<?php echo $sid;?>" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete='off'>
	<div class="searchtxt">
	<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'fmi' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'fmi' ); ?>" />
	</div>
    
    <a href="javascript:void(0)" onclick="document.getElementById('search-form-<?php echo $sid;?>').submit();" class="search-submit" ><i class="fa fa-search"></i></a>
</form>
</div>