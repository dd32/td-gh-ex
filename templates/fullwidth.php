<?php
/*
	Template Name: Full Width
 	AssociationX Theme's Full Width Page to show the Pages Selected Full Width
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header(); 
?>
<div id="pagename" class="d5_fullwidth_page"></div>
<div id="container" class="sinpagepostcon sinpostcon fullpagecon box90 fullcontent">
	<div id="containerin">
		<?php get_template_part( 'post-content' ); ?>
	</div>
</div>
<?php get_footer();