<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Aquaparallax Wraper -->

<div class="aqa-wrap">

<header>

<!-- Aquaparallax Logo Menu Bar -->

<div class="aqa-logo-menu-bar">

<div class="container">

<div class="col-md-3 col-xs-6">

<div class="aqa-logo">
    
<?php if ( function_exists('the_custom_logo') && has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php else : ?>
		    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			<?php endif; ?>

</div>

</div>

<div class="col-md-8">

<div class="aqa-menu">

<div class="custom-nav nav-menu-align">

<nav class="navbar navbar-default">

<?php

wp_nav_menu(
  array(
	'theme_location' => 'header-menu',
	'container' => '',
	'container_class' => '',
	'li_class'   => 'dropdown-submenu-position',
	'container_id' => '',
	'menu_class' => 'main-menu nav nav-bar',
	'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
	'walker' => new WP_Bootstrap_Navwalker()
  )
  );

        ?>
 
</nav>

</div>

</div>

</div>



<?php if( get_theme_mod( 'aquaparallax_search_box' ) == '1') { ?> 

<div class="col-md-1 col-xs-6">

    <div class="codecon_half">

    <div class="expSearchBox">

        <div class="expSearchFrom">
		
		     <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="search-form">

            <input id="field" type="text" placeholder="<?php echo esc_html_e( 'Search here', 'aquaparallax' ); ?>" name="s" />  
           
            <div class="close">

                <span class="front"></span>

                <span class="back"></span></div>

			 </form>	

            </div>   

        </div>

    </div>

    </div>
    <div class="col-xs-12 aqa-mean-menu"></div>



<?php } ?>

</div>

</div>
</header>