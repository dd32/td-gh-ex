<?php
//register recent posts widget
function register_themeofwp_widget() {
    register_widget( 'ThemeofWP_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'register_themeofwp_widget' );

/**
 * Add ThemeofWP_Recent_Posts_Widget widget.
 */
class ThemeofWP_Recent_Posts_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'themeofwp_recent_posts', // Base ID
            'TWP Recent Posts (Sidebar)', // Name
            array( 'description' => __( 'Recent Posts Widget for the sidebar.', 'themeofwp' ), ) // Args
            );
    }

    public function widget( $args, $instance ) {
        $title  = $instance['title'];
        $count  = $instance['count'];
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];

        $posts = get_posts( array( 'numberposts' => $count ) );
        foreach ($posts as $key => $value) {
            ?>
            <div class="media">
                <div class="pull-left widget-img">
                    <a href="<?php echo get_permalink( $value->ID ); ?>"><?php echo get_the_post_thumbnail( $value->ID, array(90,90) ); ?></a>
                </div>
                <div class="media-body">
                    <span class="media-heading"><a href="<?php echo get_permalink( $value->ID ); ?>"><?php echo $value->post_title; ?></a></span>
                    <small class="muted"><?php echo date( 'd F Y', strtotime($value->post_date) ); ?></small>
                </div>
            </div>
            <?php }
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            $title  = isset($instance[ 'title' ]) ? $instance[ 'title' ] : 'RECENT POSTS';
            $count  = isset($instance[ 'count' ]) ? $instance[ 'count' ] : 3;
            ?>
            <p>
                <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'themeofwp' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Number of posts:', 'themeofwp' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
            </p>
            <?php 
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
            return $instance;
        }


    }


/**
* Add ThemeofWP Ads Widget widget.
*/

function ThemeofWP_AD_Scripts(){
  wp_enqueue_media();
  wp_enqueue_script('adsScript', get_template_directory_uri() . '/admin/js/upload.js');
}
add_action('admin_enqueue_scripts', 'ThemeofWP_AD_Scripts');


function ThemeofWP_AD_Widget() {
    register_widget( 'ThemeofWP_AD_Widget' );
}
add_action( 'widgets_init', 'ThemeofWP_AD_Widget' );

class ThemeofWP_AD_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'themeofwp_adverts',
            'TWP 125x125 Ads (Sidebar)',
            array( 'description' => __( 'Displays 125x125 ads with link for the sidebar.', 'themeofwp' ), ) // Args
            );
    }

    public function widget( $args, $instance ) {
		$title  = $instance['title'];
        $url  = $instance['url'];
        $url2  = $instance['url2'];
		$url3  = $instance['url3'];
		$url4  = $instance['url4'];
        $img_src  = $instance['img_src'];
        $img_src2  = $instance['img_src2'];
		$img_src3  = $instance['img_src3'];
		$img_src4  = $instance['img_src4'];
        echo $args['before_widget'];   
		
		$title  = $instance['title'];
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];

        ?>
        <div class="widget ads">
            <div class="row">
						
				<div class="col-xs-6">
					<?php $urls = esc_url($instance['url']);
					$images = esc_url($instance['img_src']);
					if( $urls || $images) { 
						?>
						<a class="img-responsive img-rounded" href="<?php echo $urls; ?>" target="_blank"><img class="img-responsive img-rounded" src="<?php echo $images; ?>" class="img-thumbnail"/></a>
						<?php } else{
							?>
							<a class="img-responsive img-rounded" href="#" target="_blank"><img class="img-responsive img-rounded" src="<?php echo get_template_directory_uri(); ?>/images/125x125.jpg" class="img-thumbnail 125"/></a>
							<?php } ?>
					
				</div>

				<div class="col-xs-6">
					<?php $urls2 = esc_url($instance['url2']);
					$images2 = esc_url($instance['img_src2']);
					if( $urls2 || $images2) { 
						?>
						<a href="<?php echo esc_url($instance['url2']); ?>" target="_blank"><img class="img-responsive img-rounded" src="<?php echo esc_url($instance['img_src2']); ?>" class="img-thumbnail"/></a>
						<?php } else{
							?>
							<a class="img-responsive img-rounded" href="#" target="_blank"><img class="img-responsive img-rounded" src="<?php echo get_template_directory_uri(); ?>/images/125x125.jpg" class="img-thumbnail 125"/></a>
							<?php } ?>
				</div>
							
				<div class="col-xs-6">
					<?php $urls3 = esc_url($instance['url3']);
					$images3 = esc_url($instance['img_src3']);
					if( $urls3 || $images3) { 
						?>
						<a href="<?php echo esc_url($instance['url3']); ?>" target="_blank"><img class="img-responsive img-rounded" src="<?php echo esc_url($instance['img_src3']); ?>" class="img-thumbnail"/></a>
						<?php } else{
							?>
							<a class="img-responsive img-rounded" href="#" target="_blank"><img class="img-responsive img-rounded" src="<?php echo get_template_directory_uri(); ?>/images/125x125.jpg" class="img-thumbnail 125"/></a>
							<?php } ?>
				</div>
				
				<div class="col-xs-6">
					<?php $urls4 = esc_url($instance['url4']);
					$images4 = esc_url($instance['img_src4']);
					if( $urls4 || $images4) { 
						?>
						<a href="<?php echo esc_url($instance['url4']); ?>" target="_blank"><img class="img-responsive img-rounded" src="<?php echo esc_url($instance['img_src4']); ?>" class="img-thumbnail"/></a>
						<?php } else{
							?>
							<a class="img-responsive img-rounded" href="#" target="_blank"><img class="img-responsive img-rounded" src="<?php echo get_template_directory_uri(); ?>/images/125x125.jpg" class="img-thumbnail 125"/></a>
							<?php } ?>
				</div>
								
                            </div>
                        </div>
						
						

                        <?php
                        echo $args['after_widget'];
                    }

                    public function form( $instance ) {
					$title  = isset($instance[ 'title' ]) ? $instance[ 'title' ] : 'ADS';

            ?>
            <div class="widget-content">
				<p>
                    <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label><br/>
                    <input class="widefat"  type="text" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if(!empty($instance['title'])){echo $instance['title'];} ?>" />
                </p>
				
                <p>
                    <label for="<?php echo $this->get_field_id('url'); ?>">URL:</label><br/>
                    <input class="widefat"  type="text" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php if(!empty($instance['url'])){echo $instance['url'];} ?>" />
                </p>

                <label for="<?php echo $this->get_field_id('img_src'); ?>">Image</label><br />
                <?php if(!empty($instance['img_src'])){ ?>
                <img class="custom_media_image" src="<?php echo $instance['img_src'];?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php } ?>
                <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('img_src'); ?>" id="<?php echo $this->get_field_id('img_src'); ?>" value="<?php if(!empty($instance['img_src'])){echo $instance['img_src'];} ?>">
                <a href="#" class="button custom_media_upload"><?php _e('Upload', 'themeofwp'); ?></a>            

                <p>
                    <label for="<?php echo $this->get_field_id('url2');?>">URL:</label><br/>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('url2'); ?>" name="<?php echo $this->get_field_name('url2'); ?>" value="<?php if(!empty($instance['url2'])){echo $instance['url2'];} ?>" />
                </p>

                <label for="<?php echo $this->get_field_id('img_src2'); ?>">Image</label><br />
                <?php if(!empty($instance['img_src2'])){ ?>
                <img class="custom_media_image2" src="<?php if(!empty($instance['img_src2'])){echo $instance['img_src2'];} else{ echo "No Image";}?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php } ?>
                <input type="text" class="widefat custom_media_url2" name="<?php echo $this->get_field_name('img_src2'); ?>" id="<?php echo $this->get_field_id('img_src2'); ?>" value="<?php if(!empty($instance['img_src2'])){echo $instance['img_src2'];} ?>">
                <a href="#" class="button custom_media_upload2"><?php _e('Upload', 'themeofwp'); ?></a>
				
				<p>
                    <label for="<?php echo $this->get_field_id('url3');?>">URL:</label><br/>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('url3'); ?>" name="<?php echo $this->get_field_name('url3'); ?>" value="<?php if(!empty($instance['url3'])){echo $instance['url3'];} ?>" />
                </p>

                <label for="<?php echo $this->get_field_id('img_src3'); ?>">Image</label><br />
                <?php if(!empty($instance['img_src3'])){ ?>
                <img class="custom_media_image3" src="<?php if(!empty($instance['img_src3'])){echo $instance['img_src3'];} else{ echo "No Image";}?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php } ?>
                <input type="text" class="widefat custom_media_url3" name="<?php echo $this->get_field_name('img_src3'); ?>" id="<?php echo $this->get_field_id('img_src3'); ?>" value="<?php if(!empty($instance['img_src3'])){echo $instance['img_src3'];} ?>">
                <a href="#" class="button custom_media_upload3"><?php _e('Upload', 'themeofwp'); ?></a>
				
				
				<p>
                    <label for="<?php echo $this->get_field_id('url4');?>">URL:</label><br/>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('url4'); ?>" name="<?php echo $this->get_field_name('url4'); ?>" value="<?php if(!empty($instance['url4'])){echo $instance['url4'];} ?>" />
                </p>

                <label for="<?php echo $this->get_field_id('img_src4'); ?>">Image</label><br />
                <?php if(!empty($instance['img_src4'])){ ?>
                <img class="custom_media_image4" src="<?php if(!empty($instance['img_src4'])){echo $instance['img_src4'];} else{ echo "No Image";}?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php } ?>
                <input type="text" class="widefat custom_media_url4" name="<?php echo $this->get_field_name('img_src4'); ?>" id="<?php echo $this->get_field_id('img_src4'); ?>" value="<?php if(!empty($instance['img_src4'])){echo $instance['img_src4'];} ?>">
                <a href="#" class="button custom_media_upload4"><?php _e('Upload', 'themeofwp'); ?></a>
				
				
            </div>
            <?php
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
            $instance['url2'] = ( ! empty( $new_instance['url2'] ) ) ? strip_tags( $new_instance['url2'] ) : '';
			$instance['url3'] = ( ! empty( $new_instance['url3'] ) ) ? strip_tags( $new_instance['url3'] ) : '';
			$instance['url4'] = ( ! empty( $new_instance['url4'] ) ) ? strip_tags( $new_instance['url4'] ) : '';
            $instance['img_src'] = ( ! empty( $new_instance['img_src'] ) ) ? strip_tags( $new_instance['img_src'] ) : '';
            $instance['img_src2'] = ( ! empty( $new_instance['img_src2'] ) ) ? strip_tags( $new_instance['img_src2'] ) : '';
			$instance['img_src3'] = ( ! empty( $new_instance['img_src3'] ) ) ? strip_tags( $new_instance['img_src3'] ) : '';
			$instance['img_src4'] = ( ! empty( $new_instance['img_src4'] ) ) ? strip_tags( $new_instance['img_src4'] ) : '';
            $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
            
            return $instance;
        }

        
    }


/**
 * Add ThemeofWP_Contact_Us_Widget widget.
 */
add_action('widgets_init', 'contact_us_load_widgets');

function contact_us_load_widgets()
{
	register_widget('Contact_Us_Widget');
}


class Contact_Us_Widget extends WP_Widget {
	
	function Contact_Us_Widget()
	{
		$widget_ops = array('classname' => 'contact_us', 'description' => __('Add your contact info with map.', 'themeofwp'));

		$control_ops = array('id_base' => 'contact_us-widget');

		$this->WP_Widget('contact_us-widget', __('TWP Contact Us', 'themeofwp'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
        <div class="contact">
            <address>
			
				<?php if($instance['map_img']): ?>
				<p>
					<span class="map">
						<a href="<?php echo $instance['map_url']; ?>" rel="lightbox"><img src="<?php echo $instance['map_img']; ?>" class="img-responsive"></a>	
					</span>
				</p>
                <?php endif; ?>
				
				<?php if($instance['address']): ?>
				<p>
					<span class="address">
						<i class="fa fa-map-marker"></i> <?php echo $instance['address']; ?>
					</span>
				</p>
                <?php endif; ?>
        
                <?php if($instance['phone']): ?>
                <span class="phone">
					<i class="fa fa-phone"></i> <?php _e('Phone:', 'themeofwp'); ?><?php echo $instance['phone']; ?>
				</span>
				<?php endif; ?>
				
				
				<?php if($instance['fax']): ?> 
				<p>
					<span class="fax">		
						<i class="fa fa-phone"></i> <?php _e('Fax:', 'themeofwp'); ?><?php echo $instance['fax']; ?>
					</span>
				</p>
				<?php endif; ?>
                                
        
                <?php if($instance['email']): ?>
                <span class="email">
					<i class="fa fa-envelope"> </i> <?php _e('Email:', 'themeofwp'); ?> <a href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
				</span>
				<?php endif; ?>	 
				
				<?php if($instance['web']): ?>
				<p>
					<span class="web">	
						<i class="fa fa-link"></i> <?php _e('Web:', 'themeofwp'); ?> <a href="<?php echo $instance['web']; ?>"><?php echo $instance['web']; ?></a>
					</span>
				</p>
				<?php endif; ?>
                 
 
            </address>
        </div>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['map_img'] = $new_instance['map_img'];
		$instance['map_url'] = $new_instance['map_url'];
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['fax'] = $new_instance['fax'];
		$instance['email'] = $new_instance['email'];
		$instance['web'] = $new_instance['web'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'OUR LOCATION');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<label for="<?php echo $this->get_field_id('map_img'); ?>"><?php _e('Map Image:', 'themeofwp');?></label><br />
		
		<?php if(!empty($instance['map_img'])){ ?>
		
		<img class="map_img_src" src="<?php if(!empty($instance['map_img'])){echo $instance['map_img'];} else{ echo "No Image";}?>" style="margin:0;padding:0;max-width:100%;float:left;display:inline-block" />
		
		<?php } ?>
		
		<input type="text" class="widefat map_img_url" name="<?php echo $this->get_field_name('map_img'); ?>" id="<?php echo $this->get_field_id('map_img'); ?>" value="<?php if(!empty($instance['map_img'])){echo $instance['map_img'];} ?>">
		
		<a href="#" class="button map_img_upload"><?php _e('Upload', themeofwp); ?></a>
				
		<p>
			<label for="<?php echo $this->get_field_id('map_url'); ?>"><?php _e('Map Image URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('map_url'); ?>" name="<?php echo $this->get_field_name('map_url'); ?>" value="<?php echo $instance['map_url']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo $instance['address']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fax'); ?>"><?php _e('Fax:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" value="<?php echo $instance['fax']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('web'); ?>"><?php _e('Website URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('web'); ?>" name="<?php echo $this->get_field_name('web'); ?>" value="<?php echo $instance['web']; ?>" />
		</p>
	<?php
	}
}


/**
*	HEADER CONTACT WIDGET
**/
add_action('widgets_init', 'header_contact_us_load_widgets');

function header_contact_us_load_widgets()
{
	register_widget('Header_Contact');
}

class Header_Contact extends WP_Widget {
	
	function Header_Contact()
	{
		$widget_ops = array('classname' => 'header_contact_us', 'description' => __('Add your contact info to the header area.', 'themeofwp'));

		$control_ops = array('id_base' => 'header_contact_us-widget');

		$this->WP_Widget('header_contact_us-widget', __('TWP Header Contact', 'themeofwp'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
        
                <?php if($instance['phone']): ?>
					<a href="tel:<?php echo $instance['phone']; ?>"><i class="fa fa-phone"></i>
						<?php echo $instance['phone']; ?>
					</a> 
				<?php endif; ?>
				
        
                <?php if($instance['email']): ?>
					<a href="mailto:<?php echo $instance['email']; ?>"><i class="fa fa-envelope-o"></i> 
						<?php echo $instance['email']; ?>
					</a>
				<?php endif; ?>	 

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;


		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
	
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
		
	<?php
	}
}


/**
*	HEADER SOCIAL WIDGET
**/
add_action('widgets_init', 'header_social_us_load_widgets');

function header_social_us_load_widgets()
{
	register_widget('Header_Social');
}

class Header_Social extends WP_Widget {
	
	function Header_Social()
	{
		$widget_ops = array('classname' => 'header_social_us', 'description' => __('Add your social info to the header area.', 'themeofwp'));

		$control_ops = array('id_base' => 'header_social_us-widget');

		$this->WP_Widget('header_social_us-widget', __('TWP Header Social', 'themeofwp'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
        
                <?php if($instance['twitter']): ?>
					<a href="<?php echo $instance['twitter']; ?>" id="twitter" title="twitter"><i class="fa fa-twitter"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['facebook']): ?>
					<a href="<?php echo $instance['facebook']; ?>" id="facebook" title="facebook"><i class="fa fa-facebook"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['linkedin']): ?>
					<a href="<?php echo $instance['linkedin']; ?>" id="linkedin" title="linkedin"><i class="fa fa-linkedin"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['google']): ?>
					<a href="<?php echo $instance['google']; ?>" id="google" title="google"><i class="fa fa-google-plus"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['instagram']): ?>
					<a href="<?php echo $instance['instagram']; ?>" id="instagram" title="instagram"><i class="fa fa-instagram"> </i></a>
				<?php endif; ?>
				

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;


		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['google'] = $new_instance['google'];
		$instance['instagram'] = $new_instance['instagram'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
	
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $instance['linkedin']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+ URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" value="<?php echo $instance['google']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instance['instagram']; ?>" />
		</p>
		
	<?php
	}
}
