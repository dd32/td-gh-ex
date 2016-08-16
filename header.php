<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<?php wp_head(); ?> 
</head>
<body  <?php body_class(); ?>>

    <header id="header"  class="header <?php if ( is_admin_bar_showing() ) { echo 'admin_bar_fix';  }?>">
        <div class="wrap">
            <h1 id="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><span class="blogname"><?php esc_html(bloginfo('name')); ?></span></a></h1>
            <nav class="header-nav">
                <button type="button" id="header-nav-btn"><i class="icon-menu"></i><i class="icon-cross"></i></button>
                <!-- Mobile button -->
                <ul>
                <?php 
				
					if ( has_nav_menu( 'header-menu' ) ) {
                    	 wp_nav_menu( array( 'theme_location' => 'header-menu', 'items_wrap' => '%3$s','container' => false  ) );
                  	}
				?>
                <li class="btn"><a href="<?php echo esc_url(wp_login_url(ascreen_get_curPageURL()));?>"><?php _e('Login','ascreen')?></a></li> 
                </ul>
                
            </nav>
        </div>
    </header>