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
<article class="page-box-single p-3">
  <h1><?php the_title();?></h1>
  <?php if( get_theme_mod( 'advance_coaching_show_featured_image_single_post',true) != '') { ?>
    <?php 
      if(has_post_thumbnail()) {?>
        <div class="box-image m-0">
          <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
  <?php } ?>
  <div class="new-text">
    <div class="entry-content"><p class="my-3 mx-0"><?php the_content();?></p></div>
    <?php if( get_theme_mod( 'advance_coaching_tags_hide',true) != '') { ?> 
      <div class="tags my-3 mx-0"><p><?php
        if( $tags = get_the_tags() ) {
          echo '<i class="fas fa-tags mr-3"></i>';
          echo '<span class="meta-sep"></span>';
          foreach( $tags as $content_tag ) {
            $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
            echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
          }
        } ?></p>
      </div>
    <?php } ?>
  </div>
  <?php if( get_theme_mod( 'advance_coaching_date_hide',true) != '' || get_theme_mod( 'advance_coaching_author_hide',true) != '' || get_theme_mod( 'advance_coaching_comment_hide',true) != '') { ?>
    <div class="metabox pt-3 px-0 pb-2">
      <?php if( get_theme_mod( 'advance_coaching_date_hide',true) != '') { ?>
        <span class="entry-date"><i class="fa fa-calendar pr-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_coaching_author_hide',true) != '') { ?>
        <span class="entry-author"><i class="fa fa-user pr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_coaching_comment_hide',true) != '') { ?>
        <span class="entry-comments ml-3"><i class="fas fa-comments pr-2"></i><?php comments_number( __('0 Comments','advance-coaching'), __('0 Comments','advance-coaching'), __('% Comments','advance-coaching') ); ?></span>
      <?php } ?>
    </div>
  <?php }?>
  <div class="clearfix"></div>
</article>