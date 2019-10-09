<?php

/* 	AssociationX Theme's 404 Error Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
get_header(); 
$swcf = esc_html__('SORRY, NOT FOUND ANYTHING', 'associationx');
$nf404img = esc_url(associationx_get_option('nf404-image', get_template_directory_uri() . '/images/404.jpg'));
if($nf404img) $nf404img = '<img class="nfep404" src="'.$nf404img.'" alt="'.$swcf.'" />';
?>
<div id="pagename" class="d5_404_page"></div>
<div id="error404page" class="page404 box90">
	<?php 
	echo $nf404img;
	associationx_not_found(); 
	?>
</div>
<?php get_footer();