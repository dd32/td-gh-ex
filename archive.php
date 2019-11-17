<?php 
/* 	AssociationX Theme's Archive Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header(); 
$associationx_pagelayout = 'leftcontent';
if(!is_active_sidebar('sidebar-1')) $associationx_pagelayout = 'fullcontent'; 
$blogpdesign = 'normalbdesign';
global $associationx_ExLength;
?>
<div id="pagename" class="d5_archive_page allindexpages"></div>
<div id="container" class="conarc blogindexp box90 <?php echo $associationx_pagelayout.' '.$blogpdesign; ?>">
	<div id="containerin"><?php 
		get_template_part( 'post-content' );
		if($associationx_pagelayout != 'fullcontent') get_sidebar(); ?>
	</div>
</div>
<?php get_footer();