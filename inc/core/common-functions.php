<?php
/**
 * Functions for Astra Theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Foreground Color
 */
if ( ! function_exists( 'ast_get_foreground_color' ) ) {

	/**
	 * Foreground Color
	 *
	 * @param  string $hex Color code in HEX format.
	 * @return string      Return foreground color depend on input HEX color.
	 */
	function ast_get_foreground_color( $hex ) {

		if ( 'transparent' == $hex || 'false' == $hex || '#' == $hex || empty( $hex ) ) {
			return 'transparent';

		} else {

			// Get clean hex code.
			$hex = str_replace( '#', '', $hex );

			if ( 3 == strlen( $hex ) ) {
				$hex = str_repeat( substr( $hex,0,1 ), 2 ) . str_repeat( substr( $hex,1,1 ), 2 ) . str_repeat( substr( $hex,2,1 ), 2 );
			}

			// Get r, g & b codes from hex code.
			$r   = hexdec( substr( $hex,0,2 ) );
			$g   = hexdec( substr( $hex,2,2 ) );
			$b   = hexdec( substr( $hex,4,2 ) );
			$hex = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;

			return 128 <= $hex ? '#000000' : '#ffffff';
		}
	}
}

/**
 * Contrasting Color
 */
if ( ! function_exists( 'ast_contrasting_color' ) ) {

	/**
	 * Contrasting Color
	 *
	 * @since 1.0
	 * @param  string $hexcolor Color code in HEX format.
	 * @param  string $dark     Darker color in HEX format.
	 * @param  string $light    Light color in HEX format.
	 * @return string           Contrasting Color.
	 */
	function ast_contrasting_color( $hexcolor, $dark = '#000000', $light = '#FFFFFF' ) {
		return ( hexdec( $hexcolor ) > 0xffffff / 2 ) ? $dark : $light;
	}
}

/**
 * Color conversion from HEX to RGB or RGBA.
 */
if ( ! function_exists( 'ast_hex2rgba' ) ) {

	/**
	 * Color conversion from HEX to RGB or RGBA.
	 *
	 * @since 1.0
	 * @param  string $hex   Color code in HEX format.
	 * @param  string $alpha Color code alpha value for RGBA conversion.
	 * @return string        Return RGB or RGBA color code.
	 */
	function ast_hex2rgba( $hex, $alpha = '' ) {
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = $r . ',' . $g . ',' . $b;

		if ( '' === $alpha ) {
			return 'rgb(' . $rgb . ')';
		} else {
			$alpha = floatval( $alpha );

			return 'rgba(' . $rgb . ',' . $alpha . ')';
		}
	}
}

/**
 * Retrieve theme or meta options subkey value.
 */
if ( ! function_exists( 'ast_get_option_subkey' ) ) {

	/**
	 * Retrieve theme or meta options subkey value.
	 *
	 * @since 1.0
	 * @param  string $result_key Return sub key.
	 * @param  string $subkeys   Subkey value.
	 * @param  string $default   Return default value if not found.
	 * @return mixed             Depending on the output type of the field used.
	 */
	function ast_get_option_subkey( $result_key, $subkeys = '', $default = '' ) {

		if ( isset( $result_key ) && '' != $result_key ) {
			$count = count( $subkeys );
			if ( 1 == $count ) {
				$value = ( isset( $result_key[ $subkeys[1] ] ) && '' !== $result_key[ $subkeys[1] ] ) ? $result_key[ $subkeys[1] ] : $default;
			} elseif ( 2 == $count ) {
				if ( isset( $result_key[ $subkeys[1] ] ) ) {
					$value = ( isset( $result_key[ $subkeys[1] ][ $subkeys[2] ] ) && '' !== $result_key[ $subkeys[1] ][ $subkeys[2] ] ) ? $result_key[ $subkeys[1] ][ $subkeys[2] ] : $default;
				}
			} elseif ( 3 == $count ) {
				if ( isset( $result_key[ $subkeys[1] ] ) ) {
					if ( isset( $result_key[ $subkeys[1] ][ $subkeys[2] ] ) ) {
						$value = ( isset( $result_key[ $subkeys[1] ][ $subkeys[2] ][ $subkeys[3] ] ) && '' !== $result_key[ $subkeys[1] ][ $subkeys[2] ][ $subkeys[3] ] ) ? $result_key[ $subkeys[1] ][ $subkeys[2] ][ $subkeys[3] ] : $default;
					}
				}
			}
		} else {
			$value = ( isset( $result_key ) && '' !== $result_key ) ? $result_key : $default;
		}

		return $value;
	}
}

/**
 * Generate CSS
 */
if ( ! function_exists( 'ast_css' ) ) {

	/**
	 * Generate CSS
	 *
	 * @param  mixed  $value         CSS value.
	 * @param  string $css_property CSS property.
	 * @param  string $selector     CSS selector.
	 * @param  string $unit         CSS property unit.
	 * @return void               Echo generated CSS.
	 */
	function ast_css( $value = '', $css_property = '', $selector = '', $unit = '' ) {

		if ( $selector ) {
			if ( $css_property && $value ) {

				if ( '' != $unit ) {
					$value .= $unit;
				}

				$css  = $selector;
				$css .= '{';
				$css .= '	' . $css_property . ': ' . $value . ';';
				$css .= '}';

				echo $css;
			}
		}
	}
}

/**
 * Set background color / image etc
 */
if ( ! function_exists( 'ast_css_background' ) ) {

	/**
	 * Set background color / image etc
	 *
	 * @param  string $selector     CSS selector.
	 * @param  string $bg_color     Background color in HEX.
	 * @param  string $bg_img       Background image URL.
	 * @param  string $bg_pos       Background image position.
	 * @param  string $bg_rep       Background image repeat.
	 * @param  int    $bg_size      Background image size.
	 * @param  string $bg_atch      Background image attachment.
	 * @return void               	Echo the generated CSS.
	 */
	function ast_css_background( $selector = '', $bg_color = '', $bg_img = '', $bg_pos = '', $bg_rep = '', $bg_size = '', $bg_atch = '' ) {

		/**
		 * Selector
		 */
		if ( $selector ) {

			$css = '';

			// Has bg color?
			if ( $bg_color ) {

				// set [parent] HEX color.
				$css .= $selector;
				$css .= '{';
				$css .= '	background-color: ' . $bg_color . ';';
				$css .= '}';
			}

			// Has bg image?
			if ( $bg_img ) {
				$css .= $selector;
				$css .= '{';

				$css .= '	background-image: url(' . $bg_img . ');';

				// background repeat.
				if ( $bg_rep ) {
					$css .= '	background-repeat:' . $bg_rep . ';';
				}

				// background size.
				if ( $bg_size ) {
					$css .= '	background-size:' . $bg_size . ';';
				}

				// background attachment.
				if ( $bg_atch ) {
					$css .= '	background-attachment:' . $bg_atch . ';';
				}

				$css .= '}';
			}

			echo $css;
		}// End if().
	}
}// End if().

/**
 * CSS Font Font
 */
if ( ! function_exists( 'ast_css_font' ) ) {

	/**
	 * CSS Font Font
	 *
	 * @since 1.0
	 * @param  string $selector    CSS selector.
	 * @param  number $font_size   Font size.
	 * @param  string $font_weight Font weight.
	 * @param  string $font_family Font family.
	 * @return void              Echo the generated CSS.
	 */
	function ast_css_font( $selector = '', $font_size = '', $font_weight = '', $font_family = '' ) {

		$output         = '';
		$theme_options  = Ast_Theme_Options::get_options();
		$body_font_size = ( $theme_options['font-size-body'] ) ? $theme_options['font-size-body'] : '';

		if ( $selector ) {

			/**
			 * Selector
			 */
			$output .= $selector;
			$output .= ' { ';

			/**
			 * Font Size
			 */
			if ( $font_size ) {

				// font size in 'px'.
				// font size in 'rem'.
				$output .= 'font-size: ' . esc_attr( round( $font_size ) ) . 'px;';

				if ( $body_font_size ) {
					$output .= 'font-size: ' . ( esc_attr( $font_size ) / esc_attr( $body_font_size ) ) . 'rem;';
				}
			}

			/**
			 * Font Weight
			 */
			if ( $font_weight && 'inherit' != $font_weight ) {
				$output .= 'font-weight: ' . esc_attr( $font_weight ) . ';';
			}

			/**
			 * Font Family
			 */
			if ( $font_family && 'inherit' != $font_family ) {
				$output .= 'font-family: ' . esc_attr( $font_family ) . ';';
			}

			$output .= ' } ';
		}// End if().

		echo $output;
	}
}// End if().

/**
 * Get CSS value
 */
if ( ! function_exists( 'ast_get_css_value' ) ) {

	/**
	 * Get CSS value
	 *
	 * Syntax:
	 *
	 * 	ast_get_css_value( VALUE, UNIT );
	 *
	 * E.g.
	 *
	 * 	ast_get_css_value( VALUE, 'url' );
	 *  ast_get_css_value( VALUE, 'px' );
	 *  ast_get_css_value( VALUE, 'em' );
	 *
	 * @param  string $value        CSS value.
	 * @param  string $unit         CSS unit.
	 * @param  string $default_font CSS default font.
	 * @return mixed               CSS value depends on $unit
	 */
	function ast_get_css_value( $value = '', $unit = 'px', $default_font = '' ) {

		if ( '' == $value ) {
			return $value;
		}

		$css_val = '';

		switch ( $unit ) {

			case 'dimension' :

				if ( is_numeric( $value ) ) {
					$css_val = esc_attr( $value ) . 'px';
				} else {
					$css_val = esc_attr( $value );
				}

				break;

			case 'font' :

				if ( 'inherit' != $value ) {
					$css_val = esc_attr( $value );
				} elseif ( '' != $default_font ) {
					$css_val = esc_attr( $default_font );
				}

				break;

			case 'px':
			case '%' :
						$css_val = esc_attr( $value ) . $unit;
				break;

			case 'url' :
						$css_val = $unit . '(' . esc_attr( $value ) . ')';
				break;

			case 'rem':

				if ( is_numeric( $value ) || strpos( $value, 'px' ) ) {
					$value = intval( $value );
					$theme_options  = Ast_Theme_Options::get_options();
					$body_font_size = ( $theme_options['font-size-body'] ) ? $theme_options['font-size-body'] : '';
					if ( $body_font_size ) {
						$css_val = esc_attr( $value ) . 'px;font-size:' . ( esc_attr( $value ) / esc_attr( $body_font_size ) ) . $unit;
					}
				} else {
					$css_val = esc_attr( $value );
				}

				break;

			default:
				if ( '' != $value ) {
					$css_val = esc_attr( $value ) . $unit;
				}
		}// End switch().

		return $css_val;
	}
}// End if().

/**
 * Parse CSS
 */
if ( ! function_exists( 'ast_parse_css' ) ) {

	/**
	 * Parse CSS
	 *
	 * @param  array  $css_output Array of CSS.
	 * @param  string $min_media  Min Media breakpoint.
	 * @param  string $max_media  Max Media breakpoint.
	 * @return string             Generated CSS.
	 */
	function ast_parse_css( $css_output = array(), $min_media = '', $max_media = '' ) {

		$parse_css = '';
		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( ! count( $properties ) ) { continue; }

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) { continue; }

					$properties_added++;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' != $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = '(min-width:' . $min_media . 'px)';
				}
				if ( '' !== $max_media ) {
					$max_media_css = '(max-width:' . $max_media . 'px)';
				}
				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;
			}
		}// End if().

		return $parse_css;
	}
}// End if().

/**
 * Return Theme options.
 */
if ( ! function_exists( 'ast_get_option' ) ) {

	/**
	 * Return Theme options.
	 *
	 * @param  string $option  Option key.
	 * @param  string $subkeys Option subkey.
	 * @param  string $default Option default value.
	 * @return string          Return option value.
	 */
	function ast_get_option( $option, $subkeys = '', $default = '' ) {

		$theme_options = Ast_Theme_Options::get_options();

		if ( ! empty( $subkeys ) && is_array( $subkeys ) && isset( $theme_options[ $option ] ) ) {
			$value = ast_get_option_subkey( $theme_options[ $option ], $subkeys, $default );
		} else {
			$value = ( isset( $theme_options[ $option ] ) && '' !== $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;
		}

		return $value;
	}
}

/**
 * Return Theme options from postmeta.
 */
if ( ! function_exists( 'ast_get_option_meta' ) ) {

	/**
	 * Return Theme options from postmeta.
	 *
	 * @param  string  $option_id Option ID.
	 * @param  string  $subkeys   Option subkey value.
	 * @param  string  $default   Option default value.
	 * @param  boolean $only_meta Get only meta value.
	 * @param  string  $extension Is value from extension.
	 * @param  string  $post_id   Get value from specific post by post ID.
	 * @return string             Return option value.
	 */
	function ast_get_option_meta( $option_id, $subkeys = '', $default = '', $only_meta = false, $extension = '', $post_id = '' ) {

		$post_id = ( '' != $post_id ) ? $post_id : ast_get_post_id();

		$value = ast_get_option( $option_id, $subkeys, $default );

		// Get value from option 'post-meta'.
		if ( is_singular() || ( is_home() && ! is_front_page() ) ) {

			$value = get_post_meta( $post_id, $option_id, true );

			if ( empty( $value ) || 'default' == $value ) {

				if ( true == $only_meta ) {
					return false;
				}

				$value = ast_get_option( $option_id, $subkeys, $default );
			}
		}

		return $value;
	}
}// End if().

/**
 * Output markup required for the language switcher for WPML.
 */
if ( ! function_exists( 'ast_language_switcher' ) ) {

	/**
	 * Output markup required for the language switcher for WPML.
	 *
	 * @since 1.0
	 * @return HTML
	 */
	function ast_language_switcher() {

		if ( ! function_exists( 'icl_get_languages' ) ) {
			return;
		}

		$languages = icl_get_languages( 'skip_missing=0&orderby=code' );

		echo '<div class="langs-list">';
		echo '<span>';
		echo '<i class="icon-global28"></i>';
		echo esc_attr__( 'Select Language', 'astra-theme' );
		echo '<i class="icon-chevron-small-down arrow"></i>';
		echo '</span>';
		echo '<ul>';

		foreach ( $languages as $l ) {
			echo '<li>';
			echo '<a href="' . esc_url( $l['url'] ) . '">';
			echo '<img src="' . esc_url( $l['country_flag_url'] ) . '" height="8" alt="' . esc_attr( $l['language_code'] ) . '" width="14" /> ';
			echo esc_html( $l['translated_name'] );
			echo '</a>';
			echo '</li>';
		}

		echo '</ul>';
		echo '</div>';
	}
}// End if().

/**
 * Helper function to get the current post id.
 */
if ( ! function_exists( 'ast_get_post_id' ) ) {

	/**
	 * Get post ID.
	 *
	 * @param  string $post_id_override Get override post ID.
	 * @return number                   Post ID.
	 */
	function ast_get_post_id( $post_id_override = '' ) {

		if ( null == Ast_Theme_Options::$post_id ) {
			global $post;

			$post_id = 0;

			if ( is_home() ) {
				$post_id = get_option( 'page_for_posts' );
			} elseif ( is_archive() ) {
				global $wp_query;
				$post_id = $wp_query->get_queried_object_id();
			} elseif ( isset( $post->ID ) && ! is_search() && ! is_category() ) {
				$post_id = $post->ID;
			}

			Ast_Theme_Options::$post_id = $post_id;
		}

		return apply_filters( 'ast_get_post_id', Ast_Theme_Options::$post_id, $post_id_override );
	}
}


/**
 * Display classes for primary div
 */
if ( ! function_exists( 'ast_primary_class' ) ) {

	/**
	 * Display classes for primary div
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return void        Echo classes.
	 */
	function ast_primary_class( $class = '' ) {

		// Separates classes with a single space, collates classes for body element.
		if ( function_exists( 'ast_get_primary_class' ) ) {
			echo 'class="' . join( ' ', ast_get_primary_class( $class ) ) . '"';
		}
	}
}

/**
 * Retrieve the classes for the primary element as an array.
 */
if ( ! function_exists( 'ast_get_primary_class' ) ) {

	/**
	 * Retrieve the classes for the primary element as an array.
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array        Return array of classes.
	 */
	function ast_get_primary_class( $class = '' ) {

		// array of class names.
		$classes = array();

		// default class for content area.
		$classes[] = 'content-area';

		// primary base class.
		$classes[] = 'primary';

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = array_map( 'esc_attr', $classes );

		// Filter primary div class names.
		$classes = apply_filters( 'ast_primary_class', $classes, $class );

		return array_unique( $classes );
	}
}// End if().

/**
 * Display classes for secondary div
 */
if ( ! function_exists( 'ast_secondary_class' ) ) {

	/**
	 * Retrieve the classes for the secondary element as an array.
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return void        echo classes.
	 */
	function ast_secondary_class( $class = '' ) {

		// Separates classes with a single space, collates classes for body element.
		if ( function_exists( 'get_ast_secondary_class' ) ) {
			echo 'class="' . join( ' ', get_ast_secondary_class( $class ) ) . '"';
		}
	}
}

/**
 * Retrieve the classes for the secondary element as an array.
 */
if ( ! function_exists( 'get_ast_secondary_class' ) ) {

	/**
	 * Retrieve the classes for the secondary element as an array.
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array        Return array of classes.
	 */
	function get_ast_secondary_class( $class = '' ) {

		// array of class names.
		$classes = array();

		// default class from widget area.
		$classes[] = 'widget-area';

		// secondary base class.
		$classes[] = 'secondary';

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = array_map( 'esc_attr', $classes );

		// Filter secondary div class names.
		$classes = apply_filters( 'ast_secondary_class', $classes, $class );

		return array_unique( $classes );
	}
}// End if().

/**
 * Get post format
 */
if ( ! function_exists( 'ast_get_post_format' ) ) {

	/**
	 * Get post format
	 *
	 * @param  string $post_format_override Override post formate.
	 * @return string                       Return post format.
	 */
	function ast_get_post_format( $post_format_override = '' ) {

		if ( ( is_home() ) || is_archive() ) {
			$post_format = 'blog';
		} else {
			$post_format = get_post_format();
		}

		return apply_filters( 'ast_get_post_format', $post_format, $post_format_override );
	}
}

/**
 * Wrapper function fot the_title()
 */
if ( ! function_exists( 'ast_the_title' ) ) {

	/**
	 * Wrapper function fot the_title()
	 *
	 * Displays title only if the page title bar is disabled.
	 *
	 * @param string $before Optional. Content to prepend to the title.
	 * @param string $after  Optional. Content to append to the title.
	 * @param bool   $echo   Optional, default to true.Whether to display or return.
	 * @return string|void String if $echo parameter is false.
	 */
	function ast_the_title( $before = '', $after = '', $echo = true ) {

		if ( apply_filters( 'ast_the_title_enabled', true ) ) {

			$title  = ast_get_the_title();
			$before = apply_filters( 'ast_the_title_before', '' ) . $before;
			$after  = $after . apply_filters( 'ast_the_title_after', '' );

			// This will work same as `the_title` function but with Custom Title if exits.
			if ( $echo ) {
				echo $before . $title . $after;
			} else {
				return $before . $title . $after;
			}
		}
	}
}

/**
 * Wrapper function fot get_the_title()
 */
if ( ! function_exists( 'ast_get_the_title' ) ) {

	/**
	 * Wrapper function fot get_the_title()
	 *
	 * Return title for Title Bar and Normal Title.
	 *
	 * @param bool $echo   Optional, default to false. Whether to display or return.
	 * @return string|void String if $echo parameter is false.
	 */
	function ast_get_the_title( $echo = false ) {

		$id    = ast_get_post_id();
		$title = '';

		// for 404 page - title always display.
		if ( is_404() ) {

			$title = apply_filters( 'ast_the_404_page_title', esc_html( 'This page doesn\'t seem to exist.', 'astra-theme' ) );

			// for search page - title always display.
		} elseif ( is_search() ) {

			/* translators: 1: search string */
			$title = apply_filters( 'ast_the_search_page_title', sprintf( __( 'Search Results for: %s', 'astra-theme' ), '<span>' . get_search_query() . '</span>' ) );

		} elseif ( class_exists( 'WooCommerce' ) && is_shop() ) {

			$title = woocommerce_page_title();

		} elseif ( is_archive() ) {

			$title = get_the_archive_title();

		} else {

			$title = get_the_title( $id );
		}

		// This will work same as `get_the_title` function but with Custom Title if exits.
		if ( $echo ) {
			echo $title;
		} else {
			return $title;
		}
	}
}// End if().

/**
 * Wrapper function fot the_archive_title()
 */
if ( ! function_exists( 'ast_the_archive_title' ) ) {

	/**
	 * Wrapper function fot the_archive_title()
	 *
	 * Displays archive title only if the page title bar is disabled.
	 *
	 * @see get_the_archive_title()
	 *
	 * @param string $before Optional. Content to prepend to the title. Default empty.
	 * @param string $after  Optional. Content to append to the title. Default empty.
	 */
	function ast_the_archive_title( $before = '', $after = '' ) {
		the_archive_title( $before, $after );
	}
}

/**
 * Archive Page Title
 */
if ( ! function_exists( 'ast_archive_page_info' ) ) {

	/**
	 * Wrapper function fot the_title()
	 *
	 * Displays title only if the page title bar is disabled.
	 */
	function ast_archive_page_info() {

		if ( apply_filters( 'ast_the_title_enabled', true ) ) {

			// Author.
			if ( is_author() ) { ?>

				<section class="ast-author-box ast-archive-description">
					<div class="ast-author-bio">
						 <h1 class='page-title ast-archive-title'><?php echo get_the_author(); ?></h1>
						 <p><?php echo get_the_author_meta( 'description' ); ?></p>
					</div>
					<div class="ast-author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'email' ) , 120 ); ?>
					</div>
				</section>

			<?php

			// Category.
			} elseif ( is_category() ) { ?>

				<section class="ast-archive-description">
					<h1 class="page-title ast-archive-title"><?php echo single_cat_title(); ?></h1>
					<?php the_archive_description(); ?>
				</section>

			<?php

			// Tag.
			} elseif ( is_tag() ) { ?>

				<section class="ast-archive-description">
					<h1 class="page-title ast-archive-title"><?php echo single_tag_title(); ?></h1>
					<?php the_archive_description(); ?>
				</section>

			<?php

			// Search.
			} elseif ( is_search() ) { ?>

				<section class="ast-archive-description">
					<?php
						/* translators: 1: search string */
						$title = apply_filters( 'ast_the_search_page_title', sprintf( __( 'Search Results for: %s', 'astra-theme' ), '<span>' . get_search_query() . '</span>' ) );
					?>
					<h1 class="page-title ast-archive-title"> <?php echo $title; ?> </h1>
				</section>

			<?php

			// Other.
			} else { ?>

				<section class="ast-archive-description">
					<?php the_archive_title( '<h1 class="page-title ast-archive-title">', '</h1>' ); ?>
					<?php the_archive_description(); ?>
				</section>

		<?php }// End if().
		}// End if().
	}
}// End if().


/**
 * Adjust the HEX color brightness
 */
if ( ! function_exists( 'ast_adjust_brightness' ) ) {

	/**
	 * Adjust Brightness
	 *
	 * @param  string $hex   Color code in HEX.
	 * @param  number $steps brightness value.
	 * @param  string $type  brightness is reverse or default.
	 * @return string        Color code in HEX.
	 */
	function ast_adjust_brightness( $hex, $steps, $type ) {

		// Get rgb vars.
		$hex = str_replace( '#','',$hex );

		$shortcode_atts = array(
				'r' => hexdec( substr( $hex,0,2 ) ),
				'g' => hexdec( substr( $hex,2,2 ) ),
				'b' => hexdec( substr( $hex,4,2 ) ),
		);

		// Should we darken the color?
		if ( 'reverse' == $type && $shortcode_atts['r'] + $shortcode_atts['g'] + $shortcode_atts['b'] > 382 ) {
			$steps = -$steps;
		} elseif ( 'darken' == $type ) {
			$steps = -$steps;
		}

		// Build the new color.
		$steps = max( -255, min( 255, $steps ) );

		$shortcode_atts['r']  = max( 0,min( 255,$shortcode_atts['r'] + $steps ) );
		$shortcode_atts['g'] = max( 0,min( 255,$shortcode_atts['g'] + $steps ) );
		$shortcode_atts['b'] = max( 0,min( 255,$shortcode_atts['b'] + $steps ) );

		$r_hex = str_pad( dechex( $shortcode_atts['r'] ), 2, '0', STR_PAD_LEFT );
		$g_hex = str_pad( dechex( $shortcode_atts['g'] ), 2, '0', STR_PAD_LEFT );
		$b_hex = str_pad( dechex( $shortcode_atts['b'] ), 2, '0', STR_PAD_LEFT );

		return '#' . $r_hex . $g_hex . $b_hex;
	}
}// End if().

/**
 * Convert colors from HEX to RGBA
 */
if ( ! function_exists( 'ast_hex_to_rgba' ) ) {

	/**
	 * Convert colors from HEX to RGBA
	 *
	 * @param  string  $color   Color code in HEX.
	 * @param  boolean $opacity Color code opacity.
	 * @return string           Color code in RGB or RGBA.
	 */
	function ast_hex_to_rgba( $color, $opacity = false ) {

		$default = 'rgb(0,0,0)';

		// Return default if no color provided.
		if ( empty( $color ) ) {
	          return $default;
		}

		// Sanitize $color if "#" is provided.
	    if ( '#' == $color[0] ) {
	    	$color = substr( $color, 1 );
	    }

	    // Check if color has 6 or 3 characters and get values.
	    if ( 6 == strlen( $color ) ) {
	    	$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	    } elseif ( 3 == strlen( $color ) ) {
	    	$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	    } else {
	    	return $default;
	    }

	    // Convert HEX to RGB.
	    $rgb = array_map( 'hexdec', $hex );

	    // Check if opacity is set(RGBA or RGB).
	    if ( $opacity ) {
	    	if ( 1 < abs( $opacity ) ) {
	    		$opacity = 1.0;
			}
	    	$output = 'rgba(' . implode( ',',$rgb ) . ',' . $opacity . ')';
	    } else {
	    	$output = 'rgb(' . implode( ',',$rgb ) . ')';
	    }

	    // Return RGB(a) color string.
	    return $output;
	}
}// End if().

/**
 * Convert colors from HEX to RGBA
 */
if ( ! function_exists( 'ast_get_color_rgba' ) ) {

	/**
	 * Convert colors from HEX to RGBA
	 *
	 * @param  string  $color   Color code in HEX.
	 * @param  boolean $alpha 	Color code alpha value.
	 * @return string           Color code in RGB or RGBA.
	 */
	function ast_get_color_rgba( $color, $alpha = '' ) {

		// Alpha value is not exist.
		if ( '' == trim( $alpha ) ) {
			return $color;
		}

		if ( strlen( $color ) == 7 || strlen( $color ) == 4 ) {

			$result = ast_hex2rgba( $color, $alpha );

		} elseif ( 'rgba' == strtolower( substr( $color , 0, 4 ) ) || 'rgb' == strtolower( substr( $color , 0, 3 ) ) ) {

			$color = str_replace( array( 'rgba', 'rgb', '(', ')' ), '', $color );
			$color = explode( ',', $color );

			$r = str_pad( dechex( $color[0] ), 2, '0', STR_PAD_LEFT );
			$g = str_pad( dechex( $color[1] ), 2, '0', STR_PAD_LEFT );
			$b = str_pad( dechex( $color[2] ), 2, '0', STR_PAD_LEFT );

			$hex_color = '#' . $r . $g . $b;

			$result = ast_hex2rgba( $hex_color, $alpha );

		} else {
			$result = $color;
		}
		return $result;
	}
}// End if().
