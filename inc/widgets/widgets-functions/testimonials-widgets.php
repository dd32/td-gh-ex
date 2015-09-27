<?php
/**
 *
 * @package Theme Freesia
 * @subpackage Arise
 * @since Arise 1.0
 */
/*********************** ARISE TESTIMONIALS WIDGETS ****************************/
class arise_widget_testimonial extends WP_Widget {
	function arise_widget_testimonial() {
		$widget_ops = array( 'classname' => 'widget_testimonial', 'description' => __( 'Display Testimonial on FrontPage', 'arise' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'TF: FP Testimonial', 'arise' ), $widget_ops, $control_ops);
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','number'=>'3', 'image1' => '', 'primary_text1' => '', 'secondary_text1' => '', 'name1' =>'','company_name1'=>'','company_link1'=>'', 'image2'=>'', 'primary_text2'=>'', 'secondary_text2'=>'','name2'=>'','company_name2'=>'','company_link2'=>'', 'image3'=>'', 'primary_text3'=>'', 'secondary_text3'=>'','name3'=>'','company_link3'=>'', 'company_name3' => '' ) );
		$title = strip_tags($instance['title']);
		$number = absint( $instance[ 'number' ] );
		for ( $i=1; $i<=$number; $i++ ) {
			$image = 'image'.$i;	
			$primary_text  = 'primary_text'.$i;
			$secondary_text  = 'secondary_text'.$i;
			$name  = 'name'.$i;
			$company_name = 'company_name'.$i;
			$company_link = 'company_link'.$i;
			$instance[ $image ] = esc_url( $instance[ $image ] );
			$instance[ $primary_text ] = stripslashes( wp_filter_post_kses( addslashes ( $instance[ $primary_text ] )));
			$instance[ $secondary_text ] = stripslashes( wp_filter_post_kses( addslashes ( $instance[ $secondary_text ] )));
			$instance[ $name ] = strip_tags( $instance[ $name ] );
			$instance[ $company_name ] = strip_tags( $instance[ $company_name ] );
			$instance[ $company_link ] = esc_url( $instance[ $company_link ] );
 		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
			<?php _e( 'Title:', 'arise' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			<?php _e( 'No of Testimonial:', 'arise' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
		</p>
		<p>
			<input type="submit" name="savewidget" id="widget-arise_ourteam_widget-2-savewidget" class="button button-primary widget-control-save right" value="Save"><span class="spinner" style="display: none;"></span>
			<div class="alignleft">
				<a class="widget-control-remove" href="#remove"><?php _e('Delete','arise');?></a> |
				<a class="widget-control-close" href="#close"><?php _e('Close','arise');?></a>
			</div>
		</p>
		<p> &nbsp; </p>
 		<?php for ( $i=1; $i<=$number; $i++ ) {
			$image = 'image'.$i;	
			$primary_text  = 'primary_text'.$i;
			$secondary_text  = 'secondary_text'.$i;
			$name  = 'name'.$i;
			$company_name = 'company_name'.$i;
			$company_link = 'company_link'.$i;
			$instance[ $image ] = esc_url( $instance[ $image ] );
			$instance[ $primary_text ] = stripslashes( wp_filter_post_kses( addslashes ( $instance[ $primary_text ] )));
			$instance[ $secondary_text ] = stripslashes( wp_filter_post_kses( addslashes ( $instance[ $secondary_text ] )));
			$instance[ $name ] = strip_tags( $instance[ $name ] );
			$instance[ $company_name ] = strip_tags( $instance[ $company_name ] );
			$instance[ $company_link ] = esc_url( $instance[ $company_link ] );
 		?>
		<p>
			<?php _e( 'Primary Text','arise'); echo $i; ?>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id($primary_text); ?>" name="<?php echo $this->get_field_name($primary_text); ?>"><?php echo esc_attr( $instance[$primary_text] ); ?></textarea>
		</p>
		<p>	
			<?php _e( 'Secondary Text','arise'); echo $i; ?>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id($secondary_text); ?>" name="<?php echo $this->get_field_name($secondary_text); ?>"><?php echo esc_attr( $instance[$secondary_text] ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('ourteam_image'); ?>">
			<?php _e( '(Recommended Image Size (300x300))', 'arise' ); ?>
		</label>
			<input class="upload1" type="text"  name="<?php echo $this->get_field_name($image); ?>" id="<?php echo $this->get_field_id( $image ); ?>" value="<?php if(isset ( $instance[$image] ) ) 
					echo esc_url( $instance[$image] ); ?>" />
			<input class="button  custom_media_button" name="<?php echo $this->get_field_name($image); ?>" type="button" id="custom_media_button_services"  value="Upload Image" onclick="mediaupload.uploader( '<?php echo $this->get_field_id( $image ); ?>' ); return false;"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('name'); ?>">
				<?php _e( 'Name ', 'arise' ); echo $i; ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id($name); ?>" name="<?php echo $this->get_field_name($name); ?>" type="text" value="<?php if(isset ( $instance[$name] ) ) echo esc_attr( $instance[$name] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('company_name'); ?>">
				<?php _e( 'Comapany Name ', 'arise' ); echo $i; ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id($company_name); ?>" name="<?php echo $this->get_field_name($company_name); ?>" type="text" value="<?php if(isset ( $instance[$company_name] ) ) echo esc_attr( $instance[$company_name] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('company_link'); echo $i; ?>">
				<?php _e( 'Company Link ', 'arise' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id($company_link); ?>" name="<?php echo $this->get_field_name($company_link); ?>" type="text" value="<?php if(isset ( $instance[$company_link] ) ) echo esc_url_raw( $instance[$company_link] ); ?>" />
		</p>
		<div class="alignleft">
				<a class="widget-control-remove" href="#remove"><?php _e('Delete','arise');?></a> |
				<a class="widget-control-close" href="#close"><?php _e('Close','arise');?></a>
			</div>
		<input type="submit" name="savewidget" id="widget-arise_ourteam_widget-2-savewidget" class="button button-primary widget-control-save right" value="Save"><span class="spinner" style="display: none;"></span> <br/>
		<p>&nbsp; </p>
		<hr><hr>
			<?php
		}
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		for( $i=1; $i<=$instance['number']; $i++ ) {
			$image = 'image'.$i;	
			$primary_text  = 'primary_text'.$i;
			$secondary_text  = 'secondary_text'.$i;
			$name  = 'name'.$i;
			$company_name = 'company_name'.$i;
			$company_link = 'company_link'.$i;
			$instance[ $image ] = esc_url( $new_instance[ $image ] );
			$instance[ $primary_text ] = stripslashes( wp_filter_post_kses( addslashes ( $new_instance[ $primary_text ] )));
			$instance[ $secondary_text ] = stripslashes( wp_filter_post_kses( addslashes ( $new_instance[ $secondary_text ] )));
			$instance[ $name ] = strip_tags( $new_instance[ $name ] );
			$instance[ $company_name ] = strip_tags( $new_instance[ $company_name ] );
			$instance[ $company_link ] = esc_url( $new_instance[ $company_link ] );
		}
		return $instance;
	}
	function widget( $args, $instance ) {
		extract($args);
		$title = empty( $instance['title'] ) ? '' : $instance['title'];
		$number = empty( $instance['number'] ) ? 3 : $instance['number'];
		$image_array = array();
		$name_array = array();
		$primary_text_array = array();
		$secondary_text_array = array();
		$company_name_array = array();
		$company_link_array = array();
		for( $i=1; $i<=$number; $i++ ) {
			$image = 'image'.$i;	
			$primary_text  = 'primary_text'.$i;
			$secondary_text  = 'secondary_text'.$i;
			$name  = 'name'.$i;
			$company_name = 'company_name'.$i;
			$company_link = 'company_link'.$i;
			$image = isset( $instance[ $image ] ) ? $instance[ $image ] : '';
			$primary_text = isset( $instance[ $primary_text ] ) ? $instance[ $primary_text ] : '';
			$secondary_text = isset( $instance[ $secondary_text ] ) ? $instance[ $secondary_text ] : '';
			$name = isset( $instance[ $name ] ) ? $instance[ $name ] : '';
			$company_name = isset( $instance[ $company_name ] ) ? $instance[ $company_name ] : '';
			$company_link = isset( $instance[ $company_link ] ) ? $instance[ $company_link ] : ''; 
			if( !empty( $image )  || !empty( $primary_text ) || !empty( $secondary_text ) || !empty( $name ) ||  !empty( $company_name )|| !empty( $company_link ))  {
					if( !empty( $image ) )
						array_push( $image_array, $image ); 
					else array_push($image_array, "");
					if( !empty( $primary_text ) )
						array_push( $primary_text_array, $primary_text ); 
					else array_push($primary_text_array, "");
					if( !empty( $secondary_text ) )
						array_push( $secondary_text_array, $secondary_text ); 
					else array_push($secondary_text_array, "");
					if( !empty( $name ) )
					array_push( $name_array, $name );
					else array_push($name_array, ""); 
				if( !empty( $company_name ) )
					array_push( $company_name_array, $company_name ); 
				else array_push($company_name_array, "");
				if( !empty( $company_link ) )
					array_push( $company_link_array, $company_link );
				else array_push($company_link_array, "");
			}
		}
			echo '<!-- Testimonial Widget ============================================= -->' .$before_widget; ?>
			<div class="container clearfix">
			<?php if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
				<div class="testimonials">
					<div class="quote-wrapper">
					<?php $j = 1;
					for( $i=0; $i< $number; $i++ ) {
						if((!empty($image_array[$i])) ||(!empty($name_array[$i])) ||(!empty($primary_text_array[$i])) ||(!empty($secondary_text_array[$i])) || (!empty($company_name_array[$i])) ||(!empty($company_link_array[$i])) ){ ?>
						<div class="quotes">
							<blockquote class="quote">
							<?php if(!empty($image_array[$i])){ ?> 
								<img src="<?php if(!empty($image_array[$i])){ echo esc_url($image_array[$i]); } ?>" title="<?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?>" alt="<?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?>" />
							<?php }?>
							<?php if(!empty($primary_text_array[$i])){ echo '<p>' . stripslashes( wp_filter_post_kses( addslashes ($primary_text_array[$i]))) . '</p>';  }
							if(!empty($secondary_text_array[$i])){ echo '<p>' . stripslashes( wp_filter_post_kses( addslashes ($secondary_text_array[$i]))) . '</p>'; }?>
							<div>
								<cite>
								<?php if(!empty($name_array[$i])){ echo '- ' . $name_array[$i] . ', '; }
								if(!empty($company_name_array[$i])){ ?>
									<a href="<?php echo esc_url($company_link_array[$i]); ?>" title="<?php echo esc_attr($company_name_array[$i]); ?>" target="_blank"><?php echo esc_attr($company_name_array[$i]); ?></a> <?php  } ?>
								</cite>
							</div>
						</blockquote>
						</div><!-- end .quotes -->
					<?php }  
						$j++;
					}?>
					</div> <!-- end .quote-wrapper -->
				</div> <!-- end .testimonials -->
			</div> <!-- end .container -->
		<?php 
		echo $after_widget .'<!-- end .widget_testimonial -->';
	}
}
?>