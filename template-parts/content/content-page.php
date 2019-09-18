<?php
/**
 * Template part for displaying single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-image thumbnail-image">
            <?php the_post_thumbnail() ?>
        </div><!-- /.post-image -->
    <?php endif; ?>

    <div class="entry-container">
        <?php the_title( '<h1 class="entry-title">', '</h1 >' ); ?>
        <div class="entry-content clearfix">
            <?php
                the_content(
                    sprintf(
                        /* translators: %s: Name of current post */
                        __( '<p> "%s"</p>', 'apex-business' ),
                        get_the_title()
                    )
                );

                wp_link_pages(
                    array(
                        'before'      => '<div class="link-pages-wrap clearfix"><div class="link-pages">' . esc_html__( 'Continue Reading:', 'apex-business' ),
                        'after'       => '</div></div>',
                        'link_before' => '<span class="page-numbers button">',
                        'link_after'  => '</span>',
                    )
                );
            ?>
        </div>
    </div><!-- /.entry-container -->
</div><!-- /.entry-content -->
