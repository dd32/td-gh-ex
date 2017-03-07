<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package BB Mobile Application
 */
?>
    <div  id="footer" class="copyright-wrapper" style="background-color:<?php echo esc_attr(get_theme_mod('bb_mobile_application_section_color5','')); ?>; background-image:url('<?php echo esc_url(get_theme_mod('bb_mobile_application_section_image5')); ?>')">
      <div class="container">
        <div class="col-md-4">
          <h3><?php echo esc_html(get_theme_mod('bb_mobile_application_our_newsletter','')); ?></h3>
          <div class="sub-title"><?php echo esc_html(get_theme_mod('bb_mobile_application_our_newsletter_desc','')); ?></div>
          <div class="news-form">
            <?php echo esc_html(get_theme_mod('bb_mobile_application_our_newsletter_shortcode','')); ?>
  		      <div class="clearfix"></div>
          </div> 
        </div>
        <div class="col-md-4">
          <div class="text_2">
            <?php dynamic_sidebar( 'footer-1' ); ?> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="heading_2">
            <h3><?php echo esc_html(get_theme_mod('bb_mobile_application_address-title','')); ?></h3>
          </div>
          <div class="para_5">
            <div class="col-md-12"><p><?php echo esc_html(get_theme_mod('bb_mobile_application_address','')); ?></p></div>
    	      <div class="clearfix"></div>
    	      <div class="col-md-4"><p><?php _e('Phone:','bb-mobile-application'); ?></p></div>
          	<div class="col-md-8"><p><?php echo get_theme_mod('bb_mobile_application_contact-number',''); ?></p></div>
          	<div class="clearfix"></div>
    	      <div class="col-md-4"><p><?php _e('Email:','bb-mobile-application'); ?></p></div>
        	  <div class="col-md-8"><p><a href="<?php echo esc_html(get_theme_mod('bb_mobile_application_cont_email','')); ?>"><?php echo esc_attr(get_theme_mod('bb_mobile_application_cont_email','')); ?></a></p></div>
        	  <div class="clearfix"></div>
    	      <div class="col-md-4"><p><?php _e('Website:','bb-mobile-application'); ?></p></div>
    	      <div class="col-md-8"><p><?php echo esc_html(get_theme_mod('bb_mobile_application_website','')); ?></p></div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="inner">
          <div class="copyright text-center">
            <p><?php echo esc_html(get_theme_mod('bb_mobile_application_footer_copy',__('&copy; 2017 BB Mobile Application theme by ',"bb-mobile-application"))); ?> <a href="http://www.burhanuddinbohra.com/bb-mobile-application-theme/" target="_blank"><?php _e('burhanuddinbohra','bb-mobile-application'); ?></a></p>
          </div>
          <div class="clear"></div>           
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>