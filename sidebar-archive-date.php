<div class="sidebar">
  <ul>
    <?php if ( !dynamic_sidebar('archive-date') ) : ?>

      <?php theme_functions::show_widget( 'archive-date', 'WP_Widget_Calendar', Array('title' => __('Calendar')) ); ?>
      <?php theme_functions::show_widget( 'archive-date', 'WP_Widget_Archives' ); ?>
      <?php theme_functions::show_widget( 'archive-date', 'WP_Widget_Recent_Posts' ); ?>

    <?php EndIf; ?>
  </ul>
</div>