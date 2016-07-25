<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
  	<?php wp_head(); ?>
</head>

<body  <?php body_class(); ?>>
<div class="ct_acool ">
	<header id="ct_header" class="ct_header_class site-header ct_header_class_post_page ">
    <div class="header_box <?php if(acool_get_option( 'ct_acool','box_header_center',0)){echo 'container';}?>" >

        <div class="ct_logo ct_f_left">        
        <?php 
			if ( has_custom_logo() )
			{
				the_custom_logo();
			}else{
		?>       
            <div class="name-box">
                <a href="<?php echo esc_url(home_url('/')); ?>"><h1 class="ct_site_name"><?php echo bloginfo('name');?></h1></a>
                <span class="ct_site_tagline"><?php echo get_bloginfo('description');?></span>
            </div>
		<?php }?>

        </div> <!--logo end-->

        <div id="ct-top-navigation">
            <nav id="top-menu-nav">
            <?php				
				if ( has_nav_menu( 'primary-menu' ) ) {
					 wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => 'nav', 'menu_id' => 'top-menu' ) );
				}
            ?>
            </nav>

            <?php do_action( 'ct_header_top' ); ?>
            
            <div id="ct_top_search">
            <?php 
				if ( acool_get_option( 'ct_acool','show_search_icon',1) )
				{ 
					get_search_form();
				}
			?>
            </div>

        </div> <!-- #ct-top-navigation -->
        
    </div>
	</header>