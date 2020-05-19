<?php
/**
 * Template Name: Featured Articles
 *
 * Description: This template shows a list with 4 featured articles.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

get_header(); ?>
<div id="main-content" class="main-content">
	<div class="featured-articles flex-container">
	<?php
		$is_sticky = get_option('sticky_posts');
		$args = array(	'posts_per_page' => 4,
						'post__in'  => $is_sticky,
						'ignore_sticky_posts' => 1,
						);

		$query = new WP_Query($args);

		if ( $query->have_posts()) :
			while ( $query->have_posts() ):
				$query->the_post();
				get_template_part( 'template-parts/content', get_post_format() );				
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>
</div><!--/main-content-->
<?php get_footer(); ?>

