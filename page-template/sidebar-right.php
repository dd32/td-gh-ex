<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header(); ?>

<main id="main" role="main">
    <?php do_action( 'academic_education_pageright_header' ); ?>

    <div class="container">
        <div class="wrapper row">
    		<div class="col-lg-8 col-md-8" class="main-content">
    			<?php while ( have_posts() ) : the_post(); ?>                
                    <h1><?php the_title(); ?></h1>
                     <?php the_post_thumbnail(); ?>
                     <div class="entry-content"><p><?php the_content();?></p></div>
                    <?php
                        if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>            
            </div>
            <div id="sidebar" class="col-lg-4 col-md-4">
    			<?php dynamic_sidebar('sidebar-2'); ?>
    		</div>
            <div class="clearfix"></div>    
        </div>
    </div>

    <?php do_action( 'academic_education_pageright_header' ); ?>
</main>

<?php get_footer(); ?>