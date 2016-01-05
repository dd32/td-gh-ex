<?php
/**
 * The template for displaying posts in the Link post format
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
    <section class="entry entry-content">
        <?php the_content(); ?> 
    </section>
    
    <?php theme_post_meta($post); ?>
</article><!-- #post -->

