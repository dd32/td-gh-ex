<?php

/*
	Sidebar
	
	Creates the widgetized sidebar of iFeature. 
	
	Copyright (C) 2011 CyberChimps
*/

?>

<div id="sidebar_right">
	<div id="sidebar">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Welcome to iFeature Free</h2>
    	<ul>
						<li>iFeature Free is one of the most advanced free themes available for WordPress. You can easily upgrade to <a href="http://cyberchimps.com/ifeaturepro">iFeature Pro</a> to get even more amazing features such as different color iMenus, more Google Fonts, more Widgetized areas, the iFeature Pro homepage template, and many more.</li>
						<li>&nbsp;</li>
						<li><a href="http://cyberchimps.com/ifeature-pro/"><img class="aligncenter" src="<?php echo get_template_directory_uri(); ?>/images/getifeaturepro.png" alt="Get iFeature Pro"></a></li>
						<li>&nbsp;</li>
						<li>We designed iFeature Free and Pro to be as user friendly as possible, if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">free support forum</a>, and <a href="http://www.cyberchimps.com/ifeature-pro/docs/">precise documentation</a>.</li>
						<li>&nbsp;</li>
						<li>If we were all designers then every WordPress theme would look this good.</li>
						<li>&nbsp;</li>
						<li><small>(To remove this Widget login to your admin account, go to Appearance, then Widgets and drag new widgets into the Sidebar)</small></li>
					</ul>
    	</div>
		
		<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Pages</h2>
    	<?php wp_list_pages('title_li=' ); ?>
    	</div>
    
    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">Archives</h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
        <div class="sidebar-widget-style">
        <h2 class="sidebar-widget-title">Categories</h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">WordPress</h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
    	
    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">Subscribe</h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
    	</ul>
    	</div>
	
	<?php endif; ?>
	</div><!--end sidebar1-->
</div><!--end right_sidebar-->