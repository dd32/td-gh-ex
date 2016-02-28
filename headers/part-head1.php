<?php

$safreen_logo = get_theme_mod( 'safreen_logo_image' );
$safreen_facebook = esc_url( get_theme_mod ('fbsoc_text_safreen'));
$safreen_twitter = esc_url( get_theme_mod ('ttsoc_text_safreen'));
$safreen_googleplus = esc_url( get_theme_mod ('gpsoc_text_safreen'));
$safreen_pinterest = esc_url( get_theme_mod ('pinsoc_text_safreen'));
$safreen_youtube = esc_url( get_theme_mod ('ytbsoc_text_safreen'));
$safreen_linkedin = esc_url( get_theme_mod ('linsoc_text_safreen'));
$safreen_vimeo = esc_url( get_theme_mod ('vimsoc_text_safreen'));
$safreen_flickr = esc_url( get_theme_mod ('flisoc_text_safreen'));
$safreen_rss = esc_url( get_theme_mod ('rsssoc_text_safreen'));
$safreen_instagram = esc_url( get_theme_mod ('instagram_text_safreen'));

global $safreen;
?> 

<div class="branding">

 <div class="row">
         
      
 
 
 <?php if (  is_front_page() || is_home() ) { ?>
    	<!--LOGO START-->
        <div id="site-title">
        <?php if ($safreen_logo) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-img"><img src="<?php echo esc_url($safreen_logo) ; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                    <?php else : ?>
                    
       <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo('description'); ?>" rel="home"><?php bloginfo('name'); ?></a><?php endif;?>	
       
        
        </div>
        
       
       <?php } ?>
      
      <div id="menu_wrap">
       <?php $safreen_search_checkbox = get_theme_mod('safreen_search_box');?>
<?php if( isset($safreen_search_checkbox) && $safreen_search_checkbox != 0):?>


<div class="social-safreen">
        <a><i class="fa fa-search"></i></a>
         </div>
        <?php endif; ?>
  

       <?php $safreen_social1_checkbox = get_theme_mod('safreen_social1_checkbox');?>
<?php if( isset($safreen_social1_checkbox) && $safreen_social1_checkbox != 0):?>

       
     
            <!--social-->    
            <div class="social-safreen">
				
                
				<?php if( !empty($safreen_facebook) ):?>

         <a  href="<?php echo esc_url($safreen_facebook);?>" target="_blank" title="facebook"><i class="fa fa-facebook "></i></a><?php endif;?>
         
                <?php if( !empty($safreen_twitter) ):?>
               <a  href="<?php echo esc_url($safreen_twitter);?>" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a><?php endif; ?>
                
                 <?php if( !empty($safreen_googleplus) ):?>
                <a href="<?php echo esc_url($safreen_googleplus);?>" title=" Google Plus" target="_blank"> <i class="fa fa-google-plus"></i></a><?php endif;?>
                
                 <?php if( !empty($safreen_pinterest) ):?>
                <a href="<?php echo esc_url($safreen_pinterest);?>" title=" Pinterest" target="_blank"><i class="fa fa-pinterest-p"></i> </a>                <?php endif; ?>

                
                 <?php if( !empty($safreen_youtube) ):?>
                <a href="<?php echo esc_url($safreen_youtube);?>" title=" Youtube" target="_blank"> <i class="fa fa-youtube"></i></a><?php endif; ?>
                
                <?php if( !empty($safreen_linkedin) ):?>
               <a href="<?php echo esc_url($safreen_linkedin);?>" title=" linkedin" target="_blank"> <i class="fa fa-linkedin"></i></a><?php endif; ?>
                
                <?php if( !empty($safreen_vimeo) ):?>
                <a href="<?php echo esc_url($safreen_vimeo);?>" title=" Vimeo" target="_blank"> <i class="fa fa-vimeo"></i></a><?php endif; ?>                
                 <?php if( !empty($safreen_flickr) ):?>
                 <a href="<?php echo esc_url($safreen_flickr);?>" title=" flickr" target="_blank"> <i class="fa fa-flickr"></i></a><?php endif; ?>                
                
                 <?php if( !empty($safreen_rss) ):?>
                 <a href="<?php echo esc_url($safreen_rss);?>" title="rss" target="_blank"> <i class="fa fa-rss"></i></a><?php endif; ?>                          
                
                <?php if( !empty($safreen_instagram) ):?>
                 <a href="<?php echo esc_url($safreen_instagram);?>" title="instagram" target="_blank"> <i class="fa fa-instagram"></i></a><?php endif; ?>
                 </div>
              <?php endif?>
               
			       
       
     
        <!--LOGO END-->
        
        
        <!--MENU STARTS-->
       
         
        
        <h3 class="menu-toggle"><?php _e( 'Menu', 'safreen' ); ?></h3>
       
        <div id="navmenu">
        
         
		
		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?> 
        
        
        <?php get_search_form(); ?>
         </div>
      
     
         </div>
         
        </div>
        
        </div>
         
        
     
      
     

             <!--MENU END-->
