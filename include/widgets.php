<?php
/**
 * Register footer Sidebar.
 *
 */
function ridolfi_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Area',
		'id'            => 'ridolfi_footer_widget',
		'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><div class="ftr_widget widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'ridolfi_widgets_init' );
function ridolfi_side_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar Area',
		'id'            => 'ridolfi_sidebar_widget',
		'before_widget' => '<div class="widget widget_search">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'ridolfi_side_widgets_init' );
//Blog sidebar
add_action( 'widgets_init', 'ridolfi_blog_sidebar' );
function ridolfi_blog_sidebar() {
  register_sidebar( array(
    'name' => __( 'Ridolfi Blog Sidebar', 'abaya' ),
    'id' => 'sidebar-blog',
    'before_widget' => '<div class="widget widget_archives clearfix">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget_title">',
    'after_title' => '</h6>',
  ));

  /*
   * THE REST OF THE SIDEBAR REGISTRATION CODE FROM twentyten_widgets_init() GOES HERE
   */
}

/**
 * Adds Foo_Widget widget.
 */
class Redolfi_cat_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ridolfi_widget', // Base ID
			__( 'Ridolfi product category', 'abaya' ), // Name
			array( 'description' => __( 'Display custom product category', 'abaya' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}?>
		<ul class="items">
 <?php $redilficat = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0)); //, 'exclude' => '17,77'
				foreach($redilficat as $wcatTerm) : 
				$wsubargs = array(
						   'hierarchical' => 1,
						   'show_option_none' => '',
						   'hide_empty' => 0,
						   'parent' => $wcatTerm->term_id,
						   'taxonomy' => 'product_cat'
						);
						$wsubcats = get_categories($wsubargs);
				?>
  <li class="cart_item cat-parent"><a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a><?php if($wsubcats){?><i class="fa fa-plus" aria-hidden="true"></i><?php }?>
 
                <ul class="children" style="display: none;">
                 <?php
                 foreach ($wsubcats as $wsc):
						?>
                  <li class="cart_item cat-parent"><a href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>"><?php echo $wsc->name;?></a></li>
                  <?php endforeach; ?>
                </ul>
                
              </li>
              <?php endforeach; ?>
            
</ul><?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'abaya' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'abaya'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Redolfi_cat_Widget
function register_redolfi_widget() {
    register_widget( 'Redolfi_cat_Widget' );
}
add_action( 'widgets_init', 'register_redolfi_widget' );

//Custom post with image

class Redolfi_postwith_image_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ridolfi_widget_with_image', // Base ID
			__( 'Ridolfi recent post', 'abaya' ), // Name
			array( 'description' => __( 'Display post with image', 'abaya' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}?>
		
		<?php global $post;
add_image_size( 'realty_widget_size', 85, 45, false );
$listings = new WP_Query();
$listings->query('post_type=post&posts_per_page='.$instance['total_post'].'');
if($listings->found_posts > 0) {?>

<?php 
echo '<ul class="">';
while ($listings->have_posts()) {
$listings->the_post();
$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'realty_widget_size') : '';
$listItem = '<a href="' . get_permalink() . '"><li class="clearfix postclass"><div class="thumb_img">' . $image.'</div></a>';
$listItem .= '<a href="' . get_permalink() . '" class="pots_title">';
$listItem .= get_the_title() . '</a>';
$listItem .= '<span class="pots_date">' . get_the_date() . '</span></li>';
echo $listItem;
}
echo '</ul>';
wp_reset_postdata();
}else{
echo '<p style="padding:25px;">No listing found</p>';
}?>
		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'abaya' );
		$number = isset($instance['total_post']) ? absint($instance['total_post']) :__( '', 'abaya' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e('Title:', 'abaya'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'total_post' ) ); ?>"><?php _e('Display total post:', 'abaya'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'total_post' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'total_post' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" min="1">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
       $instance['total_post'] = ( ! empty( $new_instance['total_post'] ) ) ? strip_tags( $new_instance['total_post'] ) : '';
		return $instance;
	}

} // class Redolfi_postwith_image_Widget
function register_redolfi_image_widget() {
    register_widget( 'Redolfi_postwith_image_Widget' );
}
add_action( 'widgets_init', 'register_redolfi_image_widget' );
?>
<?php
function customcontact_ridolfi_widgets_init() {

	register_sidebar( array(
		'name'          => 'Contact Form',
		'id'            => 'ridolfi_contact_form',
		'before_widget' => '<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"><div class="contact_details">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h6 class="page_title">',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'customcontact_ridolfi_widgets_init' );

?><?php
/*

*/
/* Start Adding Functions Below this Line */

class contact_widget_ridolfi extends WP_Widget {
    function contact_widget_ridolfi() {
		// Instantiate the parent object
		parent::__construct( false, 'Ridolfi Contact Form' );
    }

    function widget( $args, $instance ) {
		// Widget output
	extract( $args );
        // these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $text = $instance['text'];
        $textarea = $instance['textarea'];
		$address = $instance['address'];
		$phone = $instance['phone'];
		$skype = $instance['skype'];
		$email = $instance['email'];
        echo $before_widget;
        // Display the widget
      

        // Check if title is set
         if ( $title ) {
         echo $before_title . $title . $after_title;
        }

        // Check if text is set
        if( $text ) {
        echo '<p>'.$text.'</p>';
        }
         // Check if textarea is set
        if( $textarea ) {
        echo '<p>'.$textarea.'</p>';
         }?>
         <div class="row contact_info">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="address-col">
                  <span><i class="fa fa-home"></i></span>
                  <h6>ADDRESS</h6>
                  <p><?php if( $address ) {
        echo '<p>'.$address.'</p>';
         }?></p>
                </div><!--address-col-->
              </div><!--col-->
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="address-col">
                  <span><i class="fa fa-phone"></i></span>
                  <h6>PHONE</h6>
                  <p><p><?php if( $phone ) {
        echo '<p>'.$phone.'</p>';
         }?></p>
                </div><!--address-col-->
              </div><!--col-->
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="address-col">
                  <span><i class="fa fa-skype"></i></span>
                  <h6>SKYPE</h6>
                  <p><p><?php if( $skype ) {
        echo '<p>'.$skype.'</p>';
         }?></p>
                </div><!--address-col-->
              </div><!--col-->
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="address-col">
                  <span><i class="fa fa-envelope"></i></span>
                  <h6>EMAIL</h6>
                  <p><p><?php if( $email ) {
        echo '<p>'.$email.'</p>';
         }?></p>
                </div><!--address-col-->
              </div><!--col-->
            </div>
         <?php 
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
             $instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);
        $instance['textarea'] = strip_tags($new_instance['textarea']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['skype'] = strip_tags($new_instance['skype']);
		$instance['email'] = strip_tags($new_instance['email']);
        return $instance;
    }

    function form( $instance ) {
	// Output admin widget options form
    if( $instance) {
        $title = esc_attr($instance['title']);
        $text = esc_attr($instance['text']);
		 $textarea = esc_attr($instance['textarea']);
        $address = esc_textarea($instance['address']);
		$phone = esc_textarea($instance['phone']);
		$skype = esc_textarea($instance['skype']);
		$email = esc_textarea($instance['email']);
    } else {
        $title = '';
        $text = '';
        $textarea = '';
		$address = '';
		$phone = '';
		$skype = '';
		$email = '';
    }
    ?>

    <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Contact Title', 'abaya'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
<p>
    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'abaya'); ?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'abaya'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" />
    </p>
<p>
    <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('PHONE:', 'abaya'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('SKYPE:', 'abaya'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo $skype; ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('EMAIL:', 'abaya'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
    </p>
    
    <?php
    }
}

function mywidget_register_widgets() {
    register_widget( 'contact_widget_ridolfi' );
}

add_action( 'widgets_init', 'mywidget_register_widgets' );

/* Stop Adding Functions Below this Line */
?>
