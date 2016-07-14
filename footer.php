<footer>
  <section class="container">
    <div class="row">
    <?php if (is_active_sidebar('ridolfi_footer_widget') ) {?>
      
		  <?php dynamic_sidebar('ridolfi_footer_widget'); ?> 
       <!--ftr_widget-->
        <?php }?>
    <!--col-->
      <!--col-->
      <!--col-->
      <!--col-->
    </div><!--row-->
  </section><!--container-->
  <section class="copyright clear">
    <section class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu','menu_class'=>'ftr_nav') );?>
          
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
          <p><?php $footertext = '[copyright] [the-year] [site-name] [theme-credit]';
        		$footertext = str_replace('[copyright]','&copy;',$footertext);
        		$footertext = str_replace('[the-year]',date('Y'),$footertext);
        		$footertext = str_replace('[site-name]',get_bloginfo('name'),$footertext);
        		$footertext = str_replace('[theme-credit]','- WordPress Theme by <a href="'.esc_url(__( 'https://wordpress.org/', 'abaya')).'" target="_blank">Y Design Services</a>',$footertext);
        		echo do_shortcode($footertext); ?></p>
        </div>
      </div>
    </section>
  </section><!--copyright--> 
</footer><!--footer-->
<?php wp_footer(); ?>
</body>
</html>
