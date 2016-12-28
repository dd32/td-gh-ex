<?php

$category = get_theme_mod( 'slider_category', '' );

$slider_posts = new WP_Query( array(
        'posts_per_page' => 5,
        'cat'	=>	$category
    )
); 

?>

<div class="arouse-featured-slider">
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                <?php 

                if ( $slider_posts->have_posts() ) :
                
                    while( $slider_posts->have_posts() ) : $slider_posts->the_post(); 

                ?>
                    
                    <li>
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <div class="arouse-slider-container">
                        
                            <?php if ( has_post_thumbnail() ) { 

                                $thumb_id           = get_post_thumbnail_id();
                                $thumb_url_array    = wp_get_attachment_image_src( $thumb_id, 'arouse-featured-slider' );
                                $featured_image_url = $thumb_url_array[0]; 

                                ?>
                                <div class="arouse-slide-holder" style="background: url(<?php echo esc_url( $featured_image_url ); ?>);">
                            <?php } else { ?>
                                <div class="arouse-slide-holder" style="background: url(<?php echo get_template_directory_uri() . '/images/slide.jpg' ?>);">
                            <?php } ?>

                                    <div class="arouse-slide-content">
                                    <div class="overlay"></div>

                                        <div class="arouse-slider-details">
                                            <?php arouse_category_list(); ?>
                                            <a href="<?php the_permalink(); ?>" rel="bookmark"><h3 class="arouse-slider-title"><?php the_title(); ?></h3></a>
                                            <span class="divider"></span>
                                        </div><!-- .arouse-slider-details -->

                                    </div><!-- .arouse-slide-content -->

                                </div><!-- .arouse-slide-holder -->

                        </div><!-- .arouse-slider-container -->
                        </a>
                    </li>

                <?php 

                    endwhile;
                    wp_reset_postdata();
                
                endif;

                ?>
            </ul>
        </div><!-- .flexslider -->
    </section><!-- .slider -->
</div><!-- .arouse-slider -->