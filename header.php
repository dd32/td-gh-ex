<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rev="made" href="http://www.web-strategy.jp/" />


<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 

<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scroll.js"></script>
<style type="text/css">
<!--
* html .post-title-meta .meta-date {;
  filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/day_calendar.png',sizingMethod='scale');
}
-->
</style>
</head>
<body>

<div id="outside">
	<div id="wrapper_page">
		<div id="header" class="clearfix">
			<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1071" height="241">
		  <param name="movie" value="<?php bloginfo('template_directory'); ?>/swf/auroral.swf" />
		  <param name="quality" value="high" />
		  <param name="wmode" value="opaque" />
		  <param name="swfversion" value="6.0.65.0" />
          <param name="wmode" value="transparent" />
		  <!-- This message will display to download the latest version of Flash Player by using since Flash Player 6.0 or 6.5 with this parameter tag.If you do not want to display the message to users, delete the parameter tag. -->
		  <param name="expressinstall" value="<?php bloginfo('template_directory'); ?>/Scripts/expressInstall.swf" />
		  <!-- This object tag is only for browsers except IE. -->
		  <!--[if !IE]>-->
		  <object type="application/x-shockwave-flash" data="<?php bloginfo('template_directory'); ?>/swf/auroral.swf" width="1071" height="241">
		    <!--<![endif]-->
		    <param name="quality" value="high" />
		    <param name="wmode" value="opaque" />
		    <param name="swfversion" value="6.0.65.0" />
		    <param name="expressinstall" value="<?php bloginfo('template_directory'); ?>/Scripts/expressInstall.swf" />
            <param name="wmode" value="transparent" />
		    <!-- Aalternative contents for using the version before Flash Player 6.0.  -->
		    <div>
		      <h4>This contents needs latest version of Flash Player.</h4>
		      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Adobe Flash Player ‚ðŽæ“¾" width="112" height="33" /></a></p>
	        </div>
		    <!--[if !IE]>-->
	      </object>
		  <!--<![endif]-->
		  </object>
			<div id="header_inside">
				<h1 id="site_title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
				<p class="description"><?php bloginfo('description'); ?></p>
			</div>
			<div id="page_list">
				<ul>
					<li class="page_item page-item-1 current_page_item"><a href="<?php echo get_option('home'); ?>/">HOME</a></li>
					<?php wp_list_pages('title_li=&depth=1'); ?> 
				</ul>
			</div>
		</div>

		<div class="clearfix" id="wrapper-main">

