<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="shortcut icon" href="" type="image" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php 
	global $options;
	foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } 
		else { $$value['id'] = get_settings( $value['id'] ); } 
	} ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head();?>
</head>
<body>
<div id="headerwrap">
	<table border="0" cellpadding="0" cellspacing="0" id="header">
		<tbody>
			<tr>
				<td class="bloginfo"><strong><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></strong> | <?php bloginfo('description'); ?></td>
				<td class="searchform"><?php include ('searchform.php'); ?></td>
			</tr>
		</tbody>
	</table>
</div>
<div id="contentwrap">
	<div id="content">
			<?php if ($tenpad_bannerimage_toggle=="Use Default") { ?>
				<div id="banner-default">
			<?php } elseif($tenpad_bannerimage_toggle=="Use Custom") { ?>
				<div id="banner-custom">
			<?php } elseif($tenpad_bannerimage_toggle=="Use None") { ?>
				<div id="banner-none">
			<?php } ?></div>