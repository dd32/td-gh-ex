<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

<div id="content-wrap">
<div id="content" class="front">
<div class="gap">
  <div class="post">
  <h2><?php _e('Archives by Month:','ayumi') ?></h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>
  <h2><?php _e('Archives by Subject:','ayumi') ?></h2>
  <ul>
    <?php wp_list_categories(); ?>
  </ul>
  </div>

</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
