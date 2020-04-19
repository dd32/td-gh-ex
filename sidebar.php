<?php
/* 	Searchlight Theme's Right Sidebar Area
	Copyright: 2014-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/

$sidebar = 'sidebar-1';
$rsdbarclass = ''; if( function_exists('is_woocommerce') && is_woocommerce()): $rsdbarclass = 'd5woocontentpart woorightsidebar'; $sidebar = 'sidebar-2'; endif;
if (!is_active_sidebar( $sidebar )) return;
?>
<div id="right-sidebar" class="rsdidebar <?php echo $rsdbarclass; ?>">
<?php dynamic_sidebar( $sidebar ); ?>
</div>