<?php 
/* 
Template Name: Full-width Page Template, No Sidebar 
*/ 

get_header(); ?>
    <section id="primary">
        <div class="content">
            <?php while ( have_posts() ) : the_post();
                get_template_part( 'content', 'page' );
                comments_template( '', TRUE );
            endwhile; ?>
        </div>
    </section>
<?php get_footer(); ?>