<?php
/**
 * The template for displaying posts in the Video post format
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
    <?php echo theme_get_first_embed_media($post->ID); ?>
    <header class="entry-header">
        <h2 class="entry-title h4">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
    </header> 
    <section class="entry-content">
        <p>
            <?php
            theme_get_content_theme(107, false);
            ?>
        </p>
    </section>
    <?php theme_post_meta($post); ?>
</article><!-- #post -->