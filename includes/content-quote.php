<?php

/*
 * Used for both audio and video post types
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser styled-box'); ?>>
    <?php themeora_post_media( $post->ID, 'themeora-thumbnail-span-8' ); ?>
    
    <div class="quote-content">
        <?php if ( is_single() ) : ?>
            <?php 
            echo the_content(); 
            wp_link_pages('before=<div id="page-links">&after=</div>');
            ?>
        <?php else : ?>
            <a href="<?php the_permalink() ?>"><?php echo the_content(); ?></a>
        <?php endif; ?>
    </div>
</article><!-- end post-teaser -->
