<?php
/*
	Template Name: Front Page
	GREEN EYE Theme's Front Page to Display the Home Page if Selected
	Copyright: 2013, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title() ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_enqueue_style('green-style', get_stylesheet_uri(), false ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<div id="header-fpage"><div class="header-content">
<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="site-logol" src="<?php header_image(); ?>"/></a>
                
        <h1 class="site-title-hidden"><?php bloginfo( 'name' ); ?></h1>
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
        
        <div id="social">
		<?php  if (of_get_option('gplus-link', '#') !='') : ?>
		<a href="<?php echo of_get_option('gplus-link', '#'); ?>" class="gplus-link" target="_blank"></a>
		<?php  endif; if (of_get_option('li-link', '#') !='') : ?>
		<a href="<?php echo of_get_option('li-link', '#'); ?>" class="li-link" target="_blank"></a>
		<?php  endif; if (of_get_option('feed-link', '#') !='') : ?>
		<a href="<?php echo of_get_option('feed-link', '#'); ?>" class="feed-link" target="_blank"></a>
		<?php  endif; ?>
		</div>
        
        <?php get_search_form(); ?>	
        
      
</div></div>                
<div class="clear"> </div>        
        <!-- Slide Goes Here -->
 
	<div id="iebanner"><div id="iebcontent">
    <div id="iefc">
    <h3 class="ibcon"><?php echo of_get_option ( 'slide-image1-title', 'This is a Test Image Title'); ?></h3>
    <p class="ibcon"><?php echo of_get_option('slide-image1-caption', 'This is a Test Image for GREEN EYE Theme. If you feel any problem please contact with D5 Creation.'); ?></p>
    <?php if (of_get_option('slide-image1-link', '#')): ?><a class="jms-link" href="<?php echo of_get_option('slide-image1-link', '#'); ?>">Read more</a><?php endif; ?>
    </div><div id="iesc">
    <img class="ibcon" src="<?php echo of_get_option('slide-image1', get_template_directory_uri() . '/images/slide-image/1.png'); ?>" />
    </div></div></div>	

<div id ="header" class="large">
      <div class ="header-content">
		<nav id="green-main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'm-menu', 'fallback_cb' => 'green_page_menu'  )); ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
      
      <div id="container">
<h1 id="heading"><?php echo of_get_option('heading_text', 'Welcome to the World of Creativity!'); ?></h1>
<p class="heading-desc"><?php echo of_get_option('heading_des', 'WordPress is web software you can use to create a <a href="#">beautiful website or blog</a>. We like to say that <a href="http://wordpress.org/">WordPress</a> is both free and priceless at the same time.'); ?></p>

<?php get_template_part( 'featured-box' ); get_template_part( 'blog' ); ?> 

<div class="content-ver-sep"></div>


<div class="fpage-quote">
<div class="customers-comment">
<ul><li> <?php echo '<q>' . of_get_option('bottom-quotation1', 'All the developers of D5 Creation have come from the disadvantaged part or group of the society. All have established themselves after a long and hard struggle in their life ----- D5 Creation Team') . '</q>'; ?></li></ul>
</div></div>

<?php get_footer(); ?>