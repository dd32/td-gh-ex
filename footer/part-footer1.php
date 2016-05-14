<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
 
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
?>
<!--FOOTER SIDEBAR-->
 <div id="footer">
    <?php if ( is_active_sidebar( 'foot_sidebar' ) ) { ?>
    <div class="widgets">
    <div class="row">
     
    
    <?php if ( is_active_sidebar('dynamic_sidebar') || !dynamic_sidebar('foot_sidebar') ) : ?><?php endif; ?>
            </div>
   </div>
   	
     <?php } ?> 
 
	<!--COPYRIGHT TEXT-->
    <div id="copyright">
    <div class="row">
    
       
            <div class="copytext">
           <?php

				$advance_footertext = esc_attr(get_theme_mod('advance_footertext'));
				$advance_footertext = html_entity_decode(get_theme_mod ('advance_footertext'));
echo $advance_footertext;

					
			?>
            
		    <a target="_blank" href="<?php echo esc_url( 'http://www.imonthemes.com/'); ?>"><?php printf( __( 'Theme by %s', 'advance' ), 'Imon Themes' ); ?></a>
              
            </div>
            
            <?php $advance_social2_checkbox = get_theme_mod('advance_social2_checkbox',0);?>
<?php if( isset($advance_social2_checkbox) && $advance_social2_checkbox == 1 ):?>

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
 
    </div>
    <a href="#" class="scrollup" > <i class=" fa fa-angle-up fa-2x"></i></a>
    </div>

</div>





