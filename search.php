<?php 
/* 	AssociationX Theme's Search Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header(); 
$pagelayout = 'leftcontent';
if(!is_active_sidebar('sidebar-sp')) $pagelayout = 'fullcontent'; 
$blogpdesign = 'normalbdesign';
global $associationx_ExLength;
?>
<div id="pagename" class="d5_search_page allindexpages"></div>
<div id="container" class="consearch blogindexp box90 <?php echo $pagelayout.' '.$blogpdesign; ?>">
	<div id="containerin"><?php 
		get_template_part( 'post-content' );
		if($pagelayout != 'fullcontent') get_sidebar('sp'); ?>
	</div>
</div>
<?php get_footer();