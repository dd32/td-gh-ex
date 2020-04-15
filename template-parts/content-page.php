<?php
/**
 * Template part page content
 *
 * @package Fmi
 */

?>
<article <?php post_class( 'entry' ); ?>>

    <?php
    if ( has_post_thumbnail() ) {
    ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail();?>
    </div>
    <?php
    }
    ?>

  <div class="post-content">

      <div class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </div>
    
      <?php
      $page_comments = get_theme_mod( 'page_comments', 1 );
      if ( $page_comments ) {
      ?>
      <div class="entry-meta">
        <div class="entry-meta-inner">
          <?php
          if ( $page_comments ) { vs_get_meta_comments(); }
          ?>
        </div>
      </div>
      <?php
      }
      ?>

      <?php do_action( 'vs_page_content_start' ); ?>
      <div class="entry-content">
        <?php
        the_content();
        ?>
      </div>
      <?php do_action( 'vs_page_content_end' ); ?>

  </div>
</article>
