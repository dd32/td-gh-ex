<?php get_header(); ?>
    <div id="wrapper" class="content">
        <div id="content">
            <?php if( have_posts() ) : 
                while ( have_posts() ) : the_post();
                    get_template_part( 'content', 'page' );
                    comments_template( '', TRUE );
                endwhile;
            endif; ?>
        </div>
    </div>
<?php get_sidebar();
get_footer(); ?>