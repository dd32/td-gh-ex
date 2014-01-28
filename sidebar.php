	<div id="sidebar">
<div id="adbox"><!-- /Remove this box for pure 3-columns -->   
<!-- Widgetized sidebar 1 --> 
 <ul>
  <li>
 <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?> 
 </li>
</ul>
</div><!-- /Remove this box for pure 3-columns --> 
<div id="l_sidebar"> 
<!-- Widgetized sidebar 2 --> 
<ul>
  <li>
 <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-2' ); ?>
<?php endif; ?>  
  </li>
</ul>
</div> <!-- /l_sidebar-->
<!-- right_sidebar starts -->
<div id="r_sidebar">
<!-- Widgetized sidebar 3 --> 
<ul>
 <li>
 <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-3' ); ?>
<?php endif; ?> 
 </li> 
</ul>
</div> <!-- /r_sidebar-->
	</div> <!-- /sidebar-->