<?php
/**
 * The default template for displaying content
 *
 * Used for single post.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <?php theme_post_thumbnail($post, 'single.php'); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
                <header class="entry-header">
                    <?php
                    the_title('<h2 class="entry-title h4">', '</h2>', true);
                    ?> 
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages(array('before' => '<nav class="navigation paging-navigation wp-paging-navigation">', 'after' => '</nav>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
                </div><!-- .entry-content -->
            </div>
        </div>
    </div>
    <footer class="entry-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
                    <?php comments_template(); ?>
                </div>
            </div>
        </div>
        <?php
        theme_related_posts();
        ?>
    </footer><!-- .entry-meta -->
</article><!-- #post -->