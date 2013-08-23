<?php get_header(); ?>
    <section id="primary">
        <div class="content">
            <?php if ( have_posts() ) : ?>
                <header class="archive-header">
                    <h1 class="archive-title">
                    <?php if ( is_day() ) : 
                        printf( __( 'Daily Archives: %s', 'content' ), '<span>' . get_the_date() . '</span>');
                        elseif ( is_month() ) : 
                            printf( __( 'Monthly Archives: %s', 'content' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'content' ) ) . '</span>');
                        elseif ( is_year() ) : 
                            printf( __( 'Yearly Archives: %s', 'content' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'content' ) ) . '</span>');
                        else : 
                            _e( 'Archives', 'content' );
                        endif; ?></h1>
                </header>
            <?php while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            content_content_nav( 'nav-below' );
            else : 
                get_template_part( 'content', 'none' );
            endif; ?>
        </div>
    </section>
<?php get_sidebar();
get_footer(); ?>