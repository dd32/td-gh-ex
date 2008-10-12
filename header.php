<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?><?php if ( !(is_404()) && (is_single()) or (is_page()) or (is_archive()) ) { ?> | <?php } ?><?php wp_title(''); ?></title>
	<meta name="author" content="http://overhaulindustries.com" />      
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery-1.2.6.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/scripts/unobtrusive.js" type="text/javascript" charset="utf-8"></script>
	<?php /* Begin Customize */ 
		$customOptions = get_option('adept_customOptions'); 
		if ($customOptions == 'on') { 
			$attribute = 'style: "background-color: #' ;
			$hoverColor = $attribute . get_option('Adept_hoverColor') . ';"' ; 
			$sidebarTwo = $attribute . get_option('Adept_sidebarTwo') . ';"' ;
	?><script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			// search button hover 
			$("input#searchsubmit").mouseover( function() { $(this).attr({ <?php echo $hoverColor; ?> }); });
			$("input#searchsubmit").mouseout( function() { $(this).attr({ <?php echo $sidebarTwo; ?> }); });
		});
	</script><?php } else { /* no custom colors */ ?>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			// search button hover 
			$("input#searchsubmit").mouseover( function() { $(this).attr({ style: "background-color: #e81e25;" }); });
			$("input#searchsubmit").mouseout( function() { $(this).attr({ style: "background-color: #f39a2b;" }); });
		});
	</script>
	<?php } /* End Customize */ ?>
	<script type="text/javascript" charset="utf-8">
		var blank = new Image();
		blank.src = "<?php bloginfo('stylesheet_directory'); ?>/img/blank.gif";
	</script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="Default Stylesheet" /><!-- Adept Theme : alpha v1 -->
	<!--[if IE]><style type="text/css">
		@import url("<?php bloginfo('stylesheet_directory'); ?>/css/ie.css");
	</style><![endif]-->
	<?php /* Begin Customize */ if ($customOptions == 'on') { ?><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/custom.php" type="text/css" media="screen" /><?php } /* End Customize */ ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body>
<div id="wrapper"> 
	
	<div id="header" class="container_16">
		
		<div id="logo" class="grid_5 suffix_1 alpha serif">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/pixelhandler_logo.gif" alt="graphic" />&nbsp; &nbsp;
			<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		</div><!-- /#logo -->
		
		<div id="search" class="grid_7">
			<?php include(TEMPLATEPATH . "/searchform.php"); ?>
		</div><!-- /#search -->
		
		<div id="phone" class="grid_3 omega serif">
			<strong><?php $contactInfo = get_option('Adept_contactInfo'); if ($contactInfo != '') { echo $contactInfo; } else { echo('&raquo; contact info'); }?></strong>
		</div><!-- /#phone -->

		<div class="clear">&nbsp;</div>
	</div><!-- /#header -->
	
	<div id="topBar">
		<div id="navArea" class="container_16">
			<div id="navInset" class="grid_16">
				
				<div id="pageTitle" class="grid_6 serif alpha" >
					<?php bloginfo('description'); ?>
				</div><!-- /#pageTitle -->
				
				<div id="topNav" class="grid_10 serif omega" >
					<ul class="tabs">
						<li class="<?php if (is_home()) { echo ' current_page_item'; } else { echo 'page_item'; }?>"><a href="<?php echo get_option('home'); ?>">home</a></li>
						<?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
					</ul>
				</div><!-- /#topNav -->
				
			</div><!-- /#navInset -->
		</div><!-- /#navArea -->
		<div class="clear">&nbsp;</div>	
	</div><!-- /#topBar -->
