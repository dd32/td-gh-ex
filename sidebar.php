	<div id="sidebar">

<div id="header">		
<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>

</div>


<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" size="30" />
<input type="submit" id="searchsubmit" value="Search" class="formbutton" />
</div>
</form>

<br />

<a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="XML, RSS"  style="vertical-align:middle;border:0;" /> Subscribe Feed (RSS)</a>

&nbsp;

<a href="<?php bloginfo('comments_rss2_url'); ?>" rel="alternate" type="application/rss+xml" ><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="XML, RSS" style="vertical-align:middle;border:0;" /> Comments Feed</a>

<br />
<br />
 

<!-- Author Info --> 
<ul>
<li><h4>Author</h4>
	<p>Some author or blog infomation.</p>
	</li>
</ul>

<!-- Widgetized sidebar 1 --> 
<ul>
  <li>
  <?php if ( !function_exists('dynamic_sidebar') 
        || !dynamic_sidebar('sidebar1') ) : ?>
<?php endif; ?> 
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

 

<!-- Archives --> 
<ul>
  <li><h4>Archives</h4>
      <ul>
	 <?php wp_get_archives('type=monthly'); ?>
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
	</div> <!-- /sidebar-->