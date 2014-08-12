<?php
/*
 * 404.php
 * The 404 Not Found template. Used when WordPress cannot find a post or page that matches the query. 
 */
get_header(); ?>
            <div id="content" role="main">
            <h1>Oops!</h1>
            </div>
                <aside role="complementary">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <article id="right-sidebar"><?php dynamic_sidebar( 'sidebar-1' ); ?></article>
                <?php endif; ?>
                </aside>
<?php get_footer(); ?>
