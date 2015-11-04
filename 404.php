<?php
/**
 *
 * Wortex Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2015 Mathieu Sarrasin - Iceable Media
 *
 * 404 Page Template
 *
 */

get_header();

?><div id="page-title"><div class="container"><h2><?php _e('404: Page Not Found', 'wortex-lite'); ?></h2></div></div><?php

?><div id="main-content" class="container"><div id="page-container" class="with-sidebar"><?php

	?><h2><?php _e('Page Not Found', 'wortex-lite'); ?></h2><?php
	?><p><?php _e('What you are looking for isn\'t here...', 'wortex-lite'); ?></p><?php
	?><p><?php _e('Maybe a search will help ?', 'wortex-lite'); ?></p><?php
	get_search_form();

?></div><?php // End page container

?><div id="sidebar-container"><?php
	get_sidebar();
?></div><?php // End sidebar

?></div><?php
get_footer(); ?>