<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> // <?php bloginfo('description'); ?></title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/print.css" media="print" />
<link rel="start" href="<?php bloginfo('url'); ?>" title="Home" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body <?php if (is_home()) { ?>id="home"<?php } else { ?>id="interior" class="<?php echo $post->post_name; ?>"<?php } ?>>

  <div id="container">
		<div id="header">
			<h1><span><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><?php bloginfo('description'); ?></span></h1>
			<?php include('searchform.php'); ?>
			<a id="rss" href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a>
			<ul id="nav">
		<?php 
        $menupages = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish' AND post_parent = 0 ORDER BY menu_order ASC LIMIT 6");
        $menupagesnumber = count($menupages);
		$menupagescount = 1;
		foreach ($menupages as $menupage) :
        ?>
	        <li><a href="<?php echo get_permalink($menupage->ID); ?>" title="<?php echo $menupage->post_title; ?>"><?php echo $menupage->post_title; ?></a></li>
		<?php endforeach; ?>
			</ul>
		</div>