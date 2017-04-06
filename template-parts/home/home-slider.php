<?php if(get_theme_mod('slider_cat')): ?>
<div class="flexslider slider loading">
  <ul class="slides">
        <?php
       $slider_cat=array(get_theme_mod('slider_cat'));
       $args = array(
		'post_type'=>'post',
		'cat' =>$slider_cat,
		'posts_per_page'=>-1,
		'orderby'=>'post__in');
		$wp_query=new WP_Query($args);
              if ($wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                      if (has_post_thumbnail( $post->ID ) ) {
                          $backyard_slider_attachment = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ), 'full'); 
                          $backyard_slider_imageUrl=$backyard_slider_attachment[0];  ?>
                          <li> 
                              <div class="slider-image" style="background-image:url(<?php echo esc_url($backyard_slider_imageUrl); ?>)"></div>
                               <div class="slider-content">
          <h1><?php the_title(); ?></h1>
          <p><?php the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('READ MORE', 'backyard'); ?></a>
          </div></li>
              <?php } endwhile; else: ?>
                <li class="error-not-found"><?php esc_html_e('Sorry, no blog entries found.', 'backyard'); ?></li>
              <?php endif;  wp_reset_postdata(); ?>
            </ul>
</div>
<?php endif; ?>