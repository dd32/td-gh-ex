<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fmi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
    <div class="container">
  		<div class="site-branding clearfix">
  			
        <div class="site-branding-logo">
          <?php the_custom_logo();?>
          <?php if ( !get_theme_mod( 'header_title' )):?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php endif;?>
        </div>

  			<?php if ( !get_theme_mod( 'header_search' )):?>
        <div class="site-branding-search">
            <?php get_search_form(); ?>
        </div>
        <?php endif;?>	

        <button class="menu-toggle navbar-toggle" data-toggle="collapse" data-target="#main-navigation-collapse"><i class="fa fa-bars"></i></button>
  		</div><!-- .site-branding -->
    </div>
	</header><!-- #masthead -->
    
  <div id="site-navigation" class="main-navigation <?php if((is_home())or(is_single())or(is_search())or(is_archive())){echo 'mr';}?>">
    <div class="container">
      <div id="main-navigation-collapse" class="collapse navbar-collapse">
        <?php
          if (has_nav_menu('menu-1')) {
            wp_nav_menu( array(
              'theme_location' => 'menu-1',
              'container' => 'nav',
              'menu_class' => 'nav navbar-nav responsive-nav hidden-md hidden-lg',
            ) );
          }
        ?>
      </div>
      <?php
        if (has_nav_menu('menu-1')) {
          wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'container' => 'nav',
            'menu_class' => 'menu hidden-sm hidden-xs',
          ) );
        }
      ?>
    </div>
  </div><!-- #site-navigation -->

<?php
if(get_theme_mod('activate_slider',0)){
	if(is_front_page()){
?>
		<div class="site-slider">
      <div class="container">
      <?php fmi_slider();?>
      </div>
    </div>
<?php
	}
}
?>

	<div id="content" class="site-content">
    <div class="container">
      <div class="row">