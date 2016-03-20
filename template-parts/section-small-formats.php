<?php
/**
 * The template for displaying the posts with small formats (aside, chat, link, quote and status).
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<section class="small-formats-section">

    <?php

    $is_sticky = get_option('sticky_posts');

    $args = array(  'posts_per_page' => 6,
                    'post__not_in'  => $is_sticky,
                    'ignore_sticky_posts' => 1,
                    'tax_query' => array( array('taxonomy' => 'post_format',
                                                'field' => 'slug',
                                                'terms' => array('post-format-quote','post-format-aside','post-format-status', 'post-format-link', 'post-format-chat', ),
                                                'operator' => 'IN',),),);


    $query = new WP_Query($args);

        if ( $query->have_posts() ) :?>
            <h1><?php printf(__('Formatted things', 'aguafuerte')) ?></h1>
            
            <div class="flex-container small-formatted-posts">
            <?php
                // Start the Loop again.
                while ($query->have_posts() ) : $query->the_post();
                    /*
                    * Include the post format-specific template for the content. If you want to
                    * use this in a child theme, then include a file called called content-___.php
                    * (where ___ is the post format) and that will be used instead.
                    */
                    if ( get_post_format() && ! is_sticky()):
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
    <div class="clear"></div>
</section><!--/latest-posts-section-->

