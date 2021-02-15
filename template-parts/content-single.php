<?php
/**
 * The template part for displaying single post
 *
 * @package Advance Automobile
 * @subpackage advance-automobile
 * @since advance-automobile 1.0
 */
?> 
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article class="page-box-single p-3">
  <div class="new-text">
    <h1><?php the_title(); ?></h1>
    <?php if( get_theme_mod( 'advance_automobile_show_featured_image_single_post',true) != '') { ?>
      <div class="box-img">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php } ?>
    <div class="metabox my-3 mx-0 text-left">
      <?php if( get_theme_mod( 'advance_automobile_date_hide',true) != '') { ?>
        <span class="entry-date mr-2"><i class="fa fa-calendar mr-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_automobile_metabox_separator_blog_post') ); ?>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_automobile_author_hide',true) != '') { ?>
        <span class="entry-author mr-2"><i class="fa fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_automobile_metabox_separator_blog_post') ); ?>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_automobile_comment_hide',true) != '') { ?>
        <span class="entry-comments mr-2"><i class="fas fa-comments mr-2"></i><?php comments_number( __('0 Comments','advance-automobile'), __('0 Comments','advance-automobile'), __('% Comments','advance-automobile') ); ?></span>
      <?php } ?>
    </div>
    <div class="entry-content">
      <div class="entry-content"><?php the_content();?></div>
    </div>
    <?php if( get_theme_mod( 'advance_automobile_tags_hide',true) != '') { ?>
      <div class="tags"><p class="text-left"><?php
        if( $tags = get_the_tags() ) {
          echo '<i class="fas fa-tags"></i>';
          echo '<span class="meta-sep"></span>';
          foreach( $tags as $content_tag ) {
            $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
            echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
          }
        } ?></p>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>