<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="header-wrapper-<?php if ( is_page_template( 'template-front-page.php' ) ) { echo 'home'; } else { echo 'not-home'; } ?>">
            <div class="container">
                <div class="row">
                    <div class="header">
                        <div class="col-md-4 col-sm-4">
                            <div class="logo">

                                <?php if ( function_exists( 'has_custom_logo' ) ): ?>
                                    <?php the_custom_logo(); ?>
                                <?php else: ?>
                                <?php endif; ?>

                                <h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></h1>
                                <p><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('description'); ?></a></p>

                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="menu">
                                <div class="mobile-menu">
                                    <span></span>
                                    <i class="fa fa-align-justify" id="open-mobile-menu"></i>
                                </div>
                                <?php wp_nav_menu( array( 'theme_location' => 'custom_menu', 'menu_class' => 'sf-menu snip1155', 'menu_id' => 'menu' ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    <!-- header end here --> 

    <!-- this code is used for a button that go to top of website -->
        <div class="container">    
            <div class="row">
                <p id="back-top" style="display: block;">
                    <a href="#top"><span><i class="fa fa-angle-up"><span><?php esc_html_e( 'Back to Top', 'bfront' ); ?></span></i></span></a>
                </p>
            </div>
        </div>        