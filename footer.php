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
            <a href="<?php echo esc_url(home_url('/')); ?>" class="ftr-logo"> <?php bloginfo('name');  ?></a>
           </div>
           <?php if(get_theme_mod('footer_copyright_bar',true)){ ?>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 pull-right">
                <?php if(get_theme_mod('copyright')): ?>
	     <p class="copyright"><?php echo do_shortcode(get_theme_mod('copyright' , __('', 'backyard'))); ?></p>
             <?php else : ?>
             <p class="copyright"><?php $footertext = '[copyright] [the-year] [site-name] [theme-credit]';
        		$footertext = str_replace('[copyright]','&copy;',$footertext);
        		$footertext = str_replace('[the-year]',date('Y'),$footertext);
        		$footertext = str_replace('[site-name]',get_bloginfo('name'),$footertext);
        		$footertext = str_replace('[theme-credit]',''.__('- WordPress Theme by','backyard').' <a href="'.esc_url(__( 'http://www.ydesignservices.com/', 'backyard')).'" target="_blank">'.__('Y Design Services','backyard').'</a>',$footertext);
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
