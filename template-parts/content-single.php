<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beka
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
        if(has_post_thumbnail()){ ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="featured-thumbnail">
                <?php the_post_thumbnail('featured'); ?>
            </a>
    <?php }
    ?>
    <div class="post-content">
        <span class="post-cats"><?php the_category(', '); ?></span>
        <header class="entry-header clearfix">
            <?php
                if ( is_single() ) {
                    the_title( '<h1 class="entry-title">', '</h1>' );
                } else {
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                }
            
            if ( 'post' === get_post_type() ) : 
            ?>
            <div class="entry-meta">
                <?php beka_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
            endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beka' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <div class="share-buttons">
                <h1>Share This Post :</h1>
                <a href="#"><span class="fa fa-facebook"></span></a>
                <a href="#"><span class="fa fa-twitter"></span></a>
                <a href="#"><span class="fa fa-tumblr"></span></a>
                <a href="#"><span class="fa fa-google-plus"></span></a>
                <a href="#"><span class="fa fa-instagram"></span></a>
            </div>
        </footer><!-- .entry-footer -->
    </div><!-- .post-content -->
</article><!-- #post-## -->
