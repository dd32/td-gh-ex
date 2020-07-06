<?php
/*
	Design Theme's Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/


get_header(); 
$bannerimage = ''; $bannerimage = design_get_option('banner-image', '');
$heading = ''; $heading = design_get_option('heading_text', '');
$quote = ''; $quote = design_get_option('bottom-quotation', '');
?>
<?php if($bannerimage): ?><div id="slide-container"><div id="slide"><img src="<?php echo esc_url($bannerimage); ?>"/></div></div><?php endif; ?>
<div id="container">
<?php if($heading): ?><h1 id="heading"><?php echo esc_textarea($heading); ?></h1><?php endif; ?>
<?php get_template_part( 'featured-box' ); ?> 
<?php if (esc_html(design_get_option('fpost', '0') != '1')): get_template_part( 'front-page-blog' ); endif;?> 
<?php if ($quote): ?><div id="customers-comment"><blockquote><?php echo esc_textarea($quote); ?></blockquote></div><?php endif; ?>
<?php get_footer();