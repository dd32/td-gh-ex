<?php
/*
 * 404.php
 * The 404 Not Found template. Used when WordPress cannot find a post or page that matches the query. 
 */
get_header(); ?>
            <div id="content-wide" role="main">
                <section class="content-area-left">
                    <article class="entry-lead">
                        <h1><?php _e( 'Oops!', 'betilu' ); ?></h1>
                        <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
                        <p><?php _e( 'Try another search, please.', 'betilu' ); ?></p>
                        <p><?php get_search_form(); ?>
                    </article>
                </section><!-- ends content-left --> 
                    <div id="right-sidebar">
                        <?php get_sidebar(); ?>
                    </div> 
            </div>
<?php get_footer(); ?>
