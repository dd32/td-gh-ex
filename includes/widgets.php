<?php
// ==================================================================
// Widget - Sidebar
// ==================================================================
register_sidebar(array(
  'name' => __('Right Widget 1','adelle-theme'),
  'id' => 'right-widget',
  'description' => 'Right side widget area',
  'before_widget' => '<article class="side-widget">',
  'after_widget' => '</article>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
));