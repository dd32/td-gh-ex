<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>

<div id="content-wrap">
<div id="content" class="front">
<div class="gap">
  <h2><?php _e('Links:','ayumi') ?></h2>
  <ul>
    <?php get_links_list(); ?>
  </ul>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
