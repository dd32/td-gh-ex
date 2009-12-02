<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!-- Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com) -->

</head>

<body><div><a id="top"></a></div>

<div id="headerbg">
    <div id="header">
        <div class="headerleft">
            <div class="headertext">       
                <?php if (is_home()) { ?>
                <h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
                <?php } else { ?>
                <h4><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h4>
                <?php } ?> 
                <p><?php bloginfo('description'); ?></p>  
            </div>
        </div>
        <div class="headerright">
			<div id="smoothmenu1" class="topnav">
            	<ul >
                	<li><a rel="nofollow" href="<?php echo get_option('home'); ?>"><?php _e("Home", 'studiopress'); ?></a></li>
                	<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>      	
            	</ul>
			</div>        
        </div>
    </div>
</div>

<div id="navbg">
    <div id="nav">
        <div class="navleft">
			<div id="smoothmenu2" class="nav">
            	<ul >
                	<?php wp_list_categories('orderby=name&title_li='); ?>
            	</ul>
       		</div>          
        </div>  
        <div class="navright">
            <a class="rsslink" rel="nofollow" href="<?php bloginfo('rss_url'); ?>"><?php _e("Posts", 'studiopress'); ?></a>
            <a class="rsslink" rel="nofollow" href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e("Comments", 'studiopress'); ?></a>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="wrap">