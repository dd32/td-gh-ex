<?php
/**
 * Template for results that cannot be found
 *
 * @package Aplos
 * @since Aplos 1.0.0
 */
?>
 
<article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h1 class="entry-title"><?php _e( 'Nothing Found', 'aplos' ); ?></h1>
    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
 
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'aplos' ), admin_url( 'post-new.php' ) ); ?></p>
 
        <?php elseif ( is_search() ) : ?>
 
            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'aplos' ); ?></p>
            <?php get_search_form(); ?>
 
        <?php else : ?>
 
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'aplos' ); ?></p>
            <?php get_search_form(); ?>
 
        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->