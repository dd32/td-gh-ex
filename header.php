<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="navbar navbar-inverse " role="navigation">
    <div class="container">
      <?php if ( get_header_image() ) : ?>
      <div id="site-header"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt=""> </a> </div>
      <?php endif; ?>
      <div class="navbar-header">
        <button id="menu-trigger" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>       
         <?php if(has_custom_logo()){
                 the_custom_logo();
           }
            if(display_header_text()) { ?>
				<a  href="<?php echo esc_url(home_url('/')); ?>">
					<h2 class="site-title"><?php bloginfo( 'name' ); ?></h2>
					<h6 class="site-description"><?php bloginfo( 'description' ); ?></h6>
	            </a>	
		 	<?php } ?>
        </div>
      <?php $defaults = array(
			'theme_location'  => 'primary',
			'container'       => 'div',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'items_wrap'      => '<ul id="menu" class="navbar-right menu-ommune">%3$s</ul>',
			'depth'           => 0,
			);
			wp_nav_menu($defaults); ?>
      <!--/.navbar-collapse -->
    </div>
  </div> 
  <!--end / nav--> 
</header>
<!--end / header-->