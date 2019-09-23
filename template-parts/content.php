<?php
/**
 * The template part for displaying services
 *
 * @package advance-ecommerce-store
 * @subpackage advance-ecommerce-store
 * @since advance-ecommerce-store 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article class="page-box">
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <div class="metabox">
        <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
        <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>     
        <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-ecommerce-store'), __('0 Comments', 'advance-ecommerce-store'), __('% Comments', 'advance-ecommerce-store') ); ?> </span>
    </div>
    <div class="box-image">
        <?php the_post_thumbnail();?>
    </div>
    <div class="new-text">
        <div class="entry-content"><p><?php the_excerpt();?></p></div>
        <div class="second-border">
            <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'advance-ecommerce-store' ); ?>"><?php esc_html_e('Read More','advance-ecommerce-store'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More', 'advance-ecommerce-store' ); ?></span></a>
        </div>
    </div>
    <div class="clearfix"></div>
</article>