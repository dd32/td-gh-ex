<?php
/**
 * Sidebar Template
 *
 @file            sidebar.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/sidebar.php
*/ 
?>
 
  <?php if ( !dynamic_sidebar('sidebar-primary') ) : ?>     
						
		<?php the_widget('WP_Widget_Archives'); ?><div class="bog_right_2bo"></div>
		<?php the_widget('WP_Widget_Categories'); ?><div class="bog_right_2bo"></div>
		<?php the_widget('WP_Widget_Meta'); ?><div class="bog_right_2bo"></div>
		<?php the_widget('WP_Widget_Pages'); ?><div class="bog_right_2bo"></div>
																					
								 
	<?php endif;?>
	
	
 