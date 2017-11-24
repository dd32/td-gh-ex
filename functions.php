<?php

function bfastmag_enqueue_styles() {

    $parent_style = 'bfastmag'; // This is 'bfastmag-style' for the bfastMag theme.

    wp_enqueue_style( 'bfastmag-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css',array(), '3.3.5' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'bfastmag_enqueue_styles');





if ( ! function_exists( 'bfastmag_page_start' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_page_start() {
	?>
	<div id="page" class="site">
		<div id="wrapper">
			<?php
		}
	endif;
	add_action( 'bfastmag_action_page_start', 'bfastmag_page_start', 15 );

	if ( ! function_exists( 'bfastmag_header' ) ) :
/**
 * Main header
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_header() {
	?>
	<header id="header" class="site-header tp_header_v2" role="banner">
		<div  class="navbar-top container-fluid">

			<?php bfastmag_action_inner_navbar_top(); ?>

			<div class="navbar-left social-links">
				<?php               if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Header Social Links Menu', 'bfastmag' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . bfastmag_get_svg( array( 'icon' => 'chain' ) ),
						) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;?>
			</div>


			<span class="breaking"><?php esc_html_e('Trending', 'bfastmag' );?></span>
			<div class="bfastmag-breaking-container"><ul class="bfastmag-breaking">
				<?php
				$wp_query = new WP_Query( array(
                //'posts_per_page'        => $bfastmag_featured_slider_max_posts,
					'posts_per_page'        => 4,
					'order'                 => 'DESC',
					'post_status'           => 'publish',
				) );

				while ( $wp_query->have_posts() ) : $wp_query->the_post();
					?>
					<li>
						<?php the_title( sprintf( ' <a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>', apply_filters( 'bfastmag_filter_article_title_on_slider_posts',true ) ); ?>

					</li> 
					<?php
				endwhile;
				wp_reset_postdata(); 
				?></ul>
			</div>   <!-- .bfastmag-breaking-container -->

			<div class="navbar-right">
				<div id="navbar" class="navbar">
					<nav id="navigation-top" class="navigation-top" role="navigation">
						<button class="menu-toggle"><i class="fa fa-bars"></i></button>

						<?php bfastmag_action_header_links();
						if ( has_nav_menu( 'bfastmag-top' ) ) {
							wp_nav_menu( array(
								'theme_location' => 'bfastmag-top',
								'menu_class' => 'nav-menu',
								'menu_id' => 'primary-menu',
								'depth' => 1,
							) );  
						} 
						?>
					</nav><!-- #navigation-top -->
				</div>
				<div class="tp_time_date"><i class="fa fa-calendar-o"></i><span><?php  echo date(get_option('date_format'));?></span></div>
			</div>

			<?php bfastmag_after_navbar_top();?>

		</div>

		<div class="inner-header clearfix">

			<?php bfastmag_action_inner_header(); ?>

			<div class="col-md-12 navbar-brand">
				<div class="site-branding">
					<?php

					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :

						the_custom_logo();

						echo '<div class="head-logo-container text-header bfastmag_customizer_only">';
						echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
						echo '<p itemprop="description" id="site-description" class="site-description">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
						echo '</div>';

					else :

						echo '<div class="head-logo-container text-header">';
						echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
						echo '<p itemprop="description" id="site-description" class="site-description">' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
						echo '</div>';

					endif;
					?>
				</div><!-- .site-branding -->
			</div>


			<?php bfastmag_action_after_inner_header(); ?>

		</div> <!--.inner-header-->

		<?php bfastmag_action_before_main_nav(); ?>

		<?php $bfastmag_sticky_menu = get_theme_mod( 'bfastmag_sticky_menu', false ); ?>

		<div id="navbar" class="navbar <?php if ( isset( $bfastmag_sticky_menu ) && $bfastmag_sticky_menu == false ) { echo 'bfastmag-sticky';} ?>">

			<nav id="site-navigation" class="navigation main-navigation" role="navigation">
				<button class="menu-toggle"><i class="fa fa-bars"></i></button>
				<button type="button" class="navbar-btn nav-mobile"><i class="fa fa-search"></i></button>
				<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'bfastmag' ); ?>"><?php esc_html_e( 'Skip to content', 'bfastmag' ); ?></a>

				<?php 

				wp_nav_menu( array(
					'theme_location' => 'bfastmag-primary',
					'menu_class' => 'nav-menu',
					'menu_id' => 'primary-menu',
					'depth' => 6,
				) );
				?>

				<button type="button" class="navbar-btn nav-desktop"><i class="fa fa-search"></i></button>

				<div class="navbar-white top" id="header-search-form">
					<?php get_search_form(); ?>
				</div><!-- End #header-search-form -->

			</nav><!-- #site-navigation -->


		</div><!-- #navbar -->

		<?php bfastmag_action_after_main_nav(); ?>


	</header><!-- End #header -->
	<?php 
}
endif;
add_action( 'bfastmag_action_header', 'bfastmag_header', 10 );
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
	echo ' <div class="singlePostcontainer current"><div class="container"><div class="row">   <div id="primary" class="content-area singlev1"><div class="newsmagz-content-left '.esc_attr($layout).' current"><main id="main" class="site-main" role="main"><div class="row"><div class="col-md-12"><div class="sArticlWrapper  ">';
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
 
	$wp_customize->remove_section('bfastmag_featured_big');
	$wp_customize->add_control( 'bfastmag_featured_slider_disable');
	$wp_customize->add_control( 'bfastmag_featured_slider_category');
	$wp_customize->add_control( 'bfastmag_featured_slider_max_posts');
	$wp_customize->add_control( 'bfastmag_featured_slider_title');
 	$wp_customize->remove_section('bfastmag_block1');
	$wp_customize->remove_control('bfastmag_block2_category');
	$wp_customize->remove_control('bfastmag_block3_category');
	$wp_customize->remove_control('bfastmag_block4_category');
	$wp_customize->get_section( 'bfastmag_block2' )->title     = __( 'Latest Products or Category', 'bfastmag' );
	$wp_customize->get_section( 'bfastmag_block3' )->title     = __( 'Products Slider', 'bfastmag' );
	$wp_customize->get_section( 'bfastmag_block4' )->title     = __( 'Category Block', 'bfastmag' );


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

 
	$wp_customize->add_setting( 'bfastmag_block23_category', array(
		'default'           => 'all',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'bfastmag_sanitize_category_dropdown2',
	) );

	$wp_customize->add_control( new bfastmagChooseCategoryPro( $wp_customize, 'bfastmag_block23_category', array(
		'label'    => esc_html__( 'Category', 'bfastmag' ),
		'section'  => 'bfastmag_block3',
		'priority' => 4,
	) ) );

	$wp_customize->add_setting( 'bfastmag_block24_category', array(
		'default'           => 'all',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'bfastmag_sanitize_category_dropdown2',
	) );

	$wp_customize->add_control( new bfastmagChooseCategoryPro( $wp_customize, 'bfastmag_block24_category', array(
		'label'    => esc_html__( 'Category', 'bfastmag' ),
		'section'  => 'bfastmag_block4',
		'priority' => 4,
	) ) );

 
 

		$wp_customize->add_setting( 'bfastmag_shop_fw_slider', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'bfastmag_sanitize_repeater',
	) );
	$wp_customize->add_control( new bfastmag_General_Repeater_slider( $wp_customize, 'bfastmag_shop_fw_slider', array(
		'label'                => esc_html__( 'Add New Full Width Slider', 'bfastmag' ),
		'section'              => 'bfastmag_featured_slider',
		'priority'             => 1,
		'bfastmag_bannerlink_control' => true,
		'bfastmag_link_control' => true,
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
/**
 * Class bfastmag_General_Repeater_banner
 */
class bfastmag_General_Repeater_slider extends WP_Customize_Control {

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
	private $customizer_repeater_title_control = true;
	private $customizer_repeater_description_control = true;
	private $customizer_repeater_button_control = true;

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
		$this->boxtitle   = __( 'Slider','bfastmag' );

		if ( ! empty( $args['bfastmag_bannerlink_control'] ) ) {
			$this->customizer_repeater_icon_control = $args['bfastmag_bannerlink_control'];
		}

		if ( ! empty( $args['bfastmag_link_control'] ) ) {
			$this->customizer_repeater_link_control = $args['bfastmag_link_control'];
		}	

		if ( ! empty( $args['bfastmag_title_control'] ) ) {
			$this->customizer_repeater_title_control = $args['bfastmag_title_control'];
		}

		if ( ! empty( $args['bfastmag_description_control'] ) ) {
			$this->customizer_repeater_description_control = $args['bfastmag_description_control'];
		}

		if ( ! empty( $args['bfastmag_button_control'] ) ) {
			$this->customizer_repeater_button_control = $args['bfastmag_button_control'];
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
		wp_enqueue_style( 'customizer-repeater', get_stylesheet_directory_uri() . '/inc/customizer/customizer_repeater.css' );

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
			<?php esc_html_e( 'Add New Slide', 'bfastmag' ); ?>
		</button>
				<div class="bfastmag-pro-notif"> <?php esc_html_e( 'Add Slide Only in pro Version(Slider)', 'bfastmag' );?></div>

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
						$description = '';
						$button = '';
						$subtitle = '';
						$text = '';
						$link = '';
						$title = '';
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
						if ( ! empty( $icon->title ) ) {
							$title = $icon->title;
						}					

						if ( ! empty( $icon->description ) ) {
							$description = $icon->description;
						}	
						if ( ! empty( $icon->button ) ) {
							$button = $icon->button;
						}
						$this->image_control( $image_url, 'image' );
						if ( $this->customizer_repeater_link_control ) {
							$this->input_control(array(
								'label' => __( 'Slider Link','bfastmag' ),
								'class' => 'bfastmag_link_control',
								'sanitize_callback' => 'esc_url',
							), $link);
						} 					

						if ( $this->customizer_repeater_title_control ) {
							$this->input_control(array(
								'label' => __( 'Slider Title','bfastmag' ),
								'class' => 'bfastmag_title_control',
								'sanitize_callback' => 'sanitize_text_field',
							), $title);
						} 

						if ( $this->customizer_repeater_description_control ) {
							$this->input_control(array(
								'label' => __( 'Slider description','bfastmag' ),
								'class' => 'bfastmag_description_control',
								'sanitize_callback' => 'sanitize_text_field',
							), $description);
						} 

						if ( $this->customizer_repeater_button_control ) {
							$this->input_control(array(
								'label' => __( 'Slider Button Text','bfastmag' ),
								'class' => 'bfastmag_button_control',
								'sanitize_callback' => 'sanitize_text_field',
							), $button);
						} 

						?>

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
						'label' => __( 'Slider Link', 'bfastmag' ),
						'class' => 'bfastmag_link_control',
					) );
				} 

				if ( $this->customizer_repeater_title_control == true ) {
					$this->input_control( array(
						'label' => __( 'Slider Title', 'bfastmag' ),
						'class' => 'bfastmag_title_control',
					) );
				} 
						if ( $this->customizer_repeater_description_control == true ) {
					$this->input_control( array(
						'label' => __( 'Slider description', 'bfastmag' ),
						'class' => 'bfastmag_description_control',
					) );
				} 
				if ( $this->customizer_repeater_button_control == true ) {
					$this->input_control( array(
						'label' => __( 'Slider Button Text', 'bfastmag' ),
						'class' => 'bfastmag_button_control',
					) );
				} 
		

				?>
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
				<?php esc_html_e( 'Slider Image','bfastmag' )?>
			</span>
			<input type="text" class="widefat custom-media-url" value="<?php echo esc_attr( $value ); ?>">
			<input type="button" class="button button-primary customizer-repeater-custom-media-button" value="<?php esc_html_e( 'Upload Image','bfastmag' ); ?>" />
		</div>
		<?php
	}

}



function bfastmag_theme_mods() {
	set_theme_mod('bfastmag_featured_slider_disable', true);
	set_theme_mod('bfastmag_featured_big_disable', true);
	set_theme_mod('bfastmag_featured_slider_disable', true);
	set_theme_mod('bfastmag_block1_disable', false);

}

add_action( 'init', 'bfastmag_theme_mods' );