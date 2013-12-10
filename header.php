<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_enqueue_style('autoadjust-style', get_stylesheet_uri(), false, '1.1.1');
wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- CONTAINER -->
<div id="container">
	<div class="row">
		<?php if(has_nav_menu('top-menu', 'autoadjust')) : ?>
            <!-- TOP -->
            <div id="top">
                <div class="container row">
                    <?php wp_nav_menu(array(
                        'container'			=> false,
                        'fallback_cb'		=> false,
                        'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_id'			=> 'top-menu',
						'menu_class'		=> 'horizontal-aligned-menu last col width-100',
                        'theme_location'	=> 'top-menu'
                    )); ?>
                </div>
            </div>
            <!-- TOP END -->
        <?php endif; ?>
    	<!-- HEADER -->
    	<div id="header">
        	<div class="container row">
                <div class="col width-50">
                    <?php autoadjust_get_logo(); ?>
                </div>
                <?php if(is_active_sidebar('header-widgets')) : ?>
                	<div class="last col width-50">
                    	<?php dynamic_sidebar('header-widgets'); ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
        <!-- HEADER END -->