<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package BB Mobile Application
 */

get_header(); ?>

<?php 
while ( have_posts() ) : the_post(); ?>
    <div class="title-box">
    	<div class="container">
    		<h1><?php the_title();?></h1>		
    	</div>
    </div>

    <div id="content-vw" class="container">
        <div class="middle-align">       
    		<div class="col-md-12">
                <?php the_content(); ?>                       
            </div>        
            <div class="clear"></div>    
        </div>
    </div><!-- container -->
<?php endwhile; // end of the loop. ?>    
<?php get_footer(); ?>