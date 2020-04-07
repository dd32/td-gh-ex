<?php
/**
 * The template part for displaying post prev next section.
 *
 * @package Fmi
 */

$prev_post = get_previous_post();
$next_post = get_next_post();

if ( $prev_post || $next_post ) {
?>
<div class="post-prev-next">
  <?php
  if ( $prev_post ) {
  ?>
  <div class="link-item">
    <div class="link-label"><?php esc_html_e( 'Previous Post', 'fmi' ); ?></div>
    <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
      <h2 class="entry-title"><?php echo $prev_post->post_title; ?></h2>
    </a>
  </div>
  <?php
  }
  ?>

  <?php
  if ( $next_post ) {
  ?>
  <div class="link-item">
    <div class="link-label"><?php esc_html_e( 'Next Post', 'fmi' ); ?></div>
    <a href="<?php echo get_permalink( $next_post->ID ); ?>">
      <h2 class="entry-title"><?php echo $next_post->post_title; ?></h2>
    </a>
  </div>
  <?php
  }
  ?>
</div>
<?php
}
