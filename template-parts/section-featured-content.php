<?php
/**
 * The template for displaying the featured posts.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<section class="featured-content-section">

    <?php
        if ( have_posts() ) :?>
            <h1><?php printf(__('Featured Content', 'aguafuerte')) ?></h1>
            <div class="featured-posts">
            <?php
            // Start the Loop.
                while (have_posts() ) : the_post();

                    if ( is_sticky()): 
                        /*
                        * Include the post format-specific template for the content. If you want to
                        * use this in a child theme, then include a file called called content-___.php
                        * (where ___ is the post format) and that will be used instead.
                        */
                    if (get_post_format()):
                        get_template_part( 'template-parts/content', get_post_format() );

                    elseif(! get_the_tag_list()):
                        get_template_part('template-parts/content', 'article-1'); //Chequear por que pasa el fondo rojo.

                    else: 
                        get_template_part ('template-parts/content', 'featured-article');
                    
                    endif;
                            
                    endif;  

                endwhile;
                wp_reset_postdata();
            ?>
            </div>
            <?php
            // Previous/next page navigation.
            // the_posts_pagination( array(
            // 'prev_text'          => __( 'Previous page', 'aguafuerte' ),
            // 'next_text'          => __( 'Next page', 'aguafuerte' ),
            // 'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>',
            // ) );

        else :
        // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content', 'none' );

        endif;
    ?>
   
</section><!--/featured-content-section-->

