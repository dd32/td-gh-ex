<?php
/**
 * Template part for displaying home page content
 *
 * @package WordPress
 * @subpackage adventure_travelling
 * @since 1.0
 * @version 1.2
 */

?>

<div id="main-content" class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>