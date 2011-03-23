  <!-- Bottom Box --> 
<div id="bottombox">

<div id="adbox">
<!-- Search --> 
<ul>
<li>
<?php get_search_form(); ?>
 </li>
</ul>

</div>

<table cellpadding="0" cellspacing="2" border="0"><tr><td valign="top" width="30%">
 <div id="box1">

<!-- Pages --> 
<ul>
<?php wp_list_pages('title_li=<h4>Pages</h4>' ); ?>
</ul>

<!-- Widgetized sidebar 1 --> 
<ul>
  <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar1') ) : ?>
<?php endif; ?> 
  </li>
</ul> 

</div>
</td>

<td valign="top" width="30%">
<div id="box2"> 

<!-- Categories --> 
<ul>
     <?php wp_list_categories('show_count=1&title_li=<h4>Categories</h4>'); ?>
</ul>


<!-- Widgetized sidebar 2 --> 
<ul>
  <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar2') ) : ?>
<?php endif; ?> 
  </li>
</ul>
 

</div>
</td>

<td valign="top" width="30%">
<div id="box3">
 



<!-- Archives --> 
<ul>
  <li><h4>Archives</h4>
      <ul>
	 <?php wp_get_archives('type=monthly'); ?>
     </ul>
  </li>
</ul> 


<!-- Meta --> 
 <ul>
<li><h4>Meta</h4>
   <ul>
	<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>  
	<?php wp_meta(); ?>
  </ul>
 </li>
</ul>

<!-- Widgetized sidebar 3 --> 
<ul>
  <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar3') ) : ?>
<?php endif; ?>
  </li>
</ul>
 
</div>
</td></tr></table>
 

</div><!-- /Bottom Box --> 

<div id="footer"> 
<p>

Copyright <?php echo date('Y'); ?>. <?php bloginfo('name'); ?>. All Rights Reserved.

<br />
<!-- Released under GPL compatible license --> 
Powered by <a href="http://www.quickonlinetips.com/archives/quickpic/" title="QuickPic" rel="nofollow" >QuickPic Theme</a>
 
 
</p>
</div>
</div>

		<?php wp_footer(); ?> 
</body>
</html>