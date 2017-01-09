<?php
/**
 * The template for displaying the posts with audio format in the front page.
 *
 * @package Bassist
 * @since Bassist 1.0
 */

$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
$audio_section_title = $bassist_theme_options['audio_section_title'];
?>

<section id="music" class="audio-format-section">
    <div class="inner">

    <?php

    $is_sticky = get_option('sticky_posts');

    $args = array(  'posts_per_page' => 6 ,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => array(
                                'post-format-audio',
                            ),
                            'operator' => 'IN',
                            ),
                        ),
                    );
    $query = new WP_Query($args);

        if ( $query->have_posts() ) :?>
            <h2 class="section-title"><?php printf( esc_html( $audio_section_title ) ) ?></h2>
            
            <div class="flex-container audio-posts">
            <?php
                // Start the Loop again.
                while ( $query->have_posts() ) : $query->the_post();
                    /*
                    * Include the post format-specific template for the content. If you want to
                    * use this in a child theme, then include a file called called content-___.php
                    * (where ___ is the post format) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content', get_post_format() );

                endwhile;
                wp_reset_postdata();
            ?>
            </div> 
            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'bassist' ),
                'next_text'          => __( 'Next page', 'bassist' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bassist' ) . ' </span>',
            ) );

        else :
        // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content', 'none' );

        endif;
    ?>
    </div>

</section><!--/audio-format-section-->

