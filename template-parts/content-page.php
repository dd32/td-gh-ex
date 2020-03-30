<?php
/**
 * Template part page content
 *
 * @package Fmi
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if (has_post_thumbnail()) {?> 
  <div class="post-media">
    <?php the_post_thumbnail();?>
  </div>
<?php }?>

  <div class="post-content">
    <div class="entry-header">
      <div class="entry-header-inner">
      <?php the_title( '<h1 class="entry-title">', '</h1>' );?>
      </div>
    </div>
    
      <?php
      $show_comments_counter = get_theme_mod('blog_show_comments_counter', 1);
      if ($show_comments_counter) {
      ?>
      <div class="entry-meta clearfix">
      <?php
      if (! post_password_required() ) {
        if (comments_open()) {
          echo '<span class="comments-link" style="float:none;"><i class="fa fa-comments"></i> <a href="'.get_the_permalink().'#comments">';
          comments_number(esc_html__('No Comments', 'fmi'), esc_html__('1 Comment', 'fmi'), esc_html__('% Comments', 'fmi'));
          echo '</a></span>';
        } else if (get_comments_number()) { 
          echo '<span class="comments-link" style="float:none;"><i class="fa fa-comments"></i> <a href="'.get_the_permalink().'#comments">';
          comments_number('', esc_html__('1 Comment', 'fmi'), esc_html__('% Comments', 'fmi'));
          echo '</a></span>'; 
        }
      }
      ?>
      </div>
      <?php
      }
      ?>

    <div class="entry-content clearfix">
      <?php
        the_content();

        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fmi' ),
          'after'  => '</div>',
        ) );
      ?>
    </div><!-- .entry-content -->

  </div>
</article><!-- #post-<?php the_ID(); ?> -->
