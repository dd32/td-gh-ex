<?php
/**
 * The template for displaying the featured posts.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>

<section id="featured-posts" class="featured-content-section">
    <!--<h1><?php printf(__('Featured Content', 'bassist')) ?></h1>-->
    <div class="featured-posts">
<?php

    $is_sticky = get_option('sticky_posts');
    $terms = array( 'post-format-aside',
                    'post-format-image',
                    'post-format-video',
                    'post-format-quote',
                    'post-format-link',
                    'post-format-gallery',
                    'post-format-status',
                    'post-format-audio',
                    'post-format-chat',
                );         

    $args = array(  'posts_per_page' => 1,
                    'post__in'  => $is_sticky,
                    'ignore_sticky_posts' => true,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => $terms,
                            'operator' => 'NOT IN',
                            ),
                        ),
                    );


    $query = new WP_Query($args);

    // Start the Loop.

    if ($query->have_posts()):
        while ( $query->have_posts() ) : $query->the_post();
        /*
         * Include the post format-specific template for the content. If you want to
         * use this in a child theme, then include a file called called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */
            get_template_part('template-parts/content', 'featured-article-tag');
        endwhile;
         wp_reset_postdata();

    else :
    // If no content, include the "No posts found" template.
    get_template_part( 'template-parts/content', 'none' ); 

    endif;?>

    </div><!--/featured-posts-->

</section><!--/featured-content-section-->

