	<div id="sidebar">
		
<div id="adbox"><!-- Remove this box for pure 3-columns --> 

<!-- Insert large 336x280 Adsense unit here --> 

<img src="http://farm4.static.flickr.com/3225/2684819307_5861c37892.jpg" width="336" height="252" alt="Color Bottles" />

</div><!-- /Remove this box for pure 3-columns --> 
 
 
<div id="l_sidebar">
 
<!-- Insert 160x90 Adsense Link Unit Here --> 
<!-- Insert 160x600 WideScrapper Ad Here --> 

 
<!-- Widgetized sidebar 1 --> 
<ul>
  <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar1') ) : ?>
<?php endif; ?> 
  </li>
</ul>

 

<!-- Blogroll --> 
<ul>
     <?php wp_list_bookmarks('categorize=0&title_before=<h4>&title_after=</h4>'); ?>
 </ul>

<ul>
<li><h4>Meta</h4>
   <ul>
	<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>  
	<?php wp_meta(); ?>
  </ul>
 </li>
</ul>

</div> <!-- /l_sidebar-->
 

<div id="r_sidebar">
 

<!-- Author Info --> 
<ul>
<li><h4>Author</h4>
	<p>Here you can provide some author or blog infomation.</p>
	</li>
</ul>

<!-- Pages --> 
<ul>
<?php wp_list_pages('title_li=<h4>Pages</h4>' ); ?>
</ul>


<!-- Categories --> 
<ul>
     <?php wp_list_categories('show_count=0&title_li=<h4>Categories</h4>'); ?>
</ul>


<!-- Widgetized sidebar 2 --> 
<ul>
 <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar2') ) : ?>
<?php endif; ?> 
 </li> 
</ul>


<!-- Archives --> 
<ul>
  <li><h4>Archives</h4>
      <ul>
	 <?php wp_get_archives('type=monthly'); ?>
     </ul>
  </li>
</ul>  

</div> <!-- /r_sidebar-->

	</div> <!-- /sidebar-->