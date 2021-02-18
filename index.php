<?php get_header(); ?>
    <div class="blog-content">
        <div id="content">
        <?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            arzine_content_nav( 'nav-below' );
        else : ?>
            <article id="post-0" class="post no-results not-found">
            <?php if ( current_user_can( 'edit_posts' ) ) : ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'No posts to display', 'arzine' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'arzine' ), admin_url( 'post-new.php' ) ); ?></p>
                </div>
            <?php else : ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'arzine' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'arzine' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
            </article>
        <?php endif; ?>
        </div>
    </div>
<?php get_sidebar();
get_footer(); ?>