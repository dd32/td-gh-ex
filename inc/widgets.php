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
            array( 'description' => __( 'Recent Posts Widget for the sidebar.', themeofwp ), ) // Args
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
                <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', themeofwp ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Number of posts:', themeofwp ); ?></label> 
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



//register works widget
function register_themeofwp_works_widget() {
    register_widget( 'ThemeofWP_Works_Widget' );
}
add_action( 'widgets_init', 'register_themeofwp_works_widget' );

/**
 * Add ThemeofWP_Works_Widget widget.
 */
class ThemeofWP_Works_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'themeofwp_works', // Base ID
            'TWP Recent Works (Sidebar)', // Name
            array( 'description' => __( 'Works Widget for the sidebar.', themeofwp ), ) // Args
            );
    }

    public function widget( $args, $instance ) {
        $title  = $instance['title'];
        $count  = $instance['count'];
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];
		
		$posts = get_posts( array( 'post_type' => 'works', 'posts_per_page' => $count ) );
        foreach ($posts as $key => $value) {
            ?>
                <a href="<?php echo get_permalink( $value->ID ); ?>" class="portfolio-img"><?php echo get_the_post_thumbnail( $value->ID, array(50,50) ); ?></a> 
				
            <?php }
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            $title  = isset($instance[ 'title' ]) ? $instance[ 'title' ] : 'Recent Works';
            $count  = isset($instance[ 'count' ]) ? $instance[ 'count' ] : 3;
            ?>
            <p>
                <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', themeofwp ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Number of Portfolio:', themeofwp ); ?></label> 
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
	
	
//register products widget
function register_themeofwp_products_widget() {
    register_widget( 'ThemeofWP_Products_Widget' );
}
add_action( 'widgets_init', 'register_themeofwp_products_widget' );

/**
 * Add ThemeofWP_Products_Widget widget.
 */
class ThemeofWP_Products_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'themeofwp_recent_products', // Base ID
            'TWP Recent Products', // Name
            array( 'description' => __( 'Products Widget for the sidebar.', themeofwp ), ) // Args
            );
    }

    public function widget( $args, $instance ) {
        $title  = $instance['title'];
        $count  = $instance['count'];
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];

        $posts = get_posts( array( 'post_type' => 'product', 'posts_per_page' => $count ) );
        foreach ($posts as $key => $value) { 
            ?>
            <div class="media">
                <div class="pull-left widget-img">
                    <a href="<?php echo get_permalink( $value->ID ); ?>"><?php echo get_the_post_thumbnail( $value->ID, array(90,90) ); ?></a>
                </div>
                <div class="media-body">
                    <span class="media-heading"><a href="<?php echo get_permalink( $value->ID ); ?>"><?php echo $value->post_title; ?></a></span>
                </div>
            </div>
            <?php }
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            $title  = isset($instance[ 'title' ]) ? $instance[ 'title' ] : 'Recent Products';
            $count  = isset($instance[ 'count' ]) ? $instance[ 'count' ] : 3;
            ?>
            <p>
                <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', themeofwp ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Number of products:', themeofwp ); ?></label> 
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
            array( 'description' => __( 'Displays 125x125 ads with link for the sidebar.', themeofwp ), ) // Args
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
                <a href="#" class="button custom_media_upload"><?php _e('Upload', themeofwp); ?></a>            

                <p>
                    <label for="<?php echo $this->get_field_id('url2');?>">URL:</label><br/>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('url2'); ?>" name="<?php echo $this->get_field_name('url2'); ?>" value="<?php if(!empty($instance['url2'])){echo $instance['url2'];} ?>" />
                </p>

                <label for="<?php echo $this->get_field_id('img_src2'); ?>">Image</label><br />
                <?php if(!empty($instance['img_src2'])){ ?>
                <img class="custom_media_image2" src="<?php if(!empty($instance['img_src2'])){echo $instance['img_src2'];} else{ echo "No Image";}?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php } ?>
                <input type="text" class="widefat custom_media_url2" name="<?php echo $this->get_field_name('img_src2'); ?>" id="<?php echo $this->get_field_id('img_src2'); ?>" value="<?php if(!empty($instance['img_src2'])){echo $instance['img_src2'];} ?>">
                <a href="#" class="button custom_media_upload2"><?php _e('Upload', themeofwp); ?></a>
				
				<p>
                    <label for="<?php echo $this->get_field_id('url3');?>">URL:</label><br/>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('url3'); ?>" name="<?php echo $this->get_field_name('url3'); ?>" value="<?php if(!empty($instance['url3'])){echo $instance['url3'];} ?>" />
                </p>

                <label for="<?php echo $this->get_field_id('img_src3'); ?>">Image</label><br />
                <?php if(!empty($instance['img_src3'])){ ?>
                <img class="custom_media_image3" src="<?php if(!empty($instance['img_src3'])){echo $instance['img_src3'];} else{ echo "No Image";}?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php } ?>
                <input type="text" class="widefat custom_media_url3" name="<?php echo $this->get_field_name('img_src3'); ?>" id="<?php echo $this->get_field_id('img_src3'); ?>" value="<?php if(!empty($instance['img_src3'])){echo $instance['img_src3'];} ?>">
                <a href="#" class="button custom_media_upload3"><?php _e('Upload', themeofwp); ?></a>
				
				
				<p>
                    <label for="<?php echo $this->get_field_id('url4');?>">URL:</label><br/>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('url4'); ?>" name="<?php echo $this->get_field_name('url4'); ?>" value="<?php if(!empty($instance['url4'])){echo $instance['url4'];} ?>" />
                </p>

                <label for="<?php echo $this->get_field_id('img_src4'); ?>">Image</label><br />
                <?php if(!empty($instance['img_src4'])){ ?>
                <img class="custom_media_image4" src="<?php if(!empty($instance['img_src4'])){echo $instance['img_src4'];} else{ echo "No Image";}?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <?php } ?>
                <input type="text" class="widefat custom_media_url4" name="<?php echo $this->get_field_name('img_src4'); ?>" id="<?php echo $this->get_field_id('img_src4'); ?>" value="<?php if(!empty($instance['img_src4'])){echo $instance['img_src4'];} ?>">
                <a href="#" class="button custom_media_upload4"><?php _e('Upload', themeofwp); ?></a>
				
				
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

//function ThemeofWP_Contact_Scripts(){
//  wp_enqueue_media();
//  wp_enqueue_script('map-img', get_template_directory_uri() . '/admin/js/upload.js');
//}
//add_action('admin_enqueue_scripts', 'ThemeofWP_Contact_Scripts');

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
*	Begin Flickr Feed Custom Widgets
**/

class flickr_widget extends WP_Widget {
    function flickr_widget() {
        $widget_ops = array('classname' => 'widget_flickr', 'description' => 'Display your latest Flickr Photos.' );
        $this->WP_Widget('themeofwp_flickr', 'ThemeofWP Flickr', $widget_ops);
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		$flickr_title = $instance["flickr_title"];
        $flickr_key = $instance["flickr_id"];
        $flickr_count = $instance["flickr_count"];
        $flickr_src  = "http://www.flickr.com/badge_code_v2.gne?count=".$flickr_count."&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=".$flickr_key;
        ?>
			<?php echo $before_widget; ?>
				<?php 
					if($flickr_title == "") {
						$flickr_title = "Flickr Stream";
                    }

					echo $before_title; ?>
					   <?php echo $flickr_title; ?>
					<?php echo $after_title; 
				?>
	            <div id="flickr_wrapper">
	                <script type="text/javascript" src="<?php echo $flickr_src ?>"></script>
	            </div>
	           	<span class="clear"></span>
			<?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $flickr_id = isset($instance["flickr_id"]) ? esc_attr($instance["flickr_id"]) : "";
        $flickr_count = isset($instance["flickr_count"]) ? esc_attr($instance["flickr_count"]) : "";
		$flickr_title = isset($instance["flickr_title"]) ? esc_attr($instance["flickr_title"]) : "";
		
        ?>
			<p><label for="<?php echo $this->get_field_id('flickr_title'); ?>"><?php _e('Title', 'themeofwp');?><input class="widefat" id="<?php echo $this->get_field_id('flickr_title'); ?>" name="<?php echo $this->get_field_name('flickr_title'); ?>" type="text" value="<?php echo $flickr_title; ?>" /></label></p>
            
			<p><label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php _e('Flickr ID', 'themeofwp');?><input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo $flickr_id; ?>" /></label></p>
			<p><?php _e('Get your Flickr ID from', 'themeofwp');?> idGettr http://idgettr.com</p>
			
           	<p>
            	<label for="<?php echo $this->get_field_id('flickr_count'); ?>"><?php _e('Image Count', 'themeofwp');?></label>
                <select size="1" class="widefat" id="<?php echo $this->get_field_id('flickr_count'); ?>" name="<?php echo $this->get_field_name('flickr_count'); ?>">
                	<?php for($i = 1; $i < 11; $i++) : ?>
	                    <option <?php if($flickr_count == $i) : ?>selected="selected"<?php endif; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
			</p>
			
        <?php 
    }

} 

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("flickr_widget");'));
