<?php
/**
 * The template part for displaying services
 *
 * @package advance-coaching
 * @subpackage advance-coaching
 * @since advance-coaching 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article class="page-box-single">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <?php 
    if(has_post_thumbnail()) {?>
      <div class="box-image">
        <?php the_post_thumbnail(); ?>
      </div>
  <?php } ?>
  <div class="new-text">
    <div class="entry-content"><?php the_content();?></div> 
  </div>
  <div class="metabox">
    <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
    <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
    <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','advance-coaching'), __('0 Comments','advance-coaching'), __('% Comments','advance-coaching') ); ?></span>
  </div>
  <div class="clearfix"></div>
</article>