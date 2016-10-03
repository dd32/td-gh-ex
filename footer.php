<footer>
    <div class="footer-content">
      <div class="container">
      <?php if(get_theme_mod('footer_widgets',true)){ ?>
        <div class="row voffset6">
        <?php if (is_active_sidebar('footer_1') ) { ?> 
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<?php dynamic_sidebar('footer_1'); ?>
					</div> 
            	<?php }; ?>
				<?php if (is_active_sidebar('footer_2') ) { ?> 
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<?php dynamic_sidebar('footer_2'); ?>
					</div> 
		        <?php }; ?>
		        <?php if (is_active_sidebar('footer_3') ) { ?> 
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<?php dynamic_sidebar('footer_3'); ?>
					</div> 
	            <?php }; ?>
				<?php if (is_active_sidebar('footer_4') ) { ?> 
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<?php dynamic_sidebar('footer_4'); ?>
					</div> 
		        <?php } ?>
        </div>
        <?php } else { ?>
        <?php } ?>
        
        <div class="ftr-bottom">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-left">
            <?php if(get_theme_mod('footer_copyright_bar',true)){ ?>
            <a href="<?php echo home_url(); ?>" class="ftr-logo">
           <?php if(get_theme_mod('footer_logo_upload_chk',true)){  ?>
        <img src="<?php if(get_theme_mod('footer_logo_upload')){ echo esc_url(get_theme_mod('footer_logo_upload')); }else { echo get_template_directory_uri(); ?>/assets/images/ftr-logo.png<?php }?>" width="186" height="21" alt=""/>
           <?php  } ?>
           </a>
          <?php } ?>
           </div>
           <?php if(get_theme_mod('footer_copyright_bar',true)){ ?>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 pull-right">
                <?php if(get_theme_mod('copyright')): ?>
	     <p class="copyright"><?php echo get_theme_mod('copyright'); ?></p>
             <?php else : ?>
             <p class="copyright"><?php $footertext = '[copyright] [the-year] [site-name] [theme-credit]';
        		$footertext = str_replace('[copyright]','&copy;',$footertext);
        		$footertext = str_replace('[the-year]',date('Y'),$footertext);
        		$footertext = str_replace('[site-name]',get_bloginfo('name'),$footertext);
        		$footertext = str_replace('[theme-credit]','- WordPress Theme by <a href="'.esc_url( __( 'http://www.ydesignservices.com/', 'backyard' ) ).'" target="_blank">Y Design Services</a>',$footertext);
        		 echo do_shortcode($footertext); ?></p>
             <?php endif; ?>
               
            </div>
            <?php } ?>
          </div>
        </div>
        <!--ftr-bottom--> 
      </div>
    </div>
    <!--footer-content--> 
    <div style="clear:both;"></div>
  </footer>
 <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
 </div><!--Wrapper-->
 <?php wp_footer(); ?>
</body>
</html>
