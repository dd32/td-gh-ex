  <!-- Bottom Box --> 
<div id="bottombox">

<div id="adbox">

<!-- Search --> 
<?php get_search_form(); ?>
  
</div>

<div style="clear:both;"></div>

<div id="boxes">

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


<div style="clear:both;"></div>

</div><!-- /Boxes --> 


 
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