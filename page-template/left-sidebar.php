<?php
/**
 * Template Name: Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'advance_business_pageleft_header' ); ?>

<main id="maincontent" role="main">
    <div class="container">
        <div class="middle-align row">
        	<div id="sidebar" class="col-lg-4 col-md-4">
        		<?php dynamic_sidebar('sidebar-2'); ?>
        	</div>
            <div class="col-lg-8 col-md-8">
                <?php while ( have_posts() ) : the_post(); ?>
                    <img role="img" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image" >
                    <h1><?php the_title(); ?></h1>
                    <div class="entry-content"><?php the_content();?></div>
                <?php endwhile; // end of the loop. ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </div>
            <div class="clear"></div> 
        </div>   
    </div>
</main>

<?php do_action( 'advance_business_pageleft_footer' ); ?>

<?php get_footer(); ?>