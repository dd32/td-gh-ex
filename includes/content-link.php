<?php
/*
 * Used for link post types
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser styled-box'); ?>>
    <?php themeora_post_media( $post->ID, 'themeora-thumbnail-span-8' ); ?>
    <div class="content">
        <?php if ( is_single() ) : ?>
            <h1 class="title"><a href="<?php echo esc_url( themeora_get_link_url() ); ?>"><?php the_title(); ?></a></h1>
        <?php else : ?>
            <h2 class="title"><a href="<?php echo esc_url( themeora_get_link_url() ); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
            
        <?php themeora_entry_meta(); ?>
        
        <?php
            if ( is_single() ) {
                the_content();
                wp_link_pages('before=<div id="page-links">&after=</div>');
            }
            else {
                the_excerpt();
            }
        ?>
    </div>
</article><!-- end post-teaser -->