<?php get_header(); ?>
    <section id="primary">
        <div class="content">
            <?php if( have_posts() ) : 
                while ( have_posts() ) : the_post();
                    get_template_part( 'content', 'page' );
                    comments_template( '', TRUE );
                endwhile;
            endif; ?>
        </div>
    </section>
<?php get_sidebar();
get_footer(); ?>