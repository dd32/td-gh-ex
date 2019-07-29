<?php
/**
 * Template part for displaying excepts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="ct-arcive-card">
        <?php if ( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('full') ?>
        <?php endif; ?>

        <div class="ct-archive-content">
            <a href="<?php the_permalink(); ?>"><?php the_title( '<h2>', '</h2>' ); ?></a>

            <p><?php the_excerpt(); ?></p>

            <div class="ct-btn btn-design">
                <a href="<?php the_permalink(); ?>" target="_" ><?php _e( 'Read More', 'apex-business' ) ?></a>
            </div>
        </div>
    </div>
</div>
