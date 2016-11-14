<?php
/**
 * The template for displaying tag.
 * @package astrology
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php  _e('Tag: ','astrology'); echo single_tag_title( '', false );  ?></h2>
		    <div class="breadCumbs"><?php custom_breadcrumbs(); ?></div>
		</div>
	</div>
</section>
<section id="blogcontent">
	<?php get_template_part( 'template-parts/content'); ?>
</section>
<?php get_footer(); ?>