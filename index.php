<?php get_header(); ?>
    <section id="content">
        <?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            rockers_content_nav( 'nav-below' );
        else : ?>
            <article id="post-0" class="post no-results not-found">
                <?php if ( current_user_can( 'edit_posts' ) ) : ?>
                    <header class="post-header">
                        <h1 class="post-title"><?php _e( 'There are not articles.', 'rockers' ); ?></h1>
                    </header>
                    <div class="post-content">
                        <p><?php printf( __( '<a href="%s" title="publish your first article">Publish your first article</a>.', 'rockers' ), admin_url( 'post-new.php' ) ); ?></p>
                    </div>
                <?php else : ?>
                    <header class="post-header">
                        <h1 class="post-title"><?php _e( 'Nothing Found', 'rockers' ); ?></h1>
                    </header>
                    <div class="post-content">
                        <p><?php _e( 'No contents are found, try to do another research using a different term.', 'rockers' ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endif; ?>
    </section>
<?php get_sidebar();
get_footer(); ?>