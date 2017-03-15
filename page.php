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
                <?php the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bb-mobile-application' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bb-mobile-application' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) ); ?>               
            </div>        
            <div class="clear"></div>    
        </div>
    <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    ?>
    </div><!-- container -->
<?php endwhile; // end of the loop. ?>    
<?php get_footer(); ?>