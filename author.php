<?php
/**
* The template for displaying author pages.
* @package astrology 
*/
get_header(); ?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php _e('Author: ','astrology');  echo ucfirst(get_the_author()); ?></h2>
		    <div class="breadCumbs"><?php custom_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blogcontent">
    	<?php get_template_part( 'template-parts/content', get_post_format() ); ?>	
</section>
<?php get_footer(); ?>