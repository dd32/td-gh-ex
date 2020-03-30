<?php
/**
 * The template part for displaying page header.
 *
 * @package Fmi
 */

// author page
if ( is_author() ) {
?>
  <header class="page-header">
    <h1 class="page-title"><?php the_archive_title(); ?></h1>
    <?php if ( get_the_author_meta( 'description' ) ) { ?>
    <div class="archive-description"><?php the_author_meta( 'description' ); ?></div>
    <?php }?>
  </header>
<?php
// category/tag page
} else if ( is_category() || is_tag() ) {
?>
  <header class="page-header">
    <h1 class="page-title"><?php the_archive_title(); ?></h1>
    <?php if ( get_the_archive_description() ) { ?>
    <div class="archive-description"><?php the_archive_description(); ?></div>
    <?php }?>
  </header>
<?php
// search results page
} else if ( is_search() ) { 
?>
  <header class="page-header">
    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'fmi' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
  </header>
<?php
// archive page
} else if ( is_archive() ) {
?>
  <header class="page-header">
    <h1 class="page-title"><?php the_archive_title(); ?></h1>
  </header>
<?php
}
