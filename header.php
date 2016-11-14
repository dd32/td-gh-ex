<?php
/**
 * The header of our theme
 * @package astrology
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<header>
    <div class="header-top" style="<?php if(get_header_image()){ echo "background-image :url(".get_header_image().")"; }?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                <div class="main-menu">                      
                    <nav id='top-menu'>
                        <div class="logo">
                            <?php 
                            $customLogoId = get_theme_mod( 'custom_logo' );
                            $image = wp_get_attachment_url( $customLogoId );
                            if (!has_custom_logo()) { ?>
                                <a href="<?php echo get_site_url(); ?>"><?php bloginfo( 'name' ); ?></a>
                            <?php } 
                            else { ?> <a href="<?php echo get_site_url(); ?>"><img src="<?php echo $image[0]; ?>" class="custom-logo"></a> <?php } ?>
                        </div>
                        <div id="box-top-mobile"></div>
                        <div class="menu">
                            <span class="menu-global menu-top"></span>
                            <span class="menu-global menu-middle"></span>
                            <span class="menu-global menu-bottom"></span>
                        </div>
                        <?php
                            // if (has_nav_menu('primary')) {
                            //     $iCoachProDefaults = array(
                            //     'theme_location' => 'primary',
                            //     'container' => 'none',
                            //     'items_wrap' => '<ul id="primary-menu" class="menu nav-menu" aria-expanded="false">%3$s</ul>',
                            // );
                            //     wp_nav_menu($iCoachProDefaults);                                        
                            // }
                        ?>
                         <?php
                            if (has_nav_menu('primary')) {
                                $astrologyDefaults = array(
                                    'theme_location' => 'primary',
                                    'container'      => 'none', 
                            		'menu_class'	=> 'offside',
                                );
                                wp_nav_menu($astrologyDefaults);                                        
                            } ?>  
            		</nav>
                </div>
                </div>
            </div>
        </div>
    </div>
</header>