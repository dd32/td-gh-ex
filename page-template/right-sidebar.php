<?php
/**
 * Template Name: Page with Right Sidebar
**/

get_header(); ?>

<?php do_action( 'bb_mobile_application_page_right_header' ); ?>

<div class="container">
    <main role="main" id="maincontent" class="middle-align row">       
		<div class="col-lg-8 col-md-8" class="content-ts">
			<?php while ( have_posts() ) : the_post(); ?>	
                <?php the_post_thumbnail(); ?>
                <h2><?php the_title();?></h2>       		
                <div class="entry-content"><?php the_content(); ?></div>
                
                <?php
                //If comments are open or we have at least one comment, load up the comment template
                	if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="col-lg-4 col-md-4" id="sidebar">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>
        <div class="clear"></div>
    </main>
</div>

<?php do_action( 'bb_mobile_application_page_right_footer' ); ?>

<?php get_footer(); ?>