<?php 
/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
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
             <div class="site-info">            
            	<p class="footer_left">
				<?php _e(' Powered by ', 'appointment'); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'appointment' ) ); ?>"><?php _e('WordPress', 'appointment'); ?></a>
				
				<?php bloginfo(); ?> <?php echo date( 'Y' ); ?>. <?php _e( 'Designed by', 'appointment' ); ?> <a href="<?php echo esc_url( __( 'http://priyanshumittal.com/','appointment' ) ); ?>"><?php _e( 'Appointment &copy;', 'appointment' ); ?></a>
				<?php _e( 'All Rights Reserved.', 'appointment' ); ?>
				
				</p>
               
            </div>
</div><!--closing of the footer-->
</footer>  
</div>
<?php wp_footer(); ?> 
</body>
</html>  