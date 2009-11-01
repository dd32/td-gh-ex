<div class="sidebar">
  <ul>
    <?php if ( !dynamic_sidebar('post') ) : ?>
      
      <?php theme_functions::show_widget( 'post', 'widget_theme_author_info' ); ?>
      <?php theme_functions::show_widget( 'post', 'WP_Widget_Recent_Posts' ); ?>
      <?php theme_functions::show_widget( 'post', 'WP_Widget_Recent_Comments' ); ?>


    <?php EndIf; ?>
  </ul>
</div>