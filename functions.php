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

define('astral_THEME_REVIEW_URL','https://wordpress.org/support/theme/astral/reviews/?filter=5');
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
//require ASTRAL_PARENT_URI . '/google-font.php';

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


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function astral_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'astral_skip_link_focus_fix' );


/**
* display notice 
**/

if ( $pagenow == 'index.php' || $pagenow == 'themes.php' ) {
	add_action( 'admin_notices', 'astral_activation_notice' );
}

function astral_activation_notice(){
$my_theme = wp_get_theme();	
?>
    <style>
		a.reply-btn {
			display: initial;
			margin: 0 auto;
			border-radius: 4px;
			color: #fff;
			background: #0e6ec4;
			padding: 10px;
			text-decoration: none;
		}
		.hello-elementor-notice-content {
			padding: 28px;
			text-align: center;
		}
		.notice h3 {
			margin: 0 0 5px;
		}
		.notice.updated.is-dismissible {
			padding: 15px;
		}
		a.rate-btn {
			font-size: 11px;
			text-decoration: none;
			background: #153e4d;
			padding: 3px 10px;
			color: #fff;
		}
		a.support-btn {
			margin-left: 10px;
			text-decoration: none;
		}
		.review-page {
			background: rgba(221, 240, 249, 0.8) !important;
			padding: 15px;
			border-left-color: #e0f0f7 !important;
		}
		.notice.updated.is-dismissible.review-page {
			border-left: 1px solid #ccd0d4 !important;
		}
	</style>

    <div class="notice updated is-dismissible review-page">
		<div class="hello-elementor-notice-inner">
			<div class="hello-elementor-notice-content">
				<h3> <?php _e('Thank you for installing', 'astral'); ?> <?php echo $my_theme->get( 'Name' ); ?>
				<?php echo esc_html_e('Version - ','astral'); ?>
				 <?php echo esc_html( $my_theme->get('Version') ); ?>
				</h3>
				
				<p style="margin-bottom: 18px;"><?php 
				_e(' Are you are enjoying Astral? We would love to hear your feedback. Big thanks in advance.','astral'); ?> </p>
				<a target="_blank" class="reply-btn" href="https://wordpress.org/support/theme/astral/reviews/#new-post"> <?php _e('Submit a review','astral'); ?> </a>
				
				<a target="_blank" class="reply-btn" style="margin-left: 18px;" href="<?php echo admin_url('/themes.php?page=astral'); ?>" > <?php _e('Welcome Page','astral'); ?> </a>
				
			</div>
		</div>
	</div>
<?php } 

/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'astral_Font_Control' ) ) :
class astral_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  <?php  $google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCEf2B8_jirXe78wunEHiuyYV0Jrqcw16g';
			//lets fetch it
			$response = wp_remote_retrieve_body( wp_remote_get($google_api_url, array('sslverify' => false )));
			if($response==''){ echo '<script>jQuery(document).ready(function() {alert("Something went wrong! this works only when you are connected to Internet....!!");});</script>'; }
			if( is_wp_error( $response ) ) {
			   echo 'Something went wrong!';
			} else {
			$json_fonts = json_decode($response,  true);
			// that's it
			$items = $json_fonts['items'];
			$i = 0; ?>
   <select <?php $this->link(); ?> >
   <?php foreach( $items as $item) { $i++; $str = $item['family']; ?>
    <option  value="<?php echo esc_attr($str); ?>" <?php if($this->value()== $str) echo 'selected="selected"';?>><?php echo esc_attr($str); ?></option>
   <?php } ?>
    </select>
	<?php 
 }
}
}
endif;

if (is_admin()) {
	require_once('inc/astral-pro-intro.php');
}