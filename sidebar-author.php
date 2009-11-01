<div class="sidebar">
  <ul>
    <?php if ( !dynamic_sidebar('author') ) : ?>
      
      <?php theme_functions::show_widget( 'author', 'widget_theme_author_info' ); ?>
      <?php theme_functions::show_widget( 'author', 'WP_Widget_Categories' ); ?>

    <?php EndIf; ?>
  </ul>
</div>