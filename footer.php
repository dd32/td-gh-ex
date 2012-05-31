  <!-- Bottom Box --> 
<div id="bottombox">

<div id="adbox">
<!-- Search --> 
 
<?php get_search_form(); ?>
  
</div>

<table cellpadding="0" cellspacing="2" width="100%" border="0"><tr>

<td valign="top" width="33%">
 <div id="box1">
 
<!-- Widgetized sidebar 1 --> 
<ul>
  <li>
 <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?> 
  </li>
</ul> 

</div>
</td>

<td valign="top" width="33%">
<div id="box2"> 
 
<!-- Widgetized sidebar 2 --> 
<ul>
  <li>
 <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-2' ); ?>
<?php endif; ?> 
  </li>
</ul>
 
</div>
</td>

<td valign="top" width="33%">
<div id="box3">
 
  

<!-- Widgetized sidebar 3 --> 
<ul>
  <li>
<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
 <?php dynamic_sidebar( 'sidebar-3' ); ?>
<?php endif; ?> 
  </li>
</ul>
 
</div>
</td></tr></table>
 
</div><!-- /Bottom Box --> 

<div id="footer"> 
<p>

&copy; Copyright <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All Rights Reserved.
<br /> 
<a href="http://www.quickonlinetips.com/archives/quickpic/" title="QuickPic" rel="nofollow" target="_blank" >QuickPic</a> Design.
 </p>
</div>
</div>
		<?php wp_footer(); ?> 
</body>
</html>