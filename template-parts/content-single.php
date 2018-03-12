<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nnfy
 */
?>

<div class="blog-details-style">
    <div class="blog-part">
        <?php the_post_thumbnail( 'nnfy_blog_img' ); ?>
        <div class="blog-info-details mt-20 entry-content">
            <?php
                the_content( );
                
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', '99fy' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', '99fy' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
            ?>
        </div>
    </div>
</div>