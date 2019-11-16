<?php
/**
 * The template part for displaying services
 *
 * @package advance-portfolio
 * @subpackage advance-portfolio
 * @since advance-portfolio 1.0
 */
?> 
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article class="page-box">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <?php if( get_theme_mod( 'advance_portfolio_author_hide',true) != '' || get_theme_mod( 'advance_portfolio_date_hide',true) != '' || get_theme_mod( 'advance_portfolio_comment_hide',true) != '') { ?>
    <div class="metabox">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
          <?php if( get_theme_mod( 'advance_portfolio_author_hide',true) != '') { ?>
            <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>
        </div>
        <div class="date-option col-lg-6 col-md-6 col-6">
          <?php if( get_theme_mod( 'advance_portfolio_date_hide',true) != '') { ?>
            <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>  
          <?php } ?>

          <?php if( get_theme_mod( 'advance_portfolio_comment_hide',true) != '') { ?>
            <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-portfolio'), __('0 Comments', 'advance-portfolio'), __('% Comments', 'advance-portfolio') ); ?></span>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php }?>
  <div class="box-image">
   <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo get_post_gallery();
          echo '</div>';
        };
      };
    ?>
  </div>
  <div class="new-text">
    <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_portfolio_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_portfolio_excerpt_number','20')))); ?></p></div>
    <div class="second-border">
      <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'advance-portfolio' ); ?>"><?php echo esc_html(get_theme_mod('advance_portfolio_button_text','Read More'));?><span class="screen-reader-text"><?php esc_html_e( 'Read More','advance-portfolio' );?></span></a>
    </div>
  </div>
  <div class="clearfix"></div>
</article>