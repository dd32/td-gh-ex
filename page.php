<?php
/**
 * The template for displaying all pages.
 *
 *
 * @package auckland
 */

get_header(); 

?>

    <div class="page-title-area">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php $thumb_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) ); 
                if( has_post_thumbnail() ): ?>
                    <span class="featured-image" style="<?php if( $thumb_url ) { ?> background-image: url( <?php echo esc_url( $thumb_url ); ?> ); <?php } ?>"></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                while ( have_posts() ) : the_post();

                get_template_part( 'contents/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                endwhile; // End of the loop.
                ?>  
            </div>

            <span class="clearfix"></span>
        </div>
    </div>

<?php get_footer(); ?>