<?php /* contentheader.php - this file can be overriden in a childtheme creating a file with the same name*/ ?>

<div id="wrap">
	<div id="accessnav">
		[ <a href="#content"><?php _e('Content','basic2col'); ?></a> | <a href="#sidebar"><?php _e('Sidebar','basic2col'); ?></a> ]
	</div>

	<div id="header">
		<h1><a accesskey="h" href="<?php bloginfo('url'); ?>/">
		<span title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></span></a></h1>

		<p><?php bloginfo('description'); ?></p>
	</div>


	<?php basic2col_navbar(); /*loading navbar.php if it exists*/ ?>


	<div id="content">
