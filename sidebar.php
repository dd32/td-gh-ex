	<div id="sidebar">
		
<div id="adbox"><!-- Remove this box for pure 3-columns --> 

<!-- Insert large 336x280 Adsense unit here --> 
<img src="http://farm4.static.flickr.com/3225/2684819307_11eae8f46e_o.jpg" width="336" height="252" alt="Color Bottles" />

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


<!-- Subscribe Links --> 
<ul>
  <li><h4>Subscribe Feed</h4> 
    <ul>
<li>
<a href="http://fusion.google.com/add?feedurl=<?php bloginfo('rss2_url'); ?>"><img src="http://buttons.googlesyndication.com/fusion/add.gif" width="104" height="17" border="0" alt="Add to Google" /></a></li>
  
<li>
<a href="http://www.netvibes.com/subscribe.php?url=<?php bloginfo('rss2_url'); ?>"><img src="http://www.netvibes.com/img/add2netvibes.gif" width="91" height="17" alt="Add to netvibes" style="border:0" /></a></li>

<li>
<a href="http://www.bloglines.com/sub/<?php bloginfo('rss2_url'); ?>">
<img src="http://static.bloglines.com/images/sub_modern11.gif" border="0" alt="Subscribe with Bloglines" /></a></li>

    </ul>
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

<!-- Insert 160x90 Adsense Link Unit Here --> 
<!-- Insert 160x600 WideScrapper Ad Here --> 

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


<!-- Archives --> 
<ul>
  <li><h4>Archives</h4>
      <ul>
	 <?php wp_get_archives('type=monthly'); ?>
     </ul>
  </li>
</ul> 

    <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
 
 <a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" /></a>

</div> <!-- /r_sidebar-->

	</div> <!-- /sidebar-->