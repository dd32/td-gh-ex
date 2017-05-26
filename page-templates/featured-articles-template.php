<?php
/**
 * Template Name: Featured Articles
 *
 * Description: This is not a page template but a template part in development.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

get_header(); ?>

<div class="inner">
    <div id="main-content">
    	<div class="small-section">

			<?php

			$is_sticky = get_option('sticky_posts');
		//echo '<pre>';print_r($is_sticky);echo '</pre>'; echo '<br>';
		$args = array(	'posts_per_page' => 4,
						'post__in'  => $is_sticky,
						'ignore_sticky_posts' => 1,
						);

		//print_r($args);
		$query = new WP_Query($args);
		//echo '<pre>';print_r($query);echo '</pre>'; echo '<br>';

		if ( $query->have_posts()) :
			while ( $query->have_posts() ):
				$query->the_post();
				if (get_post_format()):
					get_template_part( 'template-parts/content', get_post_format() );
				endif;
			endwhile;
			wp_reset_postdata();
		endif;
		?>


		</div><!--/small-section-->   
	</div><!--/main-content-->    
<?php get_sidebar('sidebar'); ?>
</div><!--/inner-->

<?php get_footer(); ?>

