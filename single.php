<?php get_header(); ?>
    <div id="wrapper" class="content">
        <?php if( have_posts() ) : 
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() ); ?>
                <nav class="nav-single">
                    <ul>
                        <h3 class="accessibility"><?php _e( 'Post navigation', 'content' ); ?></h3>
                        <li class="prev-link"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'content' ) . '</span> %title' ); ?></li>
                        <li class="next-link"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'content' ) . '</span>' ); ?></li>
                    </ul>
                </nav>
                <?php comments_template( '', TRUE );
            endwhile;
        endif; ?>
    </div>
<?php get_sidebar();
get_footer(); ?>