  <!-- Bottom Box --> 
<div id="bottombox">
<div id="adbox">
<!-- Search --> 
<?php get_search_form(); ?>
</div>
<div style="clear:both;"></div>
<div id="boxes">
 <div id="box1">
<!-- Widgetized footer  1 --> 
<ul>
  <li>
 <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
 <?php dynamic_sidebar( 'footer-1' ); ?>
<?php endif; ?> 
  </li>
</ul> 
</div>
<div id="box2"> 
<!-- Widgetized footer 2 --> 
<ul>
  <li>
 <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
 <?php dynamic_sidebar( 'footer-2' ); ?>
<?php endif; ?> 
  </li>
</ul>
</div>
<div style="clear:both;"></div>
</div><!-- /Boxes --> 
</div><!-- /Bottom Box --> 
<div id="footer"> 
<p>
&copy; Copyright <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>.
<br /> 
<a href="http://www.quickonlinethemes.com/wordpress/quickpic/" rel="nofollow" title="QuickPic Theme">QuickPic Theme</a> powered by <a href="http://wordpress.org/">WordPress</a>
 </p>
</div>
</div>
		<?php wp_footer(); ?> 
</body>
</html>