<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package HowlThemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if(get_option('dt_favicon')){ ?>
<link rel="icon" href="<?php echo get_option('dt_favicon')?>">
<?php } ?>
<?php wp_head(); 
echo get_option('dt_custom_head'); 
get_template_part('inc/dragfun/dragtheme', 'css');

?>

</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site">

<div class="drag-navbar">
<div class="container">

                <nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
<div class="searchboxcontainer"><i class="fa fa-search"></i></div>
</div>
</div>
<div class="srchcontainer">
<div class="srchcontainerin">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'howl-themes') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'howl-themes') ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'howl-themes') ?>" />
</form>
</div>
</div>
	<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
        <div class="container">
		<div class="site-branding">
			<?php if(get_option('dt_logo')){ ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo get_option('dt_logo')?>" alt="<?php bloginfo( 'name' ); ?>"/>
            </a>
			<?php } else{?>
			<h2 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
			<h2 class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></h2>
			<?php } ?>
		</div><!-- .site-branding -->
                <nav id="bottom-navigation" class="secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<div class="menu-footer">
		<?php wp_nav_menu( array('container' => false, 'theme_location' => 'secondary') ); ?>
</div>
		</nav>

	</div>	
	</header><!-- #masthead -->

<div class="break-social">
<div class="container">
<div class="newsticker-holder">
<span>Breaking</span>
<ul class="newsticker">
<?php
	$argss = array( 'numberposts' => '7' );
	$recent_postss = wp_get_recent_posts( $argss );
	foreach( $recent_postss as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	}
?>
</ul>
</div>
<div class="drag-social-button">
	<ul>
   <?php socialmediafollow(); ?>
</ul>
</div>
<div class="globetoogle"><i class="fa fa-globe"></i></div>
</div>
</div>
<?php if(get_option('dt_custom_ads_header')){ ?>
<div class="ads-container-head">
	<?php echo stripslashes(get_option('dt_custom_ads_header')) ?>
</div>
<?php } ?>
	<div id="content" class="site-content">
