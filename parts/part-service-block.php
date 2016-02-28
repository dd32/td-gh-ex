<div class="box-container">

			<?php if ( is_active_sidebar( 'sidebar-serviceblock' ) ) :?>
			<?php	dynamic_sidebar( 'sidebar-serviceblock' );?>
			
<?php else :?>
           <?php the_widget( 'safreen_serviceblock','title='.esc_attr__('Modern Design', 'safreen').'&text='.esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.','safreen').'&link='.esc_url ( '#' ).'&link_name='.esc_attr__('Read more','safreen').'&image_uri='.esc_url(get_template_directory_uri()."/images/bg_service_1.jpg") , array('before_widget' => '', 'after_widget' => '') );?>
           
               <?php the_widget( 'safreen_serviceblock','title='.esc_attr__('High Quality', 'safreen').'&text='.esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.','safreen').'&link='.esc_url ( '#' ).'&link_name='.esc_attr__('Read more','safreen').'&image_uri='.esc_url(get_template_directory_uri()."/images/bg_service_3.jpg") , array('before_widget' => '', 'after_widget' => '') );?>
               
                   <?php the_widget( 'safreen_serviceblock','title='.esc_attr__('Ultra Responsive', 'safreen').'&text='.esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.','safreen').'&link='.esc_url ( '#' ).'&link_name='.esc_attr__('Read more','safreen').'&image_uri='.esc_url(get_template_directory_uri()."/images/bg_service_2.jpg") , array('before_widget' => '', 'after_widget' => '') );?>
           
                       
           

 		
			<?php endif;?>
				
			 
 </div>

