<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package a-portfolio
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <!-- Single blog -->
    <div class="blog">
        <div class="blog-head">
         <?php if(has_post_thumbnail()){
         	the_post_thumbnail(); 
         } ?>
        </div>
        <div class="blog-content">
               <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
            <div class="meta">
                <span><i class="fa fa-user"></i><?php a_portfolio_posted_by();?></span>
                <span><i class="fa fa-calender"></i><?php echo get_the_date( 'd'); ?> <?php echo get_the_date( 'F'); ?> </span>
                <span><i class="fa fa-comments"></i><?php echo esc_html(get_comments_number());?></span>
            </div>
              <?php the_excerpt();?>
                <a href="<?php esc_url(the_permalink()); ?>" class="btn"><?php esc_html_e('Read More','a-portfolio'); ?><i class="fa fa-angle-double-right"></i></a>
        </div>
    </div>
    <!--/ End Single blog -->
</article><!-- #post-<?php the_ID(); ?> -->
