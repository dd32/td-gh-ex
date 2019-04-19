<?php
/**
 * Template part for displaying posts
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blogger">
    <div class="post-image">
      <?php the_post_thumbnail(); ?>
    </div>
    <h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
    <div class="post-info">
      <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"> <?php echo esc_html(get_the_date()); ?></span>
      <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
      <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','aagaz-startup'), __('0 Comments','aagaz-startup'), __('% Comments','aagaz-startup') ); ?></span>
    </div>
    <p><?php the_excerpt();?></p>
    <div class="post-link">
      <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_attr_e( 'READ MORE','aagaz-startup' ); ?></a>
    </div>
  </div>
</div>
