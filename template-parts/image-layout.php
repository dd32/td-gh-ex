<?php
/**
 * The template part for displaying slider
 *
 * @package advance-coaching
 * @subpackage advance-coaching
 * @since advance-coaching 1.0
 */
?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h1><?php the_title();?></h1>
        <div class="entry-attachment">
            <div class="attachment">
                <?php advance_coaching_the_attached_image(); ?>
            </div>
            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'advance-coaching' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'advance-coaching' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav text-uppercase p-3">Published in</span><span class="post-title my-3 mx-0">%title</span>', 'Parent post link', 'advance-coaching' ),
            ) );
        }   elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav text-uppercase p-3" aria-hidden="true">' . __( 'Next', 'advance-coaching' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'advance-coaching' ) . '</span> ' .
                    '<span class="post-title my-3 mx-0">%title</span>',
                'prev_text' => '<span class="meta-nav text-uppercase p-3" aria-hidden="true">' . __( 'Previous', 'advance-coaching' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'advance-coaching' ) . '</span> ' .
                    '<span class="post-title my-3 mx-0">%title</span>',
            ) );
        }
    ?>
</article>   