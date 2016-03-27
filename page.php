<?php // The default template for displaying pages ?>

<?php get_header(); ?>

<div class="bnt-container">
    
    <div class="content content-page">
        <main class="site-main" role="main">
        
            <?php 
            // Start the Loop
            if ( have_posts() ) { 
                while ( have_posts() ) { 
                    the_post(); 
                    // Include the page content
                    get_template_part( 'content', 'page' );   					                 
                // End the Loop
                } 
            }
            ?>
    
        </main>
    </div>
    
    <?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>