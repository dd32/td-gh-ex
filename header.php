<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<?php
global $avata_post_meta;
$header_overlay = isset($avata_post_meta['header_overlay'])?$avata_post_meta['header_overlay']:'';
$theme_location = isset($avata_post_meta['nav_menu'])?$avata_post_meta['nav_menu']:'primary';

$header_class   = '';
if($header_overlay == '1')
$header_class   = 'header-overlay';

$header_image = get_header_image();
?>
<body <?php body_class(); ?> >
<div class="top-wrap">
 <?php if( $header_image ):?>
 <img src="<?php echo esc_url($header_image); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
         <?php endif;?>

</div>
<header id="header" class="<?php echo $header_class; ?>">
  <div class="container">
      <div class="logo-box">
      <?php
	  $custom_logo_id = get_theme_mod( 'custom_logo' );
      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      $logo = $image[0];
	  if( $logo ):?>
      <a href="<?php echo esc_url(home_url('/')); ?>"><img class="site-logo normal_logo" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo); ?>" /></a> 
      <?php endif;?>
      
       <div class="name-box">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                            <span class="site-tagline"><?php bloginfo('description'); ?></span>
                        </div>
                        
      </div>
    <nav id="menu" class="site-nav" role="navigation">
       <?php 
	             
				  wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span class="menu-item-label">', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
					?>
    </nav>

  </div>
</header>
