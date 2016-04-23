<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="header-wrapper-<?php if ( is_page_template( 'template-front-page.php' ) ) { echo 'home'; } else { echo 'not-home'; } ?>">
            <div class="container">
                <div class="row">
                    <div class="header">
                        <div class="col-md-4 col-sm-4">
                            <div class="logo">

                                <?php if ( function_exists( 'the_custom_logo' ) ): ?>
                                    <?php the_custom_logo(); ?>
                                <?php else: ?>
                                <?php endif; ?>

                                <?php if(get_theme_mod('site_title_and_tagline') == 1){ ?>
                                    <h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></h1>
                                    <p><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('description'); ?></a></p>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="menu">
                                <div class="mobile-menu">
                                    <span></span>
                                    <i class="fa fa-align-justify" id="open-mobile-menu"></i>
                                </div>
                                <?php bfront_nav(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    

            <!-- menu start here 
            <div class="menu-wrapper">
                <div class="container"></div>
                <div class="row">
                    <div class="menu">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <span></span><i class="fa fa-align-justify" id="open-mobile-menu"></i>
                            </div>
                            <?php //bfront_nav(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="line-height:1em;">
                <img src="<?php //echo get_template_directory_uri() ?>/images/shadow.png" class="slidershadow frontpage-shadow" alt="">
            </div>
            <!-- menu end here -->
            <!-- header end here --> 

            <!-- this code is used for a button that go to top of website -->
        <div class="container">    
            <div class="row">
                <p id="back-top" style="display: block;">
                    <a href="#top"><span><i class="fa fa-angle-up"><span>Back to Top</span></i></span></a>
                </p>
            </div>
        </div>        