<?php $arjunaOptions = arjuna_get_options(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php
if (is_home ()) { bloginfo('name'); echo " - "; bloginfo('description'); }
elseif (is_category() || is_tag()) {single_cat_title(); arjuna_get_appendToPageTitle(); }
elseif (is_single() || is_page()) {single_post_title(); arjuna_get_appendToPageTitle(); }
elseif (is_search()) {_e('Search Results:', 'Arjuna'); echo " ".wp_specialchars($s); arjuna_get_appendToPageTitle(); }
else { echo trim(wp_title(' ',false)); arjuna_get_appendToPageTitle(); }
?></title>
<?php if(is_home()): ?><link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" /><?php endif; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php wp_enqueue_script('jquery'); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/default.js"></script>
<!--[if lte IE 7]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" type="text/css" media="screen" /><![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ie6.js"></script>
<![endif]-->
<?php print arjuna_get_custom_CSS(); ?>
</head>

<?php
$bodyClasses = array();
if(!$arjunaOptions['headerMenus_enableJavaScript'])
	$bodyClasses[] = 'menusNoJS';
if(!$arjunaOptions['headerMenu1_show'])
	$bodyClasses[] = 'hideHeaderMenu1';
if($arjunaOptions['background_style'])
	$bodyClasses[] = $arjunaOptions['background_style'];
else
	$bodyClasses[] = 'buttonStyle_'.$arjunaOptions['solidBackground_buttonStyle'];
?>
<body class="<?php print implode(' ', $bodyClasses); ?>"<?php if(!$arjunaOptions['background_style']) print ' style="background-color:'.$arjunaOptions['background_color'].'"'; ?>><a name="top"></a><a id="skipToPosts" href="#content"><?php _e('Skip to posts', 'Arjuna'); ?></a>
<?php if($arjunaOptions['miscellaneous_IE6Notice']): ?>
<!--[if lte IE 6]>
<div class="IENotice"><?php _e('This browser is outdated. Please <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">upgrade</a> your browser to enjoy this website to its fullest extent.', 'Arjuna'); ?></div>
<![endif]-->
<?php endif; ?>
<div class="pageContainer">
	<div class="headerBG"></div>
	<div class="header">
		<?php if($arjunaOptions['headerMenu1_show']): ?>
		<div class="headerMenu1<?php if($arjunaOptions['headerMenu1_alignment']=='left'): ?> headerMenu1L<?php endif; ?>">
			<ul id="headerMenu1"><?php
				if ($arjunaOptions['headerMenu1_display']=='pages') {
					wp_list_pages('sort_column='.$arjunaOptions['headerMenu1_sortBy'].'&sort_order='.$arjunaOptions['headerMenu1_sortOrder'].'&title_li=&exclude='.arjuna_parseExcludes($arjunaOptions['headerMenu1_exclude_pages'], 'page').'&depth='.$arjunaOptions['headerMenu1_dropdown']);
				} elseif ($arjunaOptions['headerMenu1_display']=='categories') {
					wp_list_categories('orderby='.$arjunaOptions['headerMenu1_sortBy'].'&order='.$arjunaOptions['headerMenu1_sortOrder'].'&title_li=&exclude='.arjuna_parseExcludes($arjunaOptions['headerMenu1_exclude_categories'], 'category').'&depth='.$arjunaOptions['headerMenu1_dropdown']);
				}
			?></ul>
			<span class="clear"></span>
		</div>
		<?php endif; ?>
		<?php
		if ($arjunaOptions['headerImage'])
			$tmp = ' header_'.$arjunaOptions['headerImage'];
		else $tmp = ' header_lightBlue';
		?>
		<div class="headerMain<?php print $tmp; ?>">
			<?php if($arjunaOptions['headerLogo']): ?>
				<a href="<?php bloginfo('url'); ?>"><img src="<?php print $arjunaOptions['headerLogo']; ?>" height="<?php print $arjunaOptions['headerLogo_height']; ?>" width="<?php print $arjunaOptions['headerLogo_width']; ?>" style="position:absolute;top:50%;margin:-<?php print ceil($arjunaOptions['headerLogo_height']/2); ?>px 0 0 20px;" /></a>
			<?php else: ?>
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<span><?php bloginfo('description'); ?></span>
			<?php endif; ?>
			
			<div class="headerSearch">
				<form method="get" action="<?php bloginfo('url'); ?>/">
					<input type="text" class="searchQuery searchQueryIA" id="searchQuery" value="<?php _e('Search here...', 'Arjuna'); ?>" name="s" />
					<input type="submit" class="searchButton" value="<?php _e('Find', 'Arjuna'); ?>" />
				</form>
			</div>
		</div>
		<?php if($arjunaOptions['headerMenu2_show']): ?>
		<div class="headerMenu2<?php if($arjunaOptions['headerMenu2_displaySeparators']): ?> headerMenu2DS<?php endif; ?>"><span class="helper"></span>
			<ul id="headerMenu2">
				<?php if($arjunaOptions['headerMenu2_displayHomeButton']): ?><li><a href="<?php (function_exists('icl_get_home_url'))?(print icl_get_home_url()):(bloginfo('url')) ?>" class="homeIcon"><?php _e('Home','Arjuna'); ?></a></li><?php endif; ?><?php
					if ($arjunaOptions['headerMenu2_display']=='pages') {
						wp_list_pages('sort_column='.$arjunaOptions['headerMenu2_sortBy'].'&sort_order='.$arjunaOptions['headerMenu2_sortOrder'].'&title_li=&exclude='.arjuna_parseExcludes($arjunaOptions['headerMenu2_exclude_pages'], 'page').'&depth='.$arjunaOptions['headerMenu2_dropdown']);
					} elseif ($arjunaOptions['headerMenu2_display']=='categories') {
						wp_list_categories('orderby='.$arjunaOptions['headerMenu2_sortBy'].'&order='.$arjunaOptions['headerMenu2_sortOrder'].'&title_li=&exclude='.arjuna_parseExcludes($arjunaOptions['headerMenu2_exclude_categories'], 'category').'&depth='.$arjunaOptions['headerMenu2_dropdown']);
					}
				?>
			</ul>
			<span class="clear"></span>
		</div>
		<?php else: ?>
		<div class="noHeaderMenu2"></div>
		<?php endif; ?>
	</div>

	<div class="contentWrapper<?php
		//Sidebar
		if ($arjunaOptions['sidebarDisplay']=='none') {
			print ' NS';
		} elseif ($arjunaOptions['sidebarDisplay']=='right') {
			if ($arjunaOptions['sidebarWidth']=='small') print ' RSSW';
			elseif ($arjunaOptions['sidebarWidth']=='large') print ' RSLW';
		} elseif ($arjunaOptions['sidebarDisplay']=='left') {
			if ($arjunaOptions['sidebarWidth']=='small') print ' LSSW';
			elseif ($arjunaOptions['sidebarWidth']=='large') print ' LSLW';
			else print ' LSNW';
		}
	?>">
		<a name="content"></a>
		


