
<?php if ( is_active_sidebar( 'main_sidebar' ) ) : ?>
<?php do_action( 'themingstrap_widgets_before' );?>
<div class="widget-area col-sm-4 col-md-4" id="sidebar">
	<?php do_action( 'themingstrap_widgets' );?>
    <?php dynamic_sidebar( 'main_sidebar' ); ?>
	<?php do_action( 'themingstrap_widgets_end' );?>
</div><!-- #sidebar -->
<?php else : ?>
<div class="widget-area col-sm-4 col-md-4" id="sidebar">

  <aside class="well widget %2$s" id="%1$s">
    <li>
      <h3 class="widget-title">Sidebar</h3>
      <p>Go to widgets and add any widget to "Main Sidebar" to show on this page.</p>
    </li>
  </aside>      

</div>
<?php do_action( 'themingstrap_widgets_after' );?>  
<?php endif; ?>