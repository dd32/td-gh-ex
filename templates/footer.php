<?php global $footer_widgets,$footer_layout; ?>
<footer>
    <div class="footer-content">
      <div class="container">
      
      <?php $footer_widgets=get_theme_mod('footer_widgets',true ); if($footer_widgets) { ?>
      
        <div class="row voffset6">
       
         <?php
         if(get_theme_mod('footer_widgets_layout')) { $footer_layout=get_theme_mod('footer_widgets_layout'); }
	 if ($footer_layout == "fourc") {
  				if (is_active_sidebar('footer_1') ) { ?> 
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
		        <?php }; ?>
		    <?php } else if($footer_layout == "threec") {
		    	if (is_active_sidebar('footer_third_1') ) { ?> 
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar('footer_third_1'); ?>
					</div> 
            	<?php }; ?>
				<?php if (is_active_sidebar('footer_third_2') ) { ?> 
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar('footer_third_2'); ?>
					</div> 
		        <?php }; ?>
		        <?php if (is_active_sidebar('footer_third_3') ) { ?> 
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar('footer_third_3'); ?>
					</div> 
	            <?php }; ?>
			<?php }else if($footer_layout == "twoc") {
		    	if (is_active_sidebar('footer_two_1') ) { ?> 
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<?php dynamic_sidebar('footer_two_1'); ?>
					</div> 
            	<?php }; ?>
				<?php if (is_active_sidebar('footer_two_2') ) { ?> 
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<?php dynamic_sidebar('footer_two_2'); ?>
					</div> 
		        <?php }; ?>
		        
			<?php } else {
					if (is_active_sidebar('footer_onecol_1') ) { ?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<?php dynamic_sidebar('footer_onecol_1'); ?> 
					</div> 
		            <?php }; ?>
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
<?php wp_footer(); ?>
