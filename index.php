<?php
/**
 * The main template file.
 *
 * @package Bar Restaurant
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="container">
		<div class="blog-title">
		    <h2><?php if(!empty(get_option('page_for_posts'))){ the_title(); }else{ esc_html_e('BLOG','bar-restaurant');} ?></h2>
		</div>
	</div>
</section>
<section id="blogcontent">    
    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
</section>
<?php get_footer(); ?>