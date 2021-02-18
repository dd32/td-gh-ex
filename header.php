<?php
	global $options;
	foreach ($options as $value) {
	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/jd.gallery.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/mootools-1.2.1-core-yc.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/mootools-1.2-more.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jd.gallery.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jd.gallery.set.js"></script>


	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


	<title><?php if (is_home()) {
		echo bloginfo('name');
	} elseif (is_category()) {
		echo __('Category &raquo; ', 'blank'); wp_title('&laquo; @ ', TRUE, 'right');
		echo bloginfo('name');
	} elseif (is_tag()) {
		echo __('Tag &raquo; ', 'blank'); wp_title('&laquo; @ ', TRUE, 'right');
		echo bloginfo('name');
	} elseif (is_search()) {
		echo __('Search results &raquo; ', 'blank');
		echo the_search_query();
		echo '&laquo; @ ';
		echo bloginfo('name');
	} elseif (is_404()) {
		echo '404 '; wp_title(' @ ', TRUE, 'right');
		echo bloginfo('name');
	} else {
		echo wp_title(' @ ', TRUE, 'right');
		echo bloginfo('name');
	} ?></title>

	<!--
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title> -->

	<?php include(TEMPLATEPATH."/custom.php"); ?>

	<?php wp_head(); ?>
