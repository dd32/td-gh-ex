<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php if ( function_exists('optimal_title') ) { optimal_title('|'); bloginfo('name'); } else { bloginfo('name'); wp_title('|'); } ?>
<?php if ( is_home() ) { ?> | <?php bloginfo('description'); } ?>
</title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body>
<div id="top">
<div id="headr">
<div id="logo">
    <h1><a href="<?php echo get_option('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></h1>
    <div class="description">
      <?php bloginfo('description'); ?>
    </div>
</div>

	<div id="top-rss">
	</div>
	<div id="top-menu">
	<ul id="menuv">
    <li <?php if(is_home()){echo 'class="current_page_item"';} else { echo 'class="page_item"'; }?>><a href="<?php bloginfo('siteurl'); ?>/" title="<?php _e('Home','ayumi') ?>"><?php _e('Home','ayumi') ?></a></li>
    <?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
	<?php wp_register('<li class="admintab">','</li>'); ?>
   </ul>
	</div>
</div>
</div>
<div id="top-img">

</div>
<div id="page">

<hr />
