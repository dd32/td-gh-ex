<?php
/**
 * Displaying all pages.
 * @package Academic Education
*/

get_header(); ?>

<?php do_action( 'academic_education_page_header' ); ?>

<div id="main-content" class="container">
    <div class="wrapper">
        <div class="col-md-12">
            <?php while ( have_posts() ) : the_post(); ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                <h3><?php the_title(); ?></h3>
                <?php the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'academic-education' ),
                    'after'  => '</div>',
                ) );
                
                //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>         
        </div>        
        <div class="clear"></div>    
    </div>
</div><!-- container -->

<?php do_action( 'academic_education_page_footer' ); ?>

<?php get_footer(); ?>