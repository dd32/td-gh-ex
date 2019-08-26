<?php
/**
 * Template Name:Left Sidebar
 */

get_header(); ?>

<?php do_action( 'automobile_car_dealer_pageleft_top' ); ?>

<main id="maincontent">
    <div class="container">
        <div class="main-wrapper row">       
    		<div id="sidebar" class="col-lg-4 col-md-4">
    			<?php dynamic_sidebar('sidebar-2'); ?>
    		</div>		 
    		<div class="content_box col-lg-8 col-md-8">
                <h1><?php the_title();?></h1> 
    			<?php while ( have_posts() ) : the_post(); ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?> post thumbnail image"/>
                    <?php the_content(); ?>                
                <?php endwhile; // end of the loop. ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || '0' != get_comments_number() ) {
                        comments_template();
                    }
                ?>
            </div>
            <div class="clear"></div>    
        </div>
    </div>
</main>

<?php do_action( 'automobile_car_dealer_pageleft_bottom' ); ?>

<?php get_footer(); ?>