<div class="sidebar">
  <ul>
    <?php if ( !dynamic_sidebar('category-tag') ) : ?>
      
      <?php theme_functions::show_widget( 'category-tag', 'WP_Widget_Categories' ); ?>
      <?php theme_functions::show_widget( 'category-tag', 'WP_Widget_Tag_Cloud' ); ?>
      
    <?php EndIf; ?>
  </ul>
</div>
