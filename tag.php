<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 *  Tag page output template
 */
/*! ** DO NOT EDIT THIS FILE! It will be overwritten when the theme is updated! ** */

    $sb_layout = weaverx_page_lead( 'tag', true );

    // and next the content area.
    weaverx_sb_precontent('tag');

    if ( have_posts() ) { ?>

    <header class="page-header">
        <?php
        $title = '<span class="title-tag-label">' . sprintf( __( 'Tag Archives: %s','weaver-xtreme'), '</span><span class="archive-info">'
                                                            . single_tag_title( '', false ) . '</span>' );
        weaverx_archive_title( $title, 'tag' );

        $tag_description = tag_description();
        if ( ! empty( $tag_description ) )
            echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
        ?>
    </header>

    <?php
        weaverx_content_nav( 'nav-above' );

        /* Start the Loop */

        weaverx_post_count_clear();
        weaverx_masonry('begin-posts');
        while ( have_posts() ) {
            the_post();
            weaverx_post_count_bump();

            weaverx_masonry('begin-post');
            get_template_part( 'templates/content', get_post_format() );
            weaverx_masonry('end-post');
        }


        weaverx_masonry('end-posts');
        weaverx_content_nav( 'nav-below' );
    } else {
        weaverx_not_found_search(__FILE__);
    }

    weaverx_sb_postcontent('tag');

    weaverx_page_tail( 'tag', $sb_layout );    // end of page wrap
?>
