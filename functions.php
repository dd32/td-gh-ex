<?php
 
function bfastmag_enqueue_styles() {

    $parent_style = 'bfastmag'; // This is 'bfastmag-style' for the bfastMag theme.

	wp_enqueue_style( 'bfastmag-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css',array(), '3.3.5' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  
}
add_action( 'wp_enqueue_scripts', 'bfastmag_enqueue_styles');
/**
 * Woocommerce
 *
  */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_before_single_product', 'woocommerce_breadcrumb', 20, 0 );

add_action('woocommerce_before_main_content', 'newsmagz_woocommerce_wrapper_start', 22);
function newsmagz_woocommerce_wrapper_start() {

	$layout = 'col-md-8';
	if(is_cart()){
		$layout = 'col-md-12';
	}
	echo ' <div class="singlePostcontainer current"><div class="container"><div class="row">   <div id="primary" class="content-area singlev1"><div class="newsmagz-content-left '.$layout.' current"><main id="main" class="site-main" role="main"><div class="row"><div class="col-md-12"><div class="sArticlWrapper  ">';
}

add_action('woocommerce_after_main_content', 'newsmagz_woocommerce_wrapper_main_end', 11);
function newsmagz_woocommerce_wrapper_main_end() {
	echo '</div></div></div></main></div></div>';
}

add_action('woocommerce_sidebar', 'newsmagz_woocommerce_wrapper_end', 11);
function newsmagz_woocommerce_wrapper_end() {
	echo '</div></div></div>';
}

function bfastmag_customize_register_child( $wp_customize ) {
	

/*	$wp_customize->add_panel( 'featured_panel', array(
		'priority'   => 35,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'Featured Blocks', 'bfastmag' ),
	) );*/

$wp_customize->remove_panel('bfastmag_featured_big');
$wp_customize->remove_panel('featured_panel');
$wp_customize->remove_section('bfastmag_block1');
$wp_customize->remove_control('bfastmag_block2_category');
 	$wp_customize->get_section( 'bfastmag_block2' )->title     = __( 'Latest Products or Category', 'bfastmag' );
	$wp_customize->get_section( 'bfastmag_block3' )->title     = __( 'Products Slider', 'bfastmag' );
	$wp_customize->get_section( 'bfastmag_block4' )->title     = __( 'Category Block', 'bfastmag' );

 
	$wp_customize->add_section( 'bfastmag_featured_big', array(
		'title'    => esc_html__( 'Shop Home Big Grid', 'bfastmag' ),
		'priority' => 1,
		'panel'    => 'featured_panel',
	) );
	$wp_customize->add_section( 'bfastmag_featured_slider', array(
		'title'    => esc_html__( 'Featured Home Slider', 'bfastmag' ),
		'priority' => 1,
		'panel'    => 'featured_panel',
	) ); 	
	$wp_customize->add_section( 'bfastmag_banners', array(
		'title'    => esc_html__( '  Home Banners', 'bfastmag' ),
		'priority' => 1,
		'panel'    => 'sections_panel',
	) ); 

$wp_customize->add_setting( 'bfastmag_shop_banners', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'bfastmag_sanitize_repeater',
	) );
	$wp_customize->add_control( new bfastmag_General_Repeater_banner( $wp_customize, 'bfastmag_shop_banners', array(
		'label'                => esc_html__( 'Add New Shop Banner', 'bfastmag' ),
		'section'              => 'bfastmag_banners',
		'priority'             => 1,
		'bfastmag_bannerlink_control' => true,
		'bfastmag_link_control' => true,
	) ) );
 
		$wp_customize->add_setting( 'bfastmag_block22_category', array(
			'default'           => 'all',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'bfastmag_sanitize_category_dropdown2',
		) );

		$wp_customize->add_control( new bfastmagChooseCategoryPro( $wp_customize, 'bfastmag_block22_category', array(
			'label'    => esc_html__( 'Category', 'bfastmag' ),
			'section'  => 'bfastmag_block2',
			'priority' => 4,
		) ) );
	

}

add_action( 'customize_register', 'bfastmag_customize_register_child' ,1000);
/**
 * Sanitize dropdown.
 *
 * @param string $input Category slug.
 *
 * @return string
 */
function bfastmag_sanitize_category_dropdown2( $input ) {


/*	$cat = get_category_by_slug( $input );
	if ( empty( $cat ) ) {
		return 'all';
	}*/

	return $input;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class bfastmagChooseCategory
 */
class bfastmagChooseCategoryPro extends WP_Customize_Control {

	/**
	 * bfastmagChooseCategory constructor.
	 *
	 * @param WP_Customize_Manager $manager WordPress manager.
	 * @param string               $id Control id.
	 * @param array                $args Control arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {
		  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;
		       $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       =>  '',
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
		       $categories = get_categories( $args2 );
?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<select <?php $this->link(); ?>>
		<option value="all"><?php esc_html_e( 'All', 'bfastmag' );?></option>
		<?php
		foreach ( $categories as $cat ) {
			if ( $cat->count > 0 ) {
				echo '<option value="' . esc_attr( $cat->slug ) . '" ' . selected( $this->value(), $cat->slug ) . '>' . esc_attr( $cat->cat_name ) . '</option>';
			}
		}
			?>
			</select>
	<?php
	}
}
 /**
 * bfastmag_General_Repeater class file.
 *
 * @package WordPress
 * @subpackage bfastmag
 */

/**
 * Class bfastmag_General_Repeater_banner
 */
class bfastmag_General_Repeater_banner extends WP_Customize_Control {

	/**
	 * Repeater id.
	 *
	 * @var string
	 */
	public $id;

	/**
	 * Box title.
	 *
	 * @var array|string|void
	 */
	private $boxtitle = array();

	/**
	 * Flag has icon control.
	 *
	 * @var bool|mixed
	 */
	private $customizer_repeater_icon_control = false;

	/**
	 * Flag has link control.
	 *
	 * @var bool|mixed
	 */
	private $customizer_repeater_link_control = false;

	/**
	 * bfastmag_General_Repeater constructor.
	 *
	 * @param WP_Customize_Manager $manager WordPress manager.
	 * @param string               $id Control id.
	 * @param array                $args Arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		/*Get options from customizer.php*/
		$this->boxtitle   = __( 'banner','bfastmag' );

		if ( ! empty( $args['bfastmag_bannerlink_control'] ) ) {
			$this->customizer_repeater_icon_control = $args['bfastmag_bannerlink_control'];
		}

		if ( ! empty( $args['bfastmag_link_control'] ) ) {
			$this->customizer_repeater_link_control = $args['bfastmag_link_control'];
		}

		if ( ! empty( $args['id'] ) ) {
			$this->id = $id;
		}
	}

	/**
	 * Enqueue resources for the control
	 */
	public function enqueue() {
 
	 wp_enqueue_script( 'customizer-repeater-script', get_stylesheet_directory_uri() . '/inc/customizer/customizer_repeater.js', array( 'jquery', 'jquery-ui-draggable' ), '1.0.1', true );
  	}

	/**
	 * The function to render the controler
	 */
	public function render_content() {
		/*Get default options*/
		$this_default = json_decode( $this->setting->default );
		/*Get values (json format)*/
		$values = $this->value();
		/*Decode values*/
		$json = json_decode( $values );
		if ( ! is_array( $json ) ) {
			$json = array( $values );
		} ?>

		
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<div class="bfastmag_general_control_repeater bfastmag_general_control_droppable">
			<?php
			if ( ( count( $json ) == 1 && '' === $json[0] ) || empty( $json ) ) {
				if ( ! empty( $this_default ) ) {
					$this->iterate_array( $this_default ); ?>
					<input type="hidden"
						   id="customizer-repeater-<?php echo $this->id; ?>-colector" <?php $this->link(); ?>
						   class="customizer-repeater-colector"
						   value="<?php echo esc_textarea( json_encode( $this_default ) ); ?>"/>
					<?php
				} else {
					$this->iterate_array(); ?>

					<input type="hidden"
						   id="customizer-repeater-<?php echo $this->id; ?>-colector" <?php $this->link(); ?>
						   class="bfastmag_repeater_colector"/>
					<?php
				}
			} else {
				$this->iterate_array( $json ); ?>
				<input type="hidden" id="customizer-repeater-<?php echo $this->id; ?>-colector" <?php $this->link(); ?>
					   class="bfastmag_repeater_colector" value="<?php echo esc_textarea( $this->value() ); ?>"/>
				<?php
			} ?>
		</div>
		<button type="button" class="button add_field bfastmag_general_control_new_field">
			<?php esc_html_e( 'Add new field', 'bfastmag' ); ?>
		</button>
		<?php
	}

	/**
	 * Function to iterate through input and display repeater boxes.
	 *
	 * @param array $array Array to iterate through.
	 */
	private function iterate_array( $array = array() ) {
		/*Counter that helps checking if the box is first and should have the delete button disabled*/
		$it = 0;
 		if ( ! empty( $array ) ) {
			foreach ( $array as $icon ) { 


			 ?>
				<div class="bfastmag_general_control_repeater_container bfastmag_draggable">
					<div class="bfastmag-customize-control-title">
						<?php 
	if ( ! empty( $icon->icon_value ) ) {
							$box_title = $icon->icon_value;
						}else{
							$box_title = $this->boxtitle;
						}
						echo esc_html( $box_title ); 

						?>
					</div>
					<div class="bfastmag-box-content-hidden">
						<?php
						$choice = '';
						$image_url = '';
						$icon_value = '';
						$title = '';
						$subtitle = '';
						$text = '';
						$link = '';
						$shortcode = '';
						$repeater = '';
						$color = '';
						if ( ! empty( $icon->id ) ) {
							$id = $icon->id;
						}

						if ( ! empty( $icon->icon_value ) ) {
							$icon_value = $icon->icon_value;
						}
				if ( ! empty( $icon->image_url ) ) {
							$image_url = $icon->image_url;
						}

						if ( ! empty( $icon->link ) ) {
							$link = $icon->link;
						}
 							$this->image_control( $image_url, 'image' );
 						if ( $this->customizer_repeater_link_control ) {
							$this->input_control(array(
								'label' => __( 'Banner Link','bfastmag' ),
								'class' => 'bfastmag_link_control',
								'sanitize_callback' => 'esc_url',
							), $link);
						} ?>

						<input type="hidden" class="bfastmag_box_id" value="<?php if ( ! empty( $id ) ) {
							echo esc_attr( $id );
} ?>">
						<button type="button" class="bfastmag_general_control_remove_field button" <?php if ( $it == 0 ) {
							echo 'style="display:none;"';
} ?>>
							<?php esc_html_e( 'Delete field', 'bfastmag' ); ?>
						</button>

					</div>
				</div>

				<?php
				$it++;
			}// End foreach().
		} else { ?>
			<div class="bfastmag_general_control_repeater_container">
				<div class="bfastmag-customize-control-title">
					<?php echo esc_html( $this->boxtitle ); ?>
				</div>
				<div class="bfastmag-box-content-hidden">
					<?php
					
					$this->image_control();

					if ( $this->customizer_repeater_link_control == true ) {
						$this->input_control( array(
							'label' => __( 'Banner Link', 'bfastmag' ),
							'class' => 'bfastmag_link_control',
						) );
					} ?>
					<input type="hidden" class="bfastmag_box_id">
					<button type="button" class="bfastmag_general_control_remove_field button" style="display:none;">
						<?php esc_html_e( 'Delete field', 'bfastmag' ); ?>
					</button>
				</div>
			</div>
			<?php
		}// End if().
	}

	/**
	 * Function to display input field in control.
	 *
	 * @param array  $options Field options.
	 * @param string $value Input value.
	 */
	private function input_control( $options, $value = '' ) {
	?>
		<span class="customize-control-title"><?php echo $options['label']; ?></span>
		<input type="text"  value="<?php echo ( ! empty( $options['sanitize_callback'] ) ?  call_user_func_array( $options['sanitize_callback'], array( $value ) ) : esc_attr( $value ) ); ?>" class="<?php echo esc_attr( $options['class'] ); ?>" placeholder="<?php echo $options['label']; ?>"/>
 		<?php
	}	/**
	 * Function to display input field in control.
	 *
	 * @param array  $options Field options.
	 * @param string $value Input value.
	 */
	private function image_control( $value = '', $show = '' ) {
	?>
		<div class="customizer-repeater-image-control">
			<span class="customize-control-title">
				<?php esc_html_e( 'Banner Image','bfastmag' )?>
			</span>
			<input type="text" class="widefat custom-media-url" value="<?php echo esc_attr( $value ); ?>">
			<input type="button" class="button button-primary customizer-repeater-custom-media-button" value="<?php esc_html_e( 'Upload Image','bfastmag' ); ?>" />
		</div>
		<?php
	}

 
}
