<?php
/**
 * The template part for displaying slider
 *
 * @package advance-portfolio
 * @subpackage advance-portfolio
 * @since advance-portfolio 1.0
 */
?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h1><?php the_title();?></h1>
        <div class="entry-attachment">
            <div class="attachment">
                <?php advance_portfolio_the_attached_image(); ?>
            </div>
            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <?php the_excerpt(); ?>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'advance-portfolio' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'advance-portfolio' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>   
    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'advance-portfolio' ),
            ) );
        }   elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'advance-portfolio' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'advance-portfolio' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'advance-portfolio' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'advance-portfolio' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }

    ?>
</article> 