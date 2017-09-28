<?php
/**
 * The template for displaying the header
 *
 * - Includes site description, site logo, tel link and navigation menu.
 * - The header is fixed at the top of the browser if the width of the browser is 768px or less.
 *
 * @package WordPress
 * @since Base For Original 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php wp_head();?>
</head>

<body <?php body_class();?>>

<header>
  <div class="container clearfix">
    <p id="header_description"><?php bloginfo('description');?></p>
    <h1>
      <a href="<?php echo esc_url(home_url());?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/images/header_logo.png" alt="<?php bloginfo('name');?>"></a>
    </h1>
    <div id="header_tel">
      <a href="tel:0120-000-000">0120-000-000</a>
    </div>
    <div id="header_button">
      <span></span>
      <span></span>
      <span></span>
    </div><!-- #header_nav_button -->
  </div><!-- .container -->
  <div class="container">
    <nav>
      <ul>
    <?php wp_nav_menu( array(
      'theme_location'  => 'globalnav',
      'container_class' => 'globalnav clearfix',
      'menu_class'      => 'globalnav clearfix',
    ) ); ?>        <li><a href="<?php echo esc_url(home_url());?>">header-menu-1</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">header-menu-2</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">header-menu-3</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">header-menu-4</a></li>
        <li><a href="<?php echo esc_url(home_url());?>">header-menu-5</a></li>
      </ul>
    </nav>
  </div><!-- .container -->
</header>
