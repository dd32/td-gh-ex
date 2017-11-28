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
    <h1><a href="<?php echo esc_url(home_url());?>"><?php the_custom_logo();?></a></h1>
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
    <?php wp_nav_menu( array(
      'container_class' => 'nav clearfix',
      'menu_class'=>'clearfix'
    ) ); ?>
  </div><!-- .container -->
</header>
