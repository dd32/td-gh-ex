<?php if( is_active_sidebar( 'right-widget' ) ) : ?>
<aside class="aside" id="aside" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
  <?php dynamic_sidebar( 'right-widget' ); ?>
</aside><!-- .aside -->
<?php endif; ?>