<div class="sidebar">
  <ul>
    <?php if ( !dynamic_sidebar('search-404') ) : ?>      
      
      <?php theme_functions::show_widget( 'search-404', 'widget_theme_featured_posts' ); ?>
      <?php theme_functions::show_widget( 'search-404', 'WP_Widget_Recent_Posts' ); ?>
      <?php theme_functions::show_widget( 'search-404', 'WP_Widget_Recent_Comments' ); ?>
      
      

    <?php EndIf; ?>
  </ul>
</div>