<?php
/**
 * The template part for displaying slider
 * @package Academic Education 
 * @subpackage academic_education
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-wrap">  
    <div class="post-main">
      <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
      <div class="adminbox">        
        <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
        <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
        <span class="entry-date"><i class="far fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
      </div>
      <div class="entry-content"><p><?php the_excerpt();?></p></div>
      <div class="continue-read">
        <a href="<?php the_permalink(); ?>"><span><?php esc_html_e('READ MORE...','academic-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE...','academic-education' );?></span></span></a>
      </div>
    </div>
  </div>
</article>