<div class="sidebar">
  <ul>
    <?php if ( !dynamic_sidebar('page') ) : ?>
      
      <?php theme_functions::show_widget( 'page', 'WP_Widget_Pages' ); ?>
      <?php theme_functions::show_widget( 'page', 'WP_Widget_Links' ); ?>
      <?php theme_functions::show_widget( 'page', 'WP_Widget_Recent_Posts' ); ?>

    <?php EndIf; ?>
  </ul>
</div>