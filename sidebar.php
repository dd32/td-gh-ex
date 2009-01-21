<!-- SIDEBAR LINKS -->
<div id="menu">
<div id="nav">
<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>


<!-- MAIN CONSOLE -->
<li id="admin"><h3>Control Panel</h3>
 <ul>	
	<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
	<li><a href="<?php bloginfo('rss_url'); ?>">RSS Feed</a> <a href="<?php bloginfo('rss_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss_blue.png" alt="RSS Feed" /></a></li>
	
	</ul>

</li><li class="dotted_line">&nbsp;</li>


<!-- SEARCH THE SITE -->
<li id="search"><h3 style="padding-bottom: 5px;">Search</h3>
	<ul style="padding-left:0px; margin-left: 0px;">
	<li style="padding-left:0px; margin-left: 0px; text-align: left;">
	<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div>
	<input type="text" name="s" id="s" size="15" style="padding-left:0px; margin-left: 0px;" /> <input style="cursor: pointer; padding: 0px; margin: 0px;" type="submit" value="<?php _e('Go &raquo;'); ?>" />
	</div>
	</form>
	</li><li style="margin-top: 5px; font-size: 0.8em;"><a href="<?php bloginfo('home'); ?>/advanced-search/">Advanced Search &raquo;</a></li>
	</ul>
</li><li class="dotted_line">&nbsp;</li>




<!-- AK COMP THEME SWITCHER -->
<?php if (function_exists('wp_theme_switcher')) { ?>
<li id="skins"><h3>Themes</h3>
<?php wp_theme_switcher(); ?>
</li><li class="dotted_line">&nbsp;</li>
<?php } ?>

<!-- RECENT ENTRIES -->
<?php if (function_exists('wp_get_archives')) { ?>
<li id="recent-entries"><h3>Recent Entries</h3>
	<ul>
		<?php wp_get_archives('type=postbypost&limit=5&format=custom&before=<li>&after=</li>'); ?>
	</ul>
</li><li class="dotted_line">&nbsp;</li>
<?php } ?>

<!-- RECENT COMMENTS -->
<?php if (function_exists('get_recent_comments')) { ?>
   <li><h3><?php _e('Recent Comments'); ?></h3>
   <ul><?php get_recent_comments(); ?></ul>
   </li><li class="dotted_line">&nbsp;</li>
<?php } ?>


<!-- DATE-BASED ARCHIVES -->
<li id="archives"><h3>Archives</h3>
   <ul>
<?php wp_get_archives(); ?>

</ul>
</li><li class="dotted_line">&nbsp;</li>

<!-- CATEGORY ARCHIVES -->
<li id="categories"><h3>Categories</h3>
   <ul>
<?php
wp_list_categories('title_li=&orderby=name&show_count=1
&feed_image='.get_bloginfo('template_directory').'/images/rss_blue.png'); ?>
</ul>
</li><li class="dotted_line">&nbsp;</li>

<!-- LINKS -->
<li id="links"><h3>Links</h3>
   <ul>
<?php wp_list_bookmarks('title_li=&categorize=0&category=2&before=<li>&after=</li>&show_images=0&show_description=0&orderby=name'); ?>
</ul>
</li><li class="dotted_line">&nbsp;</li>

<!-- TAGS -->
<?php if (function_exists('all_keywords')) { ?>
   <li><h3><?php _e('Tags'); ?></h3>
   <ul><li><?php all_keywords('<a href="'.get_bloginfo('url').'/search/%keylink%">%keyword%</a>, '); ?></li></ul>
   </li><li class="dotted_line">&nbsp;</li>
<?php } ?>

<!-- ADMIN CONSOLE -->
<li id="meta"><h3>Admin</h3>
 	<ul><li><a href="<?php bloginfo('home'); ?>/site-stats/">Site Stats</a></li>
<li><a href="<?php bloginfo('home'); ?>/list-plugins/">List Plugins</a></li>
		<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>
	</ul>
</li>
<li class="dotted_line">&nbsp;</li>



<?php endif; ?>
</ul>
<br />

</div><!-- end MENU -->
</div><!-- end NAV -->
</div><!-- close MAIN -->
<div class="clearer"></div>
<?php get_footer(); ?>
