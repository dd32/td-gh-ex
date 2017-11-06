<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */


//Retrieving copyright value from customizer field 
$copyright = better_health_get_option('better_health_copyright');

//Retrieving Button Text value from customizer field 
$button_text = better_health_get_option('better_health_contact_link_button_text');

//Retrieving Button Link value from customizer field 
$button_link = better_health_get_option('better_health_contact_link_button_link');

//Retrieving Address value from customizer field 
$address = better_health_get_option('better_health_contact_link_address');

//Retrieving Address value from customizer field 
$phone_number = better_health_get_option('better_health_contact_link_phone_number');

//Retrieving Email from customizer field 
$email = better_health_get_option('better_health_contact_link_email');

//Retrieving image url from customizer field 
$image = better_health_get_option('better_health_contact_image');

//Retrieving Contact Information from customizer field 
$show_top_footer_contact_info=  better_health_get_option('better_health_hide_top_footer_contact_link_section');

//Condition to Show/Hide top footer Contact Information
 if($show_top_footer_contact_info=="show")
 { ?>
    <section id="section-contact-link" class="contact-link">
      <div class="container">
        <div class="row">
          <div class="section-contact-full clearfix">
              <div class="col-xs-12 col-sm-3 col-md-2 hidden-xs">
                  <div class="contact-link-img">
                     <img src="<?php echo esc_url($image) ?>" alt="">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-9 col-md-6">
                  <div class="contact-link-desc">
                    <p><?php echo esc_html__('Have Any Questions !', 'better-health'); ?></p>
                    <h5><?php echo esc_html__('Don’t Hesitate To Contact Us Any Time.', 'better-health'); ?></h5>
                  </div>
              </div>
            <div class="col-xs-12 col-sm-9 col-md-4">
                <div class="contact-link-btn">
                   <a href="<?php echo esc_url($button_link);?>" class="contact-us"><?php echo esc_html($button_text); ?></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 <?php 
   }
     //Condition to Show/Hide top footer widget section 
    if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') || $show_top_footer_contact_info=="show" )  {  
  ?>
  <section id="footer-top" class="footer-top">
      <div class="container footer-widget-top">
          <div class="row">
            <div class="col-md-12">
              <div class="top-widget-contacts">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 widget">
                        <div class="widget-contact-icon pull-left">
                          <i class="fa fa-globe" aria-hidden="true"></i>
                        </div>
                        <div class="widget-contact-info">
                          <p class="top-widget-contacts-title"><?php echo esc_html__('visit us', 'better-health'); ?></p>
                          <p class="top-widget-contacts-content"><?php echo esc_html($address); ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 widget">
                        <div class="widget-contact-icon pull-left">
                          <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="widget-contact-info">
                          <p class="top-widget-contacts-title"><?php echo esc_html__('Email us', 'better-health'); ?></p>
                          <p class="top-widget-contacts-content"><?php echo esc_html($email); ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 widget">
                        <div class="widget-contact-icon pull-left">
                           <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="widget-contact-info">
                           <p class="top-widget-contacts-title"><?php echo esc_html__('Call us', 'better-health'); ?></p>
                           <p class="top-widget-contacts-content"><?php echo esc_html($phone_number); ?></p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-top-box wow fadeInUp">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="footer-top-box wow fadeInUp">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-top-box wow fadeInUp">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-top-box wow fadeInUp">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>

                    </div>
                </div>
            </div>
     
  </section>
   <?php } ?>      

  <section id="footer-bottom" class="footer-bottom">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="copyright">
                    <?php
                       // Displaying Footer copyright Text
                       echo wp_kses_post($copyright);
                    ?>
                  </div>
                  <div class="powered_by">
                      <span><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'better-health' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'better-health' ), 'WordPress' ); ?></a></span><span class="sep"> | </span>
            <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'better-health' ), 'BetterHealth', '<a href="http://www.canyonthemes.com" rel="designer">CanyonThemes</a>' ); ?>
                    </div>
              </div>
          </div>
      </div>
</section>

<a href="#" class="scrollup"><i class="fa fa-angle-double-up"></i></a>
 <?php wp_footer(); ?>

</body>
</html>
