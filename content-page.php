<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package BestCorporate
 * @since BestCorporate 1.3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <div class="thumbImg">
      <?php if (has_post_thumbnail()){    
	  echo the_post_thumbnail('thumbnail');}
	  ?>
      </a></div>
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>
  </header>
  <!-- .entry-header -->
  <div class="entry-content">
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'best_corporate' ), 'after' => '</div>' ) ); ?>
    <?php edit_post_link( __( 'Edit', 'best_corporate' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
  <!-- .entry-content -->
</article>
<!-- #post-<?php the_ID(); ?> -->
