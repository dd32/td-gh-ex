<?php
/**
 * astral functions and code
 *
 * @package Astral
 * @since 0.1
 *
 */
/**
 * Define constants
 */
define( 'ASTRAL_PARENT_DIR', get_template_directory() );
define( 'ASTRAL_PARENT_URI', get_template_directory_uri() );
define( 'ASTRAL_PARENT_INC_DIR', ASTRAL_PARENT_DIR . '/inc' );
define( 'ASTRAL_PARENT_INC_URI', ASTRAL_PARENT_URI . '/inc' );
define( 'ASTRAL_PARENT_CORE_URI', ASTRAL_PARENT_INC_URI . '/core/' );
/* 
 * require classes 
*/
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-main.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-abstract-main.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-slider-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-about-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-service-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-contact-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-blog-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class_nav_social_walker.php';

/* 
 * customizer class
*/
require( dirname( __FILE__ ) . '/inc/core/class-astral-customizer.php' );
/*
 * Load hooks.
*/
require ASTRAL_PARENT_INC_DIR . '/hooks.php';
require ASTRAL_PARENT_INC_DIR . '/header.php';
require ASTRAL_PARENT_INC_DIR . '/footer.php';

require ASTRAL_PARENT_INC_DIR . '/core/class-wp-bootstrap-navwalker.php';
/* 
 * theme extra function 
*/
require ASTRAL_PARENT_INC_DIR . '/theme-function.php';

/* class for thumbnail images */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'astral_service' ) ) :
	class astral_service extends WP_Customize_Control {  
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php $args = array( 'post_type' => 'post', 'post_status'=>'publish'); 
				$slide_id = new WP_Query( $args ); ?>
				<select <?php $this->link(); ?> >
				<?php if($slide_id->have_posts()):
					while($slide_id->have_posts()):
						$slide_id->the_post(); ?>
						<option value= "<?php echo esc_attr(get_the_id()); ?>" <?php if($this->value()== get_the_id() ) echo 'selected="selected"';?>><?php the_title(); ?></option>
						<?php
					endwhile; 
				 endif; ?>
				</select>
		<?php
		}
	}
endif;