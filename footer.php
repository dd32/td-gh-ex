  <!-- Bottom Box --> 
<div id="bottombox">

<div id="adbox">
<!-- Author Info --> 
<ul>
<li><h4>Author</h4>
			<p>Here you can provide some author or blog infomation.</p>
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


<!-- Archives --> 
<ul>
  <li><h4>Archives</h4>
      <ul>
	 <?php wp_get_archives('type=monthly'); ?>
     </ul>
  </li>
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
 
<!-- Search --> 
<ul>
<li><h4>Search</h4>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
 <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" size="15" />
<input type="submit" id="searchsubmit" value="&raquo;" />
 </form>
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
<a href="http://www.quickonlinetips.com/archives/quickpic/" title="QuickPic">QuickPic</a> theme by <a href="http://www.quickonlinetips.com/" title="Quick Online Tips">Quick Online Tips</a>
 
</p>
</div>
</div>

		<?php wp_footer(); ?>

<!-- QuickPic Wordpress Theme by Quick Online Tips. http://www.quickonlinetips.com/ --> 
</body>
</html>