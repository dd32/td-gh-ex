<?php

$advance_logo = esc_url( get_theme_mod( 'advance_logo_image' ));
$advance_facebook = esc_url( get_theme_mod ('fbsoc_text_advance'));
$advance_twitter = esc_url( get_theme_mod ('ttsoc_text_advance'));
$advance_googleplus = esc_url( get_theme_mod ('gpsoc_text_advance'));
$advance_pinterest = esc_url( get_theme_mod ('pinsoc_text_advance'));
$advance_youtube = esc_url( get_theme_mod ('ytbsoc_text_advance'));
$advance_linkedin = esc_url( get_theme_mod ('linsoc_text_advance'));
$advance_vimeo = esc_url( get_theme_mod ('vimsoc_text_advance'));
$advance_flickr = esc_url( get_theme_mod ('flisoc_text_advance'));
$advance_rss = esc_url( get_theme_mod ('rsssoc_text_advance'));
$advance_instagram = esc_url( get_theme_mod ('instagram_text_advance'));

global $advance;
?> 

<div class="branding-single">
 <div class="row"> 
 
 
     	
    	<!--LOGO START-->
        <div id="site-title">
        <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
                    <?php advance_the_custom_logo(); ?>
                    <?php else : ?>
                    
       <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo('description'); ?>" rel="home"><?php bloginfo('name'); ?></a>
	   
	   
	   <?php endif;?>	
       
        
        </div>
        
       
       
       <div id="menu_wrap">
       <div class="social-advance">
                 <?php $advance_search_checkbox = get_theme_mod('advance_search_box',1);?>
<?php if( isset($advance_search_checkbox) && $advance_search_checkbox == 1):?>
       <a><i class="fa fa-search"></i></a>
       <?php endif; ?> 
   </div>
     
  
  
    <?php $advance_social1_checkbox = get_theme_mod('advance_social1_checkbox',1);?>
<?php if( isset($advance_social1_checkbox) && $advance_social1_checkbox == 1 ):?>

     
       <!--social-->    
            <div class="social-advance">
				
                
				<?php if( !empty($advance_facebook) ):?>

         <a  href="<?php echo esc_url($advance_facebook);?>" target="_blank" title="facebook"><i class="fa fa-facebook "></i></a><?php endif; ?>
         
                <?php if( !empty($advance_twitter) ):?>
               <a  href="<?php echo esc_url($advance_twitter);?>" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a><?php endif; ?>
                
                 <?php if( !empty($advance_googleplus) ):?>
                <a href="<?php echo esc_url($advance_googleplus);?>" title=" Google Plus" target="_blank"> <i class="fa fa-google-plus"></i></a><?php endif; ?>
                
                 <?php if( !empty($advance_pinterest) ):?>
                <a href="<?php echo esc_url($advance_pinterest);?>" title=" Pinterest" target="_blank"><i class="fa fa-pinterest-p"></i> </a>                <?php endif; ?>

                
                 <?php if( !empty($advance_youtube) ):?>
                <a href="<?php echo esc_url($advance_youtube);?>" title=" Youtube" target="_blank"> <i class="fa fa-youtube"></i></a><?php endif; ?>
                
                <?php if( !empty($advance_linkedin) ):?>
               <a href="<?php echo esc_url($advance_linkedin);?>" title=" linkedin" target="_blank"> <i class="fa fa-linkedin"></i></a><?php endif; ?>
                
                <?php if( !empty($advance_vimeo) ):?>
                <a href="<?php echo esc_url($advance_vimeo);?>" title=" Vimeo" target="_blank"> <i class="fa fa-vimeo"></i></a><?php endif; ?>                
                 <?php if( !empty($advance_flickr) ):?>
                 <a href="<?php echo esc_url($advance_flickr);?>" title=" flickr" target="_blank"> <i class="fa fa-flickr"></i></a><?php endif; ?>                
                
                 <?php if( !empty($advance_rss) ):?>
                 <a href="<?php echo esc_url($advance_rss);?>" title="rss" target="_blank"> <i class="fa fa-rss"></i></a><?php endif; ?>                          
                
                <?php if( !empty($advance_instagram) ):?>
                 <a href="<?php echo esc_url($advance_instagram);?>" title="instagram" target="_blank"> <i class="fa fa-instagram"></i></a><?php endif; ?>
                 </div>
                 
                 <?php endif?>
                 
     
        
     
        <!--LOGO END-->
        
        
        <!--MENU STARTS-->
       
        
        
       
       <h3 class="menu-toggle"><?php _e( 'Menu', 'advance' ); ?></h3>
        <div id="navmenu">
        
		
		<?php 
		wp_nav_menu( array( 
		
		  'container_class' => 'menu-header', 
		  'theme_location' => 'primary' 
		  ) ); 
		 
		 ?> 
        
        
          <?php get_search_form(); ?>
        
    </div>
         
    </div>
        
      </div>
      </div>
      
      

             <!--MENU END-->
<a id="showHere"></a>