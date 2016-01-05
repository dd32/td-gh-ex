<?php
/**
 * The default template for displaying content
 *
 * Used for  index/archive/search.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */
global $themePageTemplate;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-in-blog post'); ?>>
    <?php theme_post_thumbnail($post, $themePageTemplate); ?>
    <header class="entry-header">
        <h2 class="entry-title h4">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
    </header> 
    <section class="entry entry-content">
        <?php
        the_content(sprintf(
                        __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'artwork-lite'), the_title('<span class="screen-reader-text">', '</span>', false)
        ));
        wp_link_pages(array('before' => '<nav class="navigation paging-navigation wp-paging-navigation"', 'after' => '</nav>', 'link_before' => '', 'link_after' => ''));
        ?>  
    </section>
    <?php theme_post_meta($post); ?>
</article><!-- #post -->