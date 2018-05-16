<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package bb wedding bliss
 */

get_header(); ?>

<?php do_action( 'bb_wedding_bliss_header_page' ); ?>

<div class="container">
    <div class="middle-align row">    
        <div id="content-ts" >
            <?php while ( have_posts() ) : the_post(); ?>        
                <h1><?php the_title();?></h1>
                <img src="<?php the_post_thumbnail_url(); ?>" width="100%">
                <?php the_content();
                
                //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'bb_wedding_bliss_footer_page' ); ?>

<?php get_footer(); ?>