<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
get_favicon();
wp_enqueue_style('theme-style', get_stylesheet_uri(), false, '1.1.0');
if(is_singular()) wp_enqueue_script("comment-reply");
wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
	<?php if(has_nav_menu('top_menu')) : ?>
        <!-- Top -->
        <div id="top">
            <div class="row">
                <div class="col width-100 last">
					<?php wp_nav_menu(array(
                        'theme_location'  => 'top_menu',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => '',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    )); ?>
                </div>
            </div>
        </div>
        <!-- Top end -->
    <?php endif; ?>
	<!-- Header -->
    <div id="header">
    	<div class="row">
        	<div id="logo" class="col width-50">
            	<?php if(get_header_image() != '') : ?>
					<img src="<?php header_image(); ?>"
                    	height="<?php echo get_custom_header()->height; ?>"
                        width="<?php echo get_custom_header()->width; ?>"
                        alt=""
					/>
				<?php elseif(!get_header_image()) : ?>
                    <div class="name"><?php bloginfo('name'); ?></div>
                    <div class="description"><?php bloginfo('description'); ?></div>
				<?php endif; ?>
            </div>
            <div class="col width-50 last">
            	 <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('header_1')) : endif; ?> 
            </div>
        </div>
    </div>
	<!-- Header end -->
