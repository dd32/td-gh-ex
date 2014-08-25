<?php

/*
 * Used for both audio and video post types
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser styled-box'); ?>>
    <?php 
    //load the post media depending on what kinf of post it is
    themeora_post_media( $post, 'thumbnail-span-8' ); 
    ?>
    
    <div class="quote-content primary-background">
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
