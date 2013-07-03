<?php 
/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/footer.php
 */


?>




<footer>
<div id="footer">
        	<div class="footer_top">
            	<div class="page_wi">
                   <?php if(is_active_sidebar('first-footer-widget-area','second-footer-widget-area','third-footer-widget-area','fourth-footer-widget-area')):?>
                            <?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
                                  <div class="footer_cols">
                                       <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                                  </div>
                                <?php endif; ?>
                                
                             <?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?> 
                              <div class="footer_cols1">
                              <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                              </div>
                          
								 
	                          <?php endif; ?>      
                        <?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
                               <div class="footer_cols2">
                              <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                               </div>
                          
								 
	                  <?php endif; ?>
                        <?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
                               <div class="footer_contact">
                              <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
                               </div>
                          
								 
	                        <?php endif; ?>
            <?php else : ?>                   
               			 
						 <div class="footer_cols">
                       
					    <?php the_widget('WP_Widget_Archives'); ?>
                         </div>
               
							 
						 <div class="footer_cols1">
                       
					     <?php the_widget('WP_Widget_Categories'); ?>
                         </div>
	 
						 <div class="footer_cols2">
                         <?php
					  the_widget('WP_Widget_Meta'); ?>
                         </div>
               	 
						 <div class="footer_contact">
                         <?php
					  the_widget('WP_Widget_Pages'); ?>
                         </div>
                        
       <?php endif; ?>
                        
       
                   
                 </div><!--closing of the page_wi-->
            </div><!--closing of the footer_top-->
             <div class="page_wi">            
            	<p class="footer_left"><?php _e('Appointment A WordPress Theme . Designed and Developed by','appointment');?> <a href="<?php echo esc_url( __( 'http://www.appointpress.com', 'appointment' ) ); ?>"><?php _e('AppointPress','appointment'); ?></a>.</p>
               <!--<div class="footer_right">
                	<a href="#" class="social1">&nbsp;</a>
                    <a href="#" class="social2">&nbsp;</a>
                    <a href="#" class="social3">&nbsp;</a>
                    <a href="#" class="social4">&nbsp;</a>
                </div>-->
            </div>
</div><!--closing of the footer-->
</footer>  
</div>
<?php wp_footer(); ?> 
</body>
</html>  