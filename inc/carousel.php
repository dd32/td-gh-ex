<?php
/**
 * carousel.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */
?>

<div class="container">
   <div id="avik-slider">
	 <?php
	   $carousel_cat = get_theme_mod('carousel_setting');
	   $carousel_count = get_theme_mod('count_setting');
	   $new_query = new WP_Query( array( 'cat' => $carousel_cat  , 'showposts' => $carousel_count ));
	 while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
	 <div class="item">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'carousel-pic' ); ?></a>
		<hr>
		<h3> <?php the_title();?> </h3>
	 </div>
	 <?php 
	 endwhile;
	 	wp_reset_postdata(); 
	 ?>
   </div>
</div>