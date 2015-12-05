<?php
/**
 * Custom CSS.
 *
 * @package aesblo 
 * @since 1.0.0
 */
 
class Aesblo_Custom_Style {
	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		 add_action( 'wp_enqueue_scripts', array( $this, 'print_codes' ) );
	 }
	
	/**
	 * Print css codes.
	 *
	 * @since 1.0.0
	 * @access public 
	 *
	 * @return void.
	 */ 
	public function print_codes() {
		$primary_color = $this->get_primary_color();
		$primary_color_rgb = $this->hex2rgb( $primary_color, true );
		$secondary_color = $this->get_secondary_color();
		$secondary_color_rgb = $this->hex2rgb( $secondary_color, true );

		ob_start();
?>
<style type="text/css">
	/* Hide the site title and description. */
	<?php if ( ! display_header_text() ) : ?>
				.site-branding {
					display: none;
				}
	<?php endif; ?>
	
	/* Color scheme */
	a:link {
		color: <?php echo $secondary_color; ?>
	}
	
	blockquote:before,
	q:before {
		color: <?php echo $primary_color; ?>;
	}
	
	button,
	input[type="button"],
	input[type="submit"] {
		background: rgba(<?php echo $secondary_color_rgb; ?>,0.8);
		box-shadow: 0 5px rgba(<?php echo $secondary_color_rgb; ?>,1);
	}
	
	button:hover,
	input[type="button"]:hover,
	input[type="submit"]:hover {
		box-shadow: 0 4px rgba(<?php echo $secondary_color_rgb; ?>,1);
	}
	
	.widget,
	.widget a {
		color: white;
	}
	
	.site-header,
	.primary-sidebar-content,
	.secondary-sidebar {
		background-color: <?php echo $primary_color; ?>;
	}
	
	.widget_tag_cloud a:hover {
		color: <?php echo $primary_color; ?>;
	}
	
	.pagination .page-numbers,
	.page-links>span,
	.page-links>a {
		box-shadow: inset 0 0 0 2px <?php echo $primary_color; ?>;
		color: <?php echo $primary_color; ?>;
	}
	
	.pagination .page-numbers:after,
	.page-links>span:after,
	.page-links>a:after {
		box-shadow: inset 0 0 0 4px <?php echo $primary_color; ?>;
	}
	
	.pagination .page-numbers:hover,
	.page-links>span:hover,
	.page-links>a:hover {
		background: <?php echo $primary_color; ?>;
	}
	
	.pagination .next:hover,
	.pagination .prev:hover {
		color: <?php echo $primary_color; ?>;
	}
	
	.pagination .next:before,
	.pagination .prev:before {
		background: <?php echo $primary_color; ?>;
	}
	
	.pagination .current,
	.page-links>span {
		background: <?php echo $primary_color; ?>;
	}
	
	.post-navigation .nav-previous a {
		background: <?php echo $primary_color; ?>;
	}
	
	.post-navigation .nav-previous .meta-nav:hover {
		color: <?php echo $primary_color; ?>;
	}
	
	.entry-format .fa {
		box-shadow: 
			0 0 0 0.3em rgba(255, 255, 255, 0.6),
			inset 0 0 0 2px <?php echo $primary_color; ?>;
	}
	
	.entry-format .fa:after {
		background: <?php echo $primary_color; ?>;
	}	
	
	.entry-format .fa:hover {
		color: <?php echo $primary_color; ?>;
	}
	
	.entry-content .more-link {
		color: <?php echo $primary_color; ?>;
	}
	
	.entry-content .more-link:after {
		background: <?php echo $primary_color; ?>;
	}
	
	.author-info:hover {
		background: <?php echo $primary_color; ?>;
	}
	
	.post-navigation .nav-next a {
		background: <?php echo $secondary_color; ?>;	
	}	
	
	.post-navigation .nav-next .meta-nav:hover {
		color: <?php echo $secondary_color; ?>;
	}
	
	.author-info {
		background: <?php echo $secondary_color; ?>;
	}
	
	.comments-area .url {
		color: <?php echo $secondary_color; ?>;
	}
	
	.comments-area .reply {
		background: <?php echo $secondary_color; ?>;
	}
	
	.site-main .page-header {
		background: <?php echo $secondary_color; ?>;
	}
	
	.site-search {
		background: rgba(<?php echo $primary_color_rgb; ?>, 0.9);
	}
	
	.entry-footer,
	.entry-footer a {
		color: rgba(<?php echo $secondary_color_rgb; ?>, 0.5);
	}
	
	.entry-footer a:hover {
		color: rgba(<?php echo $secondary_color_rgb; ?>, 1);
	}	
	
	/* Add header background image, also display at the sidebar. */
	<?php 
		$header_bg_image = $this->get_header_image();
		if ( $header_bg_image ) : 
			$header_bg_image_mix = sprintf( 'radial-gradient(rgba(%1$s, 0.9), rgba(%1$s, 0.7)), url(%2$s)', $primary_color_rgb, $header_bg_image );
	?>
			.site-header,
			.primary-sidebar-content-expand,
			.secondary-sidebar-expand {
				background-size: cover;
				background-position: center;
				background-image: <?php echo $header_bg_image_mix; ?>;
			}
			
			.site-header {
				background-position: center, top;
			}
	<?php endif; ?>
	
	/* Add post nav background image */
	<?php 
		$post_nav_bg = $this->get_post_nav_background();
		if ( isset( $post_nav_bg['prev'] ) && $post_nav_bg['prev'] ): 
	?>
			.post-navigation .nav-previous a {
				background: rgba(<?php echo $primary_color_rgb; ?>, 0.3);
			}
			
			.post-navigation .nav-previous a:hover {
				background: rgba(<?php echo $primary_color_rgb; ?>, 0.8);
			}						
			
			.post-navigation .nav-previous:after {
				background-image: url(<?php echo $post_nav_bg['prev']; ?>);
			}
			
			.post-navigation .nav-previous:hover:after {
				transform: scale( 1.1 );
			}
	<?php endif; ?>
	
	<?php if ( isset( $post_nav_bg['next'] ) && $post_nav_bg['next'] ): ?>
			.post-navigation .nav-next a {
				background: rgba(<?php echo $secondary_color_rgb; ?>, 0.3);
			}
			
			.post-navigation .nav-next a:hover {
				background: rgba(<?php echo $secondary_color_rgb; ?>, 0.8);
			}						
			
			.post-navigation .nav-next:after {
				background-image: url(<?php echo $post_nav_bg['next']; ?>);
			}
			
			.post-navigation .nav-next:hover:after {
				transform: scale( 1.1 );
			}			
	<?php endif; ?>	
	
	@media screen and ( min-width: 992px ) {
		/* Color scheme */
		.primary-sidebar,
		.secondary-sidebar {
			background-color: <?php echo $primary_color; ?>;
		}
		
		/* Fixed sidebar top offset */
		<?php if ( is_admin_bar_showing() ) : ?>
				.primary-sidebar,
				.secondary-sidebar {
					top: 32px;
				}
		<?php endif; ?>
		
		/* Header background image. */
		<?php if ( $header_bg_image ) : ?>
				.site-header,
				.primary-sidebar-content {
					background-image: none;
					background-color: transparent;
				}
				
				.primary-sidebar-expand {
					background-size: cover;
					background-position: center;
					background-image: <?php echo $header_bg_image_mix; ?>;
				}
		<?php endif; ?>			
	}
</style>
<?php
		$custom_css = $this->sanitize_codes( ob_get_contents() );
		ob_end_clean();
		wp_add_inline_style( 'aesblo-style', $custom_css );	
	 }
	 
	 /**
	  * Get header background image.
	  *
	  * @since 1.0.0
	 * @access private		  
	  *
	  * @return string
	  */
	 function get_header_image() {
	 	return get_header_image();
	 }
	 
	 /**
	  * Get the primary color.
	  *
	  * @since 1.0.0
	 * @access private	  
	  *
	  * @return string
	  */
	 private function get_primary_color() {
	 	$mod = get_theme_mod( 'aesblo_customizer' );
		return isset( $mod[ 'primary_color' ] ) ? $mod[ 'primary_color' ] : '#D90000';
	 }
	 
	 /**
	  * Get the secondary color.
	  *
	  * @since 1.0.0
	 * @access private	  
	  *
	  * @return string
	  */
	 private function get_secondary_color() {
	 	$mod = get_theme_mod( 'aesblo_customizer' );
		return isset( $mod[ 'secondary_color' ] ) ? $mod[ 'secondary_color' ] : '#04756F';
	 }
	 
	 /**
	  * Get prev/next post thumbnail.
	  *
	  * @since 1.0.0
	 * @access private	  
	  *
	  * @return string
	  */
	 private function get_post_nav_background() {
		if ( ! is_single() ) {
			return;
		}
		
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		$css      = '';
		
		if ( is_attachment() && 'attachment' == $previous->post_type ) {
			return;
		}
		
		$thumb = array();
		
		if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
			$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
			$thumb['prev'] = esc_url( $prevthumb[0] );
		}
	
		if ( $next && has_post_thumbnail( $next->ID ) ) {
			$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
			$thumb['next'] = esc_url( $nextthumb[0] );
		}
		
		return $thumb;		
	 }	 	 	 
	 
	 /**
	  * Sanitize cee codes.
	  *
	  * Remove break line, tab, extra whitespace.
	  *
	  * @since 1.0.0
	 * @access private	  
	  *
	  * @parm string $buffer
	  * @return striung
	  */
	 private function sanitize_codes( $buffer ) {
		 $output = str_replace( array( '<style type="text/css">', '</style>' ), '', $buffer );
		 $output = preg_replace( '/(\/\*)(.*)(\*\/)/', '', $output );
		 $output = preg_replace( '/[\s]+/', ' ', $output );
		 $output = trim( $output );
		 return $output;
	 }
	 
	/**
	* Convert a hexa decimal color code to its RGB equivalent
	*
	* @since 1.0.0
	 * @access private	
	*
	* @link http://us2.php.net/manual/en/function.hexdec.php#99478	
	*
	* @param string $hexStr (hexadecimal color value)
	* @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
	* @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
	* @return array or string (depending on second parameter. Returns False if invalid hex color value)
	*/                                                                                                 
	private function hex2rgb($hexStr, $returnAsString = false, $seperator = ',') {
		$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
		$rgbArray = array();
		if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
			$colorVal = hexdec($hexStr);
			$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
			$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
			$rgbArray['blue'] = 0xFF & $colorVal;
		} elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
			$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
			$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
			$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
		} else {
			return false; //Invalid hex color code
		}
		return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
	}	 
}

new Aesblo_Custom_Style;