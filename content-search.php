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
        <p>
            <?php
            theme_get_content_theme(198, false);
            ?>
        </p>
    </section>
    <?php theme_post_meta($post); ?>
</article><!-- #post -->