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
                <?php while( $slider_posts->have_posts() ) : $slider_posts->the_post(); ?>
                    
                    <li>
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <div class="arouse-slider-container">
                        	<div class="overlay"></div>
                            <?php if ( has_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail( 'arouse-featured-slider' ); ?>
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri() . '/images/slide.jpg' ?>">
                            <?php } ?>


                            <div class="arouse-slider-details">
                            	<?php arouse_category_list(); ?>
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><h3 class="arouse-slider-title"><?php the_title(); ?></h3></a>
                                <span class="divider"></span>
                            </div>

                        </div>
                        </a>
                    </li>

                <?php endwhile; ?>
            </ul>
        </div>
    </section>
</div><!-- .arouse-slider -->