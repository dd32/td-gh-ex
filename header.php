<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php wp_head(); ?> 
</head>

<body  <?php body_class(); ?>>
<div class="ct_acool ">
	<header id="ct_header" class="ct_header_class site-header ct_header_class_post_page fixed">
    <div class="header_box <?php if(ct_get_option( 'ct_acool','box_header_center' )){echo 'container';}?>">
		
        <div class="ct_logo ct_f_left">
        
        <?php if ( of_get_option('logo')!="") { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(of_get_option('logo')); ?>" class="site-logo" alt="<?php bloginfo('name'); ?>" />
            </a>
        <?php } else{?>
            <div class="name-box">
                <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="ct_site_name"><?php bloginfo('name'); ?></h1></a>
                <?php if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() ){?>
                <span class="ct_site_tagline"><?php echo  get_bloginfo( 'description' );?></span>
                <?php }?>
            </div>
		<?php }?>       

                
        </div> <!--logo end-->

        <div id="ct-top-navigation">
            <nav id="top-menu-nav">
            <?php
                $menuClass = 'nav';
                $primaryNav = '';
                $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false ) );
                if ( '' == $primaryNav ) :
					//echo wp_nav_menu( array('container' => '','menu_class' => 'nav-no', 'menu_id' => 'top-menu' ));					
                else :
                    echo( $primaryNav );
                endif;
            ?>
            </nav>

	
    <?php //if (get_option( 'header_textcolor' ) ){echo '124';}?>
    

            <?php if ( 0 != ct_get_option( 'ct_acool','show_search_icon' ) ) :  //?>
            
            <div id="ct_top_search">
                <span id="ct_search_icon"></span>
                <form role="search" method="get" class="ct-search-form ct-hidden" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                    printf( '<input type="search" class="ct-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
                        esc_attr_x( 'Search &hellip;', 'placeholder', 'Acool' ),
                        get_search_query(),
                        esc_attr_x( 'Search for:', 'label', 'Acool' )
                    );
                ?>
                </form>
            </div>
            <?php  endif; // true === ct_get_option( 'show_search_icon', false ) ?>

            <?php do_action( 'ct_header_top' ); ?>


        </div> <!-- #ct-top-navigation -->
        
        </div>

	</header>