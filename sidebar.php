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
	<li><a href="<?php bloginfo('url'); ?>/contact/">Contact</a></li>
<li><a href="<?php bloginfo('url'); ?>/site-map/">Site Map</a></li>
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



<li>

<ul><li style="text-align: center;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="image" src="http://www.samburdge.co.uk/images/donate.jpg" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" />
<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
" />
</form>
</li></ul>

</li>

<?php endif; ?>
</ul>
<br />

</div><!-- end MENU -->
</div><!-- end NAV -->
</div><!-- close MAIN -->
<div class="clearer"></div>
<?php get_footer(); ?>
