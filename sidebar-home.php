<div class="sidebar">
  <ul>
    <?php if ( !dynamic_sidebar('home') ) : ?>

      <?php theme_functions::show_widget( 'home', 'WP_Widget_Pages' ); ?>
      <?php theme_functions::show_widget( 'home', 'WP_Widget_Categories' ); ?>
      <?php theme_functions::show_widget( 'home', 'WP_Widget_Recent_Posts' ); ?>
      <?php theme_functions::show_widget( 'home', 'WP_Widget_Recent_Comments' ); ?>

    <?php EndIf; ?>
  </ul>
</div>