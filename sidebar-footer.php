<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package fmi
 */
?>

<?php
/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if( !is_active_sidebar( 'fmi_footer_sidebar_one' ) &&
	!is_active_sidebar( 'fmi_footer_sidebar_two' ) &&
	!is_active_sidebar( 'fmi_footer_sidebar_three' ) ){
	return;
}
?>
<div class="sidebar-footer"><div class="inner">
<div class="widget-wrap inner-wrap clearfix">
	<div class="sfdiv">
		<?php
		// Calling the footer sidebar if it exists.
		if ( !dynamic_sidebar( 'fmi_footer_sidebar_one' ) ):
		endif;
		?>
	</div>

	<div class="sfdiv">
		<?php
		// Calling the footer sidebar if it exists.
		if ( !dynamic_sidebar( 'fmi_footer_sidebar_two' ) ):
		endif;
		?>
	</div>

	<div class="sfdiv sfdiv-last">
		<?php
		// Calling the footer sidebar if it exists.
		if ( !dynamic_sidebar( 'fmi_footer_sidebar_three' ) ):
		endif;
		?>
	</div>
    <div class="clear"></div>
</div>
</div></div>