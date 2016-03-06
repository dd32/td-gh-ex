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
$logo = avata_option('default_logo','');
$display_top_bar             = avata_option('display_top_bar');
$top_bar_left_content        = avata_option('top_bar_left_content');
$top_bar_right_content       = avata_option('top_bar_right_content');
$header_image = get_header_image();
?>
<body <?php body_class(); ?> >
<div class="top-wrap">
     <?php if( $header_image ):?>
        <img src="<?php echo esc_url($header_image); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
         <?php endif;?>
<?php if( $display_top_bar == 'yes' ):?>
<section id="top-line">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
       <?php  avata_get_topbar_content( $top_bar_left_content );?>
      </div>
      <div class="col-md-6">
         <?php  avata_get_topbar_content( $top_bar_right_content );?>
      </div>
    </div>
  </div>
</section>
<?php endif;?>
</div>
<header id="header">
  <div class="container">
      <div class="logo">
      <?php if( $logo ):?>
      <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo); ?>" /></a> 
      <?php endif;?>
      
       <div class="name-box">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="site-name"><?php bloginfo('name'); ?></h1></a>
                            <span class="site-tagline"><?php bloginfo('description'); ?></span>
                        </div>
                        
      </div>
    <nav id="menu" class="site-nav" role="navigation">
       <?php 
	             $theme_location = 'primary'; 
				  wp_nav_menu(array('theme_location'=>$theme_location,'depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span class="menu-item-label">', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));
					?>
    </nav>

  </div>
</header>
