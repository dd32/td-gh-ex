<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package abaya
 * @since abaya 1.0
 */
?>

<footer class="footer">
  <section class="container">
    <div class="row">
    <?php if (is_active_sidebar('footer_1') ) { ?>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <?php dynamic_sidebar('footer_1'); ?>
        <!--ftr_widget-->
      </div><!--col-->
      <?php } ?>
      <?php if (is_active_sidebar('footer_2') ) { ?>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <?php dynamic_sidebar('footer_2'); ?>
        <!--ftr_widget-->
      </div><!--col-->
      <?php } ?><!--col-->
      <?php if (is_active_sidebar('footer_3') ) { ?>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <?php dynamic_sidebar('footer_3'); ?>
        <!--ftr_widget-->
      </div><!--col-->
      <?php } ?><!--col-->
      <?php if (is_active_sidebar('footer_4') ) { ?>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <?php dynamic_sidebar('footer_4'); ?>
        <!--ftr_widget-->
      </div><!--col-->
      <?php } ?><!--col-->
    </div><!--row-->
  </section><!--container-->
  <section class="copyright clear">
    <section class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <?php wp_nav_menu( array( 'theme_location' => 'footer-menu','menu_class'=>'ftr_nav') );?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <p><?php
		  global $abaya_option; if(isset($abaya_option['copyright']) && $abaya_option['copyright']!='')
		  {
			  echo esc_html($abaya_option['copyright']);
			  
		  }else {$footertext = '[copyright] [the-year] [site-name] [theme-credit]';
        		$footertext = str_replace('[copyright]','&copy;',$footertext);
        		$footertext = str_replace('[the-year]',date('Y'),$footertext);
        		$footertext = str_replace('[site-name]',get_bloginfo('name'),$footertext);
        		$footertext = str_replace('[theme-credit]','- WordPress Theme by <a href="'.esc_url(__( 'https://wordpress.org/', 'abaya')).'" target="_blank">Y Design Services</a>',$footertext);
        		echo do_shortcode($footertext); } ?></p>
        </div>
      </div>
    </section>
  </section><!--copyright--> 
</footer><!--footer-->
<?php wp_footer(); ?>
</body>
</html>