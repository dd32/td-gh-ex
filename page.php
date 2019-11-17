<?php
/* 	AssociationX Theme's General Page to display all Pages
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header(); 
$activesidebar = 'sidebar-sinpage';
if ( associationx_woo_page_check() ) $activesidebar = 'sidebar-woo'; 
$associationx_pagelayout = 'leftcontent';
if(!is_active_sidebar($activesidebar)) $associationx_pagelayout = 'fullcontent';
?>
<div id="pagename" class="d5_page_page"></div>
<div id="container" class="sinpagepostcon sinpagecon box90 <?php echo $associationx_pagelayout; ?>">
	<div id="containerin">
		<?php
		get_template_part( 'post-content' );
		if($associationx_pagelayout != 'fullcontent'): if ( associationx_woo_page_check() ): get_sidebar('ecommerce'); else: get_sidebar('sinpage'); endif; endif; 
		?>
	</div>
</div>
<?php get_footer();