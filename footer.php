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
                <div class="col-md-3">
                    <div class="fsidebar wow fadeInLeft" data-wow-offset="10"  >
                      <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('first-footer-widget-area'); ?>
                        <?php else : ?><h4>Widgets</h4>
                        <p>Default widgets will appear when you install the theme. You can make your own widgets through the widget option under the theme option panel. The process is very simple.</p>
                        <?php endif; ?>
                    </div>    
                </div>
                    
                <div class="col-md-3">
                    <div class="fsidebar wow bounceIn" data-wow-offset="10"  >
                       <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('second-footer-widget-area'); ?>
                        <?php else : ?><h4>About Us</h4>
                        <p>We make simple and easy WordPress themes that will make your website easily. You just need to install the theme on your WordPress dashboard and your website is ready within minutes.</p>
                     <?php endif; ?>
                    </div>
                </div>
                    
                <div class="col-md-3">
                    <div class="fsidebar wow bounceIn" data-wow-offset="10"  >
                        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('third-footer-widget-area'); ?>
                        <?php else : ?><h4>Have Questions</h4>
                        <p>If you have any queries regarding the theme or need any help you can contact us at our support forum</p>
                     <?php endif; ?>
                    </div>
                </div>
                    
                <div class="col-md-3">
                    <div class="fsidebar wow fadeInRight" data-wow-offset="10"  >
                        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
                        <?php else : ?><h4>Latest blog</h4>
                        <ul>
                            <li><a>First blog</a></li>
                            <li><a>Second blog</a></li>
                            <li><a>Third blog</a></li>
                            <li><a>Fourth blog</a></li>
                        </ul>
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
                            <p>Theme Design and Develop by Yogesh Bhade</p>
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
                                                <span>Facebook</span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } else {} ?>

                            <?php if ( isset($social_twitter) && $social_twitter != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_twitter; ?>" alt="twitter">
                                            <i class="fa fa-twitter">
                                                <span>Twitter</span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } else {} ?>

                            <?php if ( isset($social_google_plus) && $social_google_plus != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_google_plus; ?>" alt="google+">
                                            <i class="fa fa-google-plus">
                                                <span>Google+</span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } else {} ?>

                            <?php if ( isset($social_rss) && $social_rss != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_rss; ?>" alt="RSS">
                                            <i class="fa fa-rss">
                                                <span>RSS</span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } else {} ?>

                            <?php if ( isset($social_pinterest) && $social_pinterest != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_pinterest; ?>" alt="pinterest">
                                            <i class="fa fa-pinterest">
                                                <span>Pinterest</span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } else {} ?>

                            <?php if ( isset($social_linkedin) & $social_linkedin != '') { ?>
                                <li>
                                    <div class="circle">
                                        <a href="<?php echo $social_linkedin; ?>" alt="linkedin">
                                            <i class="fa fa-linkedin">
                                                <span>Linkedin</span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            <?php } else {} ?>
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

