<?php
/**
 * The template for displaying the footer
 *
 * @package Bfront
 */

?>

        <!--foter sidebar start here --> 
        <div class="footer-sidebar-wrapper">
            <div class="container">
            <div class="row">
                <div class="col-md-3 first">
                    <div class="fsidebar wow fadeInLeft" data-wow-offset="10"  >
                        <?php if (is_active_sidebar('first-footer-widget')) : ?>
                            <?php dynamic_sidebar('first-footer-widget'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>    
                </div>
                    
                <div class="col-md-3 second">
                    <div class="fsidebar wow fadeInLeft" data-wow-offset="10"  >
                        <?php if (is_active_sidebar('second-footer-widget')) : ?>
                            <?php dynamic_sidebar('second-footer-widget'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>    
                </div>
                    
                <div class="col-md-3 third">
                    <div class="fsidebar wow fadeInLeft" data-wow-offset="10"  >
                        <?php if (is_active_sidebar('third-footer-widget')) : ?>
                            <?php dynamic_sidebar('third-footer-widget'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>    
                </div>
                    
                <div class="col-md-3 fourth">
                    <div class="fsidebar wow fadeInLeft" data-wow-offset="10"  >
                        <?php if (is_active_sidebar('fourth-footer-widget')) : ?>
                            <?php dynamic_sidebar('fourth-footer-widget'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>    
                </div>
            </div>
           </div>     
        </div>
        <!-- footer sidebar end here -->  

        <!--foter sidebar start here --> 
        <?php 
            $footer_credits = esc_attr( get_theme_mod('footer_credits') ); 

            $social_facebook = esc_url( get_theme_mod('social_facebook') );
            $social_twitter = esc_url( get_theme_mod('social_twitter') );
            $social_google_plus = esc_url( get_theme_mod('social_google_plus') );
            $social_rss = esc_url( get_theme_mod('social_rss') );
            $social_pinterest = esc_url( get_theme_mod('social_pinterest') );
            $social_linkedin = esc_url( get_theme_mod('social_linkedin') );
        ?>
        <div class="footer-wrapper">
            <div class="container">
            <div class="row">
                <div class="footer">
                <div class="col-md-6 col-sm-6">
                    <div class='footer-left'>
                        <?php if ( isset($footer_credits) && $footer_credits != '') { ?>
                            <p><?php echo $footer_credits; ?></p>
                        <?php } else { ?>   
                            <p><?php printf( esc_html__( 'Theme Design and Develop by %s', 'bfront' ), '<a href="wwww.themesflow.com">ThemesFlow</a>' ); ?></p>
                        <?php } ?>  
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class='social-icons wow bounceIn'>
                        <ul>
                            <?php if ( isset($social_facebook) && $social_facebook != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_facebook; ?>" alt="facebook">
                                            <i class="fa fa-facebook">
                                                <span><?php _e( 'Facebook','bfront'); ?></span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>

                            <?php if ( isset($social_twitter) && $social_twitter != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_twitter; ?>" alt="twitter">
                                            <i class="fa fa-twitter">
                                                <span><?php _e( 'Twitter','bfront'); ?></span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>

                            <?php if ( isset($social_google_plus) && $social_google_plus != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_google_plus; ?>" alt="google+">
                                            <i class="fa fa-google-plus">
                                                <span><?php _e( 'Google+','bfront'); ?></span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>

                            <?php if ( isset($social_rss) && $social_rss != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_rss; ?>" alt="RSS">
                                            <i class="fa fa-rss">
                                                <span><?php _e( 'RSS','bfront'); ?></span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>

                            <?php if ( isset($social_pinterest) && $social_pinterest != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_pinterest; ?>" alt="pinterest">
                                            <i class="fa fa-pinterest">
                                                <span><?php _e( 'Pinterest','bfront'); ?></span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>

                            <?php if ( isset($social_linkedin) & $social_linkedin != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_linkedin; ?>" alt="linkedin">
                                            <i class="fa fa-linkedin">
                                                <span><?php _e( 'Linkedin','bfront'); ?></span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
           </div>
        </div>        
        </div>
        <!-- footer sidebar end here -->  
        </div>
         <?php wp_footer(); ?>
    </body>
</html>

