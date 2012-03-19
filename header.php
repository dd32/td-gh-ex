<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="main-wrapper"> <!-- begin main-wrapper -->
		<div id="wrapper"> <!-- begin wrapper -->
			<div id="header"> <!-- begin header-->
				<div id="logo">
					<?php if(get_header_image()): ?>
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
							<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" class="alignleft"/>
						</a>
					<?php endif; ?>
				</div>
        <div id="title">
          <h1>
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
              <?php bloginfo('name'); ?>
            </a>
          </h1>
          <div id="slogan">
            <h2>
              <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                <?php bloginfo('description'); ?>
              </a>
            </h2>
          </div>
        </div> 
				
				<div id="header-searchform">
					<?php get_search_form(); ?>
				</div>
        <div class="clear"></div>
			</div> <!-- end header -->
			<!-- begin top menu -->
			<?php if ( function_exists( 'wp_nav_menu' ) ) 
			{
				wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_id' => 'main-menu', 'container_class' => 'clear', 'fallback_cb'=>'autoshow_default_primarymenu') );
			}
			else
			{
				primarymenu();
			}?> <!-- end top menu -->