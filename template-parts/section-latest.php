<?php
/**
 * The template for displaying the latest posts section.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<section class="latest-section">

    <?php

    $is_sticky = get_option('sticky_posts');

    $args = array(  'posts_per_page' => 8,
                    'post__not_in'  => $is_sticky,
                    'ignore_sticky_posts' => 1,
                    'tax_query' => array( array('taxonomy' => 'post_format',
                                                'field' => 'slug',
                                                'terms' => array('post-format-quote','post-format-aside','post-format-status', 'post-format-link', 'post-format-chat', 'post-format-image'),
                                                'operator' => 'NOT IN',),),);


    $query = new WP_Query($args);

        if ( $query->have_posts() ) :?>
            <h1><?php printf(__('The Latest', 'aguafuerte')) ?></h1>
            <div class="flex-container standard-posts">
            <?php
            // Start the Loop.
            while ($query->have_posts() ) : $query->the_post();

                if ( ! get_post_format()): 
                    /*
                    * Include the post format-specific template for the content. If you want to
                    * use this in a child theme, then include a file called called content-___.php
                    * (where ___ is the post format) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content', 'article-2' );
                    else:
                    get_template_part( 'template-parts/content', get_post_format() );
                        
                endif;  

            endwhile;
            wp_reset_postdata();
            ?>
            </div>

            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
            'prev_text'          => __( 'Previous page', 'aguafuerte' ),
            'next_text'          => __( 'Next page', 'aguafuerte' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>',
            ) );

        else :
        // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content', 'none' );

        endif;
    ?>
    
</section><!--/latest-posts-section-->

