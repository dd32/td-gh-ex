<?php
/**
 * The template part for displaying single post
 *
 * @package advance-pet-care
 * @subpackage advance-pet-care
 * @since advance-pet-care 1.0
 */
?> 
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article class="page-box-single">
  <?php if( get_theme_mod( 'advance_pet_care_show_featured_image_single_post',true) != '') { ?>
    <div class="box-img mt-3">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php } ?>
  <div class="new-text">
    <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
    <?php if( get_theme_mod( 'advance_pet_care_date_hide',true) != '' || get_theme_mod( 'advance_pet_care_date_hide',true) != '' || get_theme_mod( 'advance_pet_care_date_hide',true) != '') { ?>
      <div class="metabox pt-3 px-0 pb-2">
        <?php if( get_theme_mod( 'advance_pet_care_date_hide',true) != '') { ?>
          <span class="entry-date py-0 px-2"><i class="fa fa-calendar mr-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_pet_care_metabox_separator_blog_post') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_pet_care_author_hide',true) != '') { ?>
          <span class="entry-author py-0 px-2"><i class="fa fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_pet_care_metabox_separator_blog_post') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_pet_care_comment_hide',true) != '') { ?>
          <span class="entry-comments py-0 px-2"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comment', 'advance-pet-care'), __('0 Comments', 'advance-pet-care'), __('% Comments', 'advance-pet-care') ); ?> </span>
        <?php } ?>
      </div>
    <?php }?>
    <div class="entry-content"><p><?php the_content();?></p></div>
    <?php if( get_theme_mod( 'advance_pet_care_tags_hide',true) != '') { ?>
      <div class="tags my-3 mx-0"><p><?php
      if( $tags = get_the_tags() ) {
        echo '<i class="fas fa-tags"></i>';
        echo '<span class="meta-sep"></span>';
        foreach( $tags as $content_tag ) {
          $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
          echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
        }
      } ?></p></div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>