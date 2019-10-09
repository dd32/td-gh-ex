<?php

/* 	AssociationX Theme's Single Page to display Single Post
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header(); 
$pagelayout = 'leftcontent';
if(!is_active_sidebar('sidebar-sinpost') ) $pagelayout = 'fullcontent';
?>
<div id="pagename" class="d5_single_page"></div>
<div id="container" class="sinpagepostcon sinpostcon box90 <?php echo $pagelayout; ?>">
	<div id="containerin">
		<?php
		get_template_part( 'post-content' );
		if($pagelayout != 'fullcontent') get_sidebar('sinpost'); 
		?>
	</div>
</div>
<?php get_footer();