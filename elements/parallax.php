<?php
/**
 * Title: Parallax Element
 *
 * Description: Adds parallax effect to different elements.
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( !class_exists( 'CyberChimpsParallax' ) ) {
	class CyberChimpsParallax {

		protected static $instance;
		public $options;
		public $slider_parallax_toggle;
		public $slider_parallax_image;
		public $portfolio_parallax_toggle;
		public $portfolio_parallax_image;
		public $boxes_parallax_toggle;
		public $boxes_parallax_image;
		public $body_parallax_toggle;

		/* Static Singleton Factory Method */
		public static function instance() {
			if ( !isset( self::$instance ) ) {
				$className      = __CLASS__;
				self::$instance = new $className;
			}

			return self::$instance;
		}

		/**
		 * Initializes plugin variables and sets up WordPress hooks/actions.
		 *
		 * @return void
		 */
		protected function __construct() {
			$this->options = get_option( 'cyberchimps_options' );
			add_action( 'wp_enqueue_scripts', array( $this, 'cyberchimps_parallax_scripts' ) );
			add_action( 'wp_footer', array( $this, 'cyberchimps_parallax_render' ) );

			add_filter( 'cyberchimps_field_filter', array( $this, 'cyberchimps_parallax_fields' ) );

			// Set slider options
			$this->slider_parallax_toggle = ( isset( $this->options['cyberchimps_blog_slider_parallax'] ) ) ? $this->options['cyberchimps_blog_slider_parallax'] : 1;
			$this->slider_parallax_image  = ( isset( $this->options['cyberchimps_blog_slider_parallax_image'] ) ) ? $this->options['cyberchimps_blog_slider_parallax_image'] : get_template_directory_uri() . '/images/parallax/sun.jpg';

			// Set portfolio parallax options.
			$this->portfolio_parallax_toggle = ( isset( $this->options['cyberchimps_blog_portfolio_parallax'] ) ) ? $this->options['cyberchimps_blog_portfolio_parallax'] : 1;
			$this->portfolio_parallax_image  = ( isset( $this->options['cyberchimps_blog_portfolio_parallax_image'] ) ) ? $this->options['cyberchimps_blog_portfolio_parallax_image'] : get_template_directory_uri() . '/images/parallax/trees.jpg';

			// Get boxes parallax options.
			$this->boxes_parallax_toggle = ( isset( $this->options['cyberchimps_blog_boxes_parallax'] ) ) ? $this->options['cyberchimps_blog_boxes_parallax'] : 1;
			$this->boxes_parallax_image  = ( isset( $this->options['cyberchimps_blog_boxes_parallax_image'] ) ) ? $this->options['cyberchimps_blog_boxes_parallax_image'] : get_template_directory_uri() . '/images/parallax/rocks.jpg';

			// Get boxes parallax options.
			$this->body_parallax_toggle = ( isset( $this->options['cyberchimps_body_parallax'] ) ) ? $this->options['cyberchimps_body_parallax'] : 1;
		}

		/**
		 * Sets up scripts for parallax
		 */
		public function cyberchimps_parallax_scripts() {

			// Add parallax js library.
			wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/elements/lib/js/jquery.parallax.min.js', array( 'jquery' ) );
		}

		/**
		 * Adds option fields to blog options
		 *
		 * @param $original
		 *
		 * @return mixed
		 */
		public function cyberchimps_parallax_fields( $original ) {

			// Slider parallax toggle.
			$new_field[][2] = array(
				'name'    => __( 'Parallax', 'cyberchimps_elements' ),
				'id'      => 'cyberchimps_blog_slider_parallax',
				'type'    => 'toggle',
				'std'     => 1,
				'section' => 'cyberchimps_blog_slider_lite_section',
				'heading' => 'cyberchimps_blog_heading'
			);

			// Slider parallax image.
			$new_field[][3] = array(
				'name'    => __( 'Background image for parallax', 'cyberchimps_elements' ),
				'desc'    => __( 'Enter URL or upload file', 'cyberchimps_elements' ),
				'id'      => 'cyberchimps_blog_slider_parallax_image',
				'class'   => 'cyberchimps_blog_slider_parallax_toggle',
				'type'    => 'upload',
				'std'     => get_template_directory_uri() . '/images/parallax/sun.jpg',
				'section' => 'cyberchimps_blog_slider_lite_section',
				'heading' => 'cyberchimps_blog_heading'
			);

			// Portfolio parallax toggle.
			$new_field[][2] = array(
				'name'    => __( 'Parallax', 'cyberchimps_elements' ),
				'id'      => 'cyberchimps_blog_portfolio_parallax',
				'type'    => 'toggle',
				'std'     => 1,
				'section' => 'cyberchimps_blog_portfolio_lite_section',
				'heading' => 'cyberchimps_blog_heading'
			);

			// Portfolio parallax image.
			$new_field[][3] = array(
				'name'    => __( 'Background image for parallax', 'cyberchimps_elements' ),
				'desc'    => __( 'Enter URL or upload file', 'cyberchimps_elements' ),
				'id'      => 'cyberchimps_blog_portfolio_parallax_image',
				'class'   => 'cyberchimps_blog_portfolio_parallax_toggle',
				'type'    => 'upload',
				'std'     => get_template_directory_uri() . '/images/parallax/trees.jpg',
				'section' => 'cyberchimps_blog_portfolio_lite_section',
				'heading' => 'cyberchimps_blog_heading'
			);

			// Boxes parallax toggle.
			$new_field[][2] = array(
				'name'    => __( 'Parallax', 'cyberchimps_elements' ),
				'id'      => 'cyberchimps_blog_boxes_parallax',
				'type'    => 'toggle',
				'std'     => 1,
				'section' => 'cyberchimps_blog_boxes_lite_section',
				'heading' => 'cyberchimps_blog_heading'
			);

			// Boxes parallax image.
			$new_field[][3] = array(
				'name'    => __( 'Background image for parallax', 'cyberchimps_elements' ),
				'desc'    => __( 'Enter URL or upload file', 'cyberchimps_elements' ),
				'id'      => 'cyberchimps_blog_boxes_parallax_image',
				'class'   => 'cyberchimps_blog_boxes_parallax_toggle',
				'type'    => 'upload',
				'std'     => get_template_directory_uri() . '/images/parallax/rocks.jpg',
				'section' => 'cyberchimps_blog_boxes_lite_section',
				'heading' => 'cyberchimps_blog_heading'
			);

			// Body parallax toggle.
			$new_field[][1] = array(
				'name'    => __( 'Parallax', 'cyberchimps_elements' ),
				'id'      => 'cyberchimps_body_parallax',
				'desc'    => __( 'Set the background image at Appearance > Background to get parallax effect on whole body.', 'cyberchimps_elements' ),
				'type'    => 'toggle',
				'std'     => 1,
				'section' => 'cyberchimps_custom_layout_section',
				'heading' => 'cyberchimps_design_heading'
			);

			$new_fields = cyberchimps_array_field_organizer( $original, $new_field );

			return $new_fields;
		}

// Set parallax to individual elements by checking toggle.
		public function cyberchimps_parallax_render() {
			?>
			<script>
				jQuery(document).ready(function () {
					<?php
					// Add parallax to slider.
					if( $this->slider_parallax_toggle && $this->slider_parallax_image ) { ?>
					jQuery('#slider_lite_section').css({
						'background-image': 'url("<?php echo $this->slider_parallax_image;?>")',
						'background-size': '100%'
					});
					jQuery('#slider_lite_section').parallax('50%', 0.5);
					<?php }
					// Add parallax to portfolio.
					if( $this->portfolio_parallax_toggle && $this->portfolio_parallax_image ) { ?>
					jQuery('#portfolio_lite_section').css({
						'background-image': 'url("<?php echo $this->portfolio_parallax_image;?>")',
						'background-size': '100%'
					});
					jQuery('#portfolio_lite_section').parallax('50%', 0.5);
					<?php }
					// Add parallax to boxes.
					if( $this->boxes_parallax_toggle && $this->boxes_parallax_image ) { ?>
					jQuery('#boxes_lite_section').css({
						'background-image': 'url("<?php echo $this->boxes_parallax_image;?>")',
						'background-size': '100%'
					});
					jQuery('#boxes_lite_section').parallax('50%', 0.5);
					<?php }
					// Add parallax to body.
					if( $this->body_parallax_toggle ) { ?>
					jQuery('body').parallax('50%', -0.5);
					<?php } ?>

				});
			</script>
		<?php
		}
	}
}