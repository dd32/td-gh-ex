<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 *  Specific page output template
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */

    $sb_layout = weaverx_page_lead( 'archive', true );

    // and next the content area.
    weaverx_sb_precontent('archive');

                // content for archive page

                if ( have_posts() ) {
                    $archive = 'Archive';
                    if ( is_day() ) {
                        $archive = '<span class="title-archive-label">' . sprintf( __( 'Daily Archives: %s','weaverx') ,
                                                                            '</span><span class="archive-info">' . get_the_date() ) . '</span>' ;
                    } else if ( is_month() ) {
                        $archive = '<span class="title-archive-label">' . sprintf( __( 'Monthly Archives: %s','weaverx') ,
                                                                            '</span><span class="archive-info">' . get_the_date( 'F Y' ) ) . '</span>';
                    } else if ( is_year() ) {
                        $archive =  '<span class="title-archive-label">' . sprintf( __( 'Yearly Archives: %s','weaverx') ,
                                                                             '</span><span class="archive-info">' . get_the_date( 'Y' ) ) . '</span>';
                    } else if ( is_tax() ) {        // these improve presentation of custom tax titles
                        $archive = single_term_title('', false);
                    } else {
                        $archive = post_type_archive_title('', false);
                    } ?>

                    <header class="page-header">
                        <?php
                        weaverx_archive_title( $archive, 'archive');

                        $term_description = term_description();
                        if ( ! empty( $term_description ) )
                            echo apply_filters( 'taxonomy_archive_meta', '<div class="tax-archive-meta">' . $term_description . '</div>' );
                        ?>
                    </header>
                    <?php

                    weaverx_content_nav( 'nav-above' );
                    weaverx_masonry('begin-posts');
                    /* Start the Loop */
                    weaverx_post_count_clear();
                    while ( have_posts() ) {
                        the_post();
                        weaverx_masonry('begin-post');
                        weaverx_post_count_bump();

                        /* Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'templates/content', get_post_format() );
                        weaverx_masonry('end-post');
                    }
                    weaverx_masonry('end-posts');
                    weaverx_content_nav( 'nav-below' );

                } else {
                    weaverx_not_found_search(__FILE__);
                }

                weaverx_sb_postcontent('archive');

    weaverx_page_tail( 'archive', $sb_layout );    // end of page wrap
?>
