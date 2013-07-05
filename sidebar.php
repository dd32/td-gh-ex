	<div id="sidebar">
		
<div id="adbox"><!-- Remove this box for pure 3-columns --> 

<!-- Insert large 336x280 Adsense unit here --> 
 
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
 
<!-- Insert 160x90 Adsense Link Unit Here --> 
<!-- Insert 160x600 WideScrapper Ad Here --> 

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