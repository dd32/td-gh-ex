<?php
/**
 * The template part for displaying single post
 *
 * @package advance-it-company
 * @subpackage advance-it-company
 * @since advance-it-company 1.0
 */
?> 
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>  
<article class="page-box-single">
    <h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
    <div class="box-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="new-text">
        <div class="metabox">
            <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','advance-it-company'), __('0 Comments','advance-it-company'), __('% Comments','advance-it-company') ); ?></span>
            <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
        </div>
        <div class="entry-content"><p><?php the_content();?></p></div>
    </div>
    <div class="clearfix"></div>
</article>