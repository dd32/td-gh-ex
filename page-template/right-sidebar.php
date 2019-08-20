<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header(); ?>

<?php do_action( 'aagaz_startup_pageright_header' ); ?>

<div class="container">
    <main id="main" role="main" class="wrapper">
        <div class="row">
    		<div class="col-lg-8 col-md-8" id="main-content">

    			<?php while ( have_posts() ) : the_post(); ?>	
                    
                    <h1><?php the_title();?></h1>
                    <img role="img" src="<?php the_post_thumbnail_url(); ?>" >
                    <p><?php the_content();?></p>
                    <?php   
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>
                
            </div>
            <div id="sidebox" class="col-lg-4 col-md-4">
    			<?php dynamic_sidebar('sidebox-2'); ?>
    		</div>
        </div>
        <div class="clearfix"></div>    
    </main>
</div>

<?php do_action( 'aagaz_startup_pageright_footer' ); ?>

<?php get_footer(); ?>