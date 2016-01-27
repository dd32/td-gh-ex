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
<?php wp_head(); 
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
<?php get_search_form(); ?>
</div>
</div>
	<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
        <div class="container">
		<div class="site-branding">
			<?php if(esc_url( get_theme_mod( 'howl-themes_logo' ) )){ ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo esc_url( get_theme_mod( 'howl-themes_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
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
<span><?php _e( 'Breaking', 'aqueduct'); ?></span>
<ul class="newsticker">
<?php
	$recent_postss = new WP_Query( '&posts_per_page=7' );
        while($recent_postss->have_posts()) : $recent_postss->the_post();
		echo '<li><a href="' . get_permalink() . '">' .   get_the_title() .'</a> </li> ';
        endwhile; 
?>
</ul>
</div>
<div class="drag-social-button">
	<ul>
   <?php howlthemes_socialmediafollow(); ?>
</ul>
</div>
<div class="globetoogle"><i class="fa fa-globe"></i></div>
</div>
</div>

	<div id="content" class="site-content">
