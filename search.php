<?php get_header(); ?>
    <section id="primary">
        <div class="content">
            <?php if( have_posts() ) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'content' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header>
                <?php content_content_nav( 'nav-above' );
                while ( have_posts() ) : the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;
                content_content_nav( 'nav-below' );
                else : ?>
                    <article id="post-0" class="post no-results not-found">
                        <header class="post-header">
                            <h1 class="post-title"><?php _e( 'Nothing Found', 'content' ); ?></h1>
                        </header>
                        <div class="post-content">
                            <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'content' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </article>
            <?php endif; ?>
        </div>
    </section>
<?php get_sidebar();
get_footer(); ?>