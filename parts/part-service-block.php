<div class="box-container">

			<?php if ( is_active_sidebar( 'sidebar-serviceblock' ) ) :?>
			<?php	dynamic_sidebar( 'sidebar-serviceblock' );?>
			
<?php if ( home_url() == ''.esc_url('https://wp-themes.com/').'' ||  home_url() == ''.esc_url('https://wp-themes.com').'' ) { ?>
	

           <?php the_widget( 'advance_serviceblock','cat=sample-page&link='.esc_url ( '#' ).'&link_name='.esc_attr__('Read more','advance').'&image_uri='.esc_url(get_template_directory_uri()."/images/bg_service_1.jpg") , array('before_widget' => '', 'after_widget' => '') );?>
           
           <?php the_widget( 'advance_serviceblock','cat=sample-page&link='.esc_url ( '#' ).'&link_name='.esc_attr__('Read more','advance').'&image_uri='.esc_url(get_template_directory_uri()."/images/bg_service_3.jpg") , array('before_widget' => '', 'after_widget' => '') );?>
               
                             <?php the_widget( 'advance_serviceblock','cat=	sample-page&link='.esc_url ( '#' ).'&link_name='.esc_attr__('Read more','advance').'&image_uri='.esc_url(get_template_directory_uri()."/images/bg_service_2.jpg") , array('before_widget' => '', 'after_widget' => '') );?>

                       
          <?php } ?> 

 		
			<?php endif;?>
				
			 
 </div>

