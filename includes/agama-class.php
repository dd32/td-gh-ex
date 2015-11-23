<?php 
// Prevent direct access to the file
if( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Agama Class
 *
 * @since 1.1.1
 */
if( ! class_exists( 'Agama' ) ) {
	class Agama {
		
		/**
		 * Class Constructor
		 *
		 * @since 1.1.1
		 */
		function __construct() {
			
			// Favicon init
			add_filter( 'wp_head', array( $this, 'agama_favicon' ) );
			
			// Extends body class init
			add_filter( 'body_class', array( $this, 'body_class' ) );
			
			// Excerpt lenght init
			add_filter( 'excerpt_length', array( $this, 'excerpt_length' ), 999 );
			
			// Excerpt "more" link init
			add_filter('excerpt_more', array( $this, 'excerpt_more' ) );
			
			// Add button class to post edit links init
			add_filter( 'edit_post_link', array( $this, 'edit_post_link' ) );
			
			// Add button class to comment edit links init
			add_filter( 'edit_comment_link', array( $this, 'edit_comment_link' ) );
		}
		
		/**
		 * Agama Favicon
		 *
		 * @since 1.1.5
		 */
		function agama_favicon() {
			if( get_theme_mod( 'agama_favicon', '' ) ) {
				echo '<link rel="shortcut icon" href="'. esc_url( get_theme_mod( 'agama_favicon', '' ) ) .'" />'."\n";
			}
		}
		
		/**
		 * Extend the default WordPress body classes.
		 *
		 * @since Agama 1.0.0
		 * @param array $classes Existing class values.
		 * @return array Filtered class values.
		 */
		function body_class( $classes ) {
			$background_color 	= get_background_color();
			$background_image 	= get_background_image();
			$header 			= get_theme_mod('agama_header_style', 'default');
			$sidebar_position	= get_theme_mod('agama_sidebar_position', 'right');
			$blog_layout 		= get_theme_mod('agama_blog_layout', 'list');
			
			// If header "sticky"
			if(  $header == 'sticky' ) {
				$classes[] = 'sticky_header';
			}
			
			// If sidebar position "left"
			if( $sidebar_position == 'left' ) {
				$classes[] = 'sidebar_left';
			}
			
			// If blog layout "small_thumbs"
			if( $blog_layout == 'small_thumbs' ) {
				$classes[] = 'blog_small_thumbs';
			}
			
			// If blog layout "grid"
			if( $blog_layout == 'grid' ) {
				$classes[] = 'blog_grid';
			}
			
			// If page template "full-width"
			if ( is_page_template( 'page-templates/full-width.php' ) ) { 
				$classes[] = 'full-width'; 
			}
			
			// If page template "front-page"
			if ( is_page_template( 'page-templates/front-page.php' ) ) {
				$classes[] = 'template-front-page';
				if ( has_post_thumbnail() )
					$classes[] = 'has-post-thumbnail';
			}
			
			// If empty background
			if ( empty( $background_image ) ) {
				if ( empty( $background_color ) )
					$classes[] = 'custom-background-empty';
				elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
					$classes[] = 'custom-background-white';
			}

			// Enable custom font class only if the font CSS is queued to load.
			if ( wp_style_is( 'PTSans', 'queue' ) )
				$classes[] = 'custom-font-enabled';
			
			// Single Author
			if ( ! is_multi_author() )
				$classes[] = 'single-author';

			return $classes;
		}
		
		/**
		 * Agama Breadcrumb
		 *
		 * @since 1.1.5
		 */
		public static function breadcrumb() {
			global $post;
			
			$h1 = '';
			$output = '';

			if( is_single() || is_page() ) {
				$h1 	= sprintf( '<h1>%s</h1>', $post->post_title );
				$output = sprintf( '<li class="active">%s</li>', $post->post_title );
			}
			
			if( is_archive() ) {
				if ( is_day() ) :
					$h1 	= sprintf( '<h1>%s</h1> <span>%s</span>', __( 'Daily Archives', 'agama-pro' ), get_the_date() );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Daily Archives', 'agama-pro' ) );
				elseif ( is_month() ) :
					$h1 	= sprintf( '<h1>%s</h1> <span>%s</span>', __( 'Monthly Archives', 'agama-pro' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'agama-pro' ) ) );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Monthly Archives', 'agama-pro' ) );
				elseif ( is_year() ) :
					$h1		= sprintf( '<h1>%s</h1> <span>%s</span>', __( 'Yearly Archives', 'agama-pro' ), get_the_date( _x( 'Y', 'yearly archives date format', 'agama-pro' ) ) );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Yearly Archives', 'agama-pro' ) );
				else :
					$h1		= __( 'Archives', 'agama-pro' );
					$output = sprintf( '<li class="active">%s</li>', __( 'Archives', 'agama-pro' ) );
				endif;
			}
			
			if( is_category() ) {
				$span = '';
				
				if( category_description() ) {
					$cat_desc 	= strip_tags( category_description() );
					$span		= sprintf( '<span>%s</span>', $cat_desc );
				}
				
				$category	= get_the_category();
				$cat_ID		= $category[0]->cat_ID;
				$h1			= sprintf( '<h1>%s</h1>', single_cat_title( '', false ) ) . $span;
				$output		= sprintf( '<li class="active">%s</li>', single_cat_title( '', false ) );
			}
			
			
			if( is_tag() ) {
				$h1		= sprintf( '<h1>%s</h1>', __( 'Tag', 'agama-pro' ) );
				$output	= sprintf( '<li class="active">%s</li>', single_tag_title('', false) );
			}
			
			if( is_404() ) {
				$h1		= sprintf( '<h1>%s</h1> <span>%s</span>', '404', __( 'Page not Found', 'agama-pro' ) );
				$output	= sprintf( '<li class="active">%s</li>', __( 'Page not Found', 'agama-pro' ) );
			}
			
			if( is_search() ) {
				$h1		= sprintf( '<h1>%s</h1>', __( 'Search', 'agama-pro' ) );
				$output = sprintf( '<li class="active">%s</li>', __( 'Search', 'agama-pro' ) );
			}
			
			// WooCommerce
			if( class_exists('Woocommerce') ) {
				
				if( is_shop() ) {
					$h1		= sprintf( '<h1>%s</h1>', __( 'Shop', 'agama-pro' ) );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Shop', 'agama-pro' ) );
				}
				
			}
			
			if( is_home() || is_front_page() ) {
				$h1 	= sprintf( '<h1>%s</h1>', __( 'Homepage', 'agama-pro' ) );
				$output	= '';
			} 
			
			$style = get_theme_mod( 'agama_breadcrumb_style', 'mini' ) == 'mini' ? 'page-title-mini' : ''; ?>
			
			<!-- Breadcrumb -->
			<section id="page-title" <?php if( $style ): ?>class="<?php echo esc_attr( $style ); ?>"<?php endif; ?>>

				<div class="container clearfix">
					<?php echo $h1; ?>
					<ol class="breadcrumb">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'agama-pro' ); ?></a></li>
							<?php echo $output; ?>
					</ol>
				</div>

			</section><!-- / Breadcrumb -->
			
		<?php }
		
		/**
		 * Excerpt Lenght
		 *
		 * @since 1.0.0
		 */
		function excerpt_length( $length ) {
			return esc_attr( get_theme_mod('agama_blog_excerpt', '60') );
		}
		
		/**
		 * Replaces Excerpt "more" Text by Link
		 *
		 * @since 1.1.1
		 */
		function excerpt_more( $more ) {
			global $post;
			if( get_theme_mod('agama_blog_readmore_url', true) ) {
				return sprintf('<br><br><a class="more-link" href="%s">%s</a>', get_permalink($post->ID), __('Read More', 'agama'));
			}
			return;
		}
		
		/**
		 * Add Class to Post Edit Link
		 *
		 * @since 1.1.1
		 */
		function edit_post_link( $output ) {
			$output = str_replace('class="post-edit-link"', 'class="button button-3d button-mini button-rounded"', $output);
			return $output;
		}
		
		/**
		 * Add Class to Post Edit Comment Link
		 *
		 * @since 1.1.1
		 */
		function edit_comment_link( $output ) {
			$output = str_replace('class="comment-edit-link"', 'class="button button-3d button-mini button-rounded"', $output);
			return $output;
		}
		
		/**
		 * Render Menu Content
		 *
		 * @since 1.1.1
		 */
		public static function menu( $location = false, $class = false ) {
			
			// If location not set
			if( ! $location )
				return;
			
			$args = array(
				'theme_location' => $location,
				'menu_class' => $class,
				'container' => false,
				'echo' => '0'
			);
			
			$menu = wp_nav_menu( $args );
			
			return $menu;
		}
		
		/**
		 * Render Social Icons
		 *
		 * @since 1.1.1
		 * @updated @since 1.1.2
		 */
		public static function sociali( $tip_position = false, $style = false ) {
			
			// Url target
			$_target = esc_attr( get_theme_mod('agama_social_url_target', '_self') );
			
			// Social icons
			$social  = array(
				'Facebook'	=> esc_url( get_theme_mod('social_facebook', '') ),
				'Twitter'	=> esc_url( get_theme_mod('social_twitter', '') ),
				'Flickr'	=> esc_url( get_theme_mod('social_flickr', '') ),
				'Vimeo'		=> esc_url( get_theme_mod('social_vimeo', '') ),
				'Youtube'	=> esc_url( get_theme_mod('social_youtube', '') ),
				'Instagram'	=> esc_url( get_theme_mod('social_instagram', '') ),
				'Pinterest'	=> esc_url( get_theme_mod('social_pinterest', '') ),
				'Tumblr'	=> esc_url( get_theme_mod('social_tumblr', '') ),
				'Google'	=> esc_url( get_theme_mod('social_google', '') ),
				'Dribbble'	=> esc_url( get_theme_mod('social_dribbble', '') ),
				'Digg'		=> esc_url( get_theme_mod('social_digg', '') ),
				'Linkedin'	=> esc_url( get_theme_mod('social_linkedin', '') ),
				'Blogger'	=> esc_url( get_theme_mod('social_blogger', '') ),
				'Skype'		=> esc_html( get_theme_mod('social_skype', '') ),
				'Forrst'	=> esc_url( get_theme_mod('social_forrst', '') ),
				'Myspace'	=> esc_url( get_theme_mod('social_myspace', '') ),
				'Deviantart'=> esc_url( get_theme_mod('social_deviantart', '') ),
				'Yahoo'		=> esc_url( get_theme_mod('social_yahoo', '') ),
				'Reddit'	=> esc_url( get_theme_mod('social_reddit', '') ),
				'PayPal'	=> esc_url( get_theme_mod('social_paypal', '') ),
				'Dropbox'	=> esc_url( get_theme_mod('social_dropbox', '') ),
				'Soundcloud'=> esc_url( get_theme_mod('social_soundcloud', '') ),
				'VK'		=> esc_url( get_theme_mod('social_vk', '') ),
				'Email'		=> esc_url( get_theme_mod('social_email', '') ),
				'RSS'		=> esc_url( get_theme_mod('social_rss', get_bloginfo('rss2_url')) )
			);
			if( $style == 'animated' ):
				echo '<ul>';
				foreach( $social as $name => $url ) {
					if( ! empty( $url ) ) {
						echo sprintf
						(
							'<li><a class="tv-%s" href="%s" target="%s"><span class="tv-icon"><i class="fa fa-%s"></i></span><span class="tv-text">%s</span></a></li>', 
							esc_attr( strtolower($name) ), $url, $_target, esc_attr( strtolower( $name ) ), esc_attr( $name )
						);
					}
				}
				echo '</ul>';
			else:
				foreach( $social as $name => $url ) {
					if( ! empty( $url ) ) {
						echo sprintf
						(
							'<a class="social-icons %s" href="%s" target="%s" data-toggle="tooltip" data-placement="%s" title="%s"></a>', 
							esc_attr( strtolower($name) ), $url, $_target, esc_attr( $tip_position ), esc_attr( $name )
						);
					}
				}
			endif;
		}
		
		/**
		 * Get Post Format
		 *
		 * @since 1.1.1
		 */
		public static function post_format() {
			$post_format = get_post_format();
			
			switch( $post_format ) {

				case 'aside':
					$icon = '<i class="fa fa-outdent"></i>';
				break;
				
				case 'chat':
					$icon = '<i class="fa fa-wechat"></i>';
				break;
				
				case 'gallery':
					$icon = '<i class="fa fa-photo"></i>';
				break;
				
				case 'link':
					$icon = '<i class="fa fa-link"></i>';
				break;
				
				case 'image':
					$icon = '<i class="fa fa-image"></i>';
				break;
				
				case 'quote':
					$icon = '<i class="fa fa-quote-left"></i>';
				break;
				
				case 'status':
					$icon = '<i class="fa fa-check-circle"></i>';
				break;
				
				case 'video':
					$icon = '<i class="fa fa-video-camera"></i>';
				break;
				
				case 'audio':
					$icon = '<i class="fa fa-volume-up"></i>';
				break;
				
				default: $icon = '<i class="fa fa-camera-retro"></i>';
				
			}
			
			return $icon;
		}
		
		/**
		 * Count Comments
		 *
		 * @since 1.1.1
		 */
		public static function comments_count() {
			$comments = 0;
			
			if( comments_open() ) {
				$comments = sprintf('<a href="%s">%s</a>', get_comments_link(), get_comments_number() . __( ' comments', 'agama' ) );
			}
			
			return $comments;
		}
		
		/**
		 * Render About Author on Single Posts
		 *
		 * @since 1.1.1
		 */
		public static function about_author() { ?>
			<?php 
			if ( 
				 is_singular() && 
				 get_the_author_meta( 'description' ) && 
			     get_theme_mod( 'agama_blog_about_author', true ) 
				) : ?>
				
			<div class="author-info">
				<div class="author-avatar">
					<?php
					/** This filter is documented in author.php */
					$author_bio_avatar_size = apply_filters( 'agama_author_bio_avatar_size', 68 );
					echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
					?>
				</div>
				<div class="author-description">
					<h2><?php printf( __( 'About %s', 'agama' ), get_the_author() ); ?></h2>
					<p><?php the_author_meta( 'description' ); ?></p>
					<div class="author-link">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'agama' ), get_the_author() ); ?>
						</a>
					</div>
				</div>
			</div>
			
		<?php endif; ?>
		<?php
		}
	}
	new Agama;
}