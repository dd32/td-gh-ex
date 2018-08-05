<?php
/**
 * Manage display of media content in video, audio & gallery post formats
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Display of media content in video, audio & gallery post formats
 *
 * @since  1.0.1
 */
class Media_Manager {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Constructor method.
	 *
	 * @since  1.0.1
	 */
	public function __construct() {
		require_once get_template_directory() . '/add-on/media-manager/class-media-grabber.php';
	}

	/**
	 * Returns the instance of this class.
	 *
	 * @since  1.0.1
	 *
	 * @return object Instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.1
	 */
	public static function init() {
		add_filter( 'aamla_markup_entry_header', [ self::get_instance(), 'entry_header_media' ] );
		add_filter( 'aamla_markup_entry_featured_content', [ self::get_instance(), 'entry_featured_media' ] );
		add_filter( 'aamla_markup_dp_featured_content', [ self::get_instance(), 'dp_featured_media' ] );
		add_action( 'wp_enqueue_scripts', [ self::get_instance(), 'enqueue_front' ] );
	}

	/**
	 * Display HTML markup for the found media in current post.
	 *
	 * @since  1.0.1
	 *
	 * @param arrray $callbacks Array of callback functions (may be with args).
	 * @return string
	 */
	public function entry_header_media( $callbacks ) {
		if ( ! is_single() ) {
			return $callbacks;
		}
		$format = get_post_format();
		if ( 'video' === $format ) {
			/*
			 * Remove thumbnail display callback. We will display featured video in-place-of
			 * thumbnail in 'video' post format.
			 */
			foreach ( $callbacks as $key => $callback ) {
				if ( is_array( $callback ) && 'entry-thumbnail' === $callback[2] ) {
					unset( $callbacks[ $key ] );
					break;
				}
			}
		}
		if ( in_array( $format, [ 'audio', 'video' ], true ) ) {
			array_push( $callbacks, [ [ $this, 'media_markup' ], $format, true ] );
		}

		return $callbacks;
	}

	/**
	 * Display HTML markup for the found media in current post.
	 *
	 * @since  1.0.1
	 *
	 * @param arrray $callbacks Array of callback functions (may be with args).
	 * @return string
	 */
	public function entry_featured_media( $callbacks ) {
		$format = get_post_format();
		if ( in_array( $format, [ 'audio', 'video', 'gallery' ], true ) ) {
			// Add 'media_markup()' to array of callbacks with its args.
			array_push( $callbacks, [ [ $this, 'media_markup' ], $format, false ] );
		}
		return $callbacks;
	}

	/**
	 * Display HTML markup for the found media in current Display post.
	 *
	 * @since  1.0.1
	 *
	 * @param arrray $callbacks Array of callback functions (may be with args).
	 * @return string
	 */
	public function dp_featured_media( $callbacks ) {
		$format = get_post_format();
		if ( in_array( $format, [ 'audio', 'video', 'gallery' ], true ) ) {
			// Add 'media_markup()' to array of callbacks with its args.
			array_push( $callbacks, [ [ $this, 'media_markup' ], $format, true, false ] );
		}
		return $callbacks;
	}

	/**
	 * Get the HTML markup for the found media in current post.
	 *
	 * @since  1.0.1
	 *
	 * @param string $media_type  audio | video | gallery.
	 * @param bool   $split_media Whether to split the media from the post content.
	 * @param bool   $is_main_query  Whether the post is from main query.
	 * @return void
	 */
	public function media_markup( $media_type, $split_media, $is_main_query = true ) {

		$media_obj = new Media_Grabber( $media_type, $split_media, $is_main_query );
		$media_arr = $media_obj->get_media();
		$media     = $media_arr[0];
		if ( ! $media ) {
			return;
		}

		if ( $is_main_query && is_single() ) {
			printf( '<div%1$s>%2$s</div>', aamla_get_attr( 'entry-' . $media_arr[1] ), $media ); // WPCS xss ok. Contains HTML, other values escaped.
			return;
		}

		$toggle = sprintf(
			'<button class="close-media">%1$s<span class="screen-reader-text"> %2$s </span></button>',
			aamla_get_icon( array( 'icon' => 'close' ) ),
			esc_html__( 'Close Media Window', 'aamla' )
		);

		$title = the_title(
			sprintf(
				'<div class="media-post-title">%s<a href="%s">',
				$this->get_media_text( $media_arr[1] ) . esc_html__( ' from: ', 'aamla' ),
				esc_url( get_permalink() )
			),
			'</a></div>',
			false
		);

		if ( 'video' === $media_arr[1] ) {
			$media = $this->deferred_media_markup( $media );
			printf(
				'<div class="entry-featured-media mm-video"><div class="mm-video-wrapper"><div class="entry-video media-wrapper">%s%s</div>%s</div></div>', $media, $toggle, $title
			); // WPCS xss ok. Contains HTML, other values escaped.
		} else {
			if ( 'audio' === $media_arr[1] ) {
				$media = sprintf( '<div class="mm-audio-wrapper">%s</div>', $media );
			} elseif ( 'iaudio' === $media_arr[1] ) {
				$media = $this->deferred_media_markup( $media );
			}

			$media = sprintf(
				'<div%1$s>%2$s</div>',
				aamla_get_attr( 'entry-' . $media_arr[1], [ 'class' => 'media-wrapper' ] ),
				$media
			);

			$media_post = sprintf(
				'<div class="entry-featured-media-extra">%s%s</div>',
				$toggle,
				$title
			);

			printf(
				'<div%1$s>%2$s%3$s</div>',
				aamla_get_attr( 'entry-featured-media' ),
				$media_post,
				$media
			); // WPCS xss ok. Contains HTML, other values escaped.
		}
	}

	/**
	 * Get video markup to fecilitate defer its loading until page load.
	 *
	 * @since  1.0.2
	 *
	 * @param str $media Video markup.
	 * @return string
	 */
	public function deferred_media_markup( $media ) {
		if ( $media ) {
			$dom = new \DOMDocument();
			$dom->loadHTML( $media );
			$frames = $dom->getElementsByTagName( 'iframe' );
			foreach ( $frames as $frame ) {
				$url = $frame->getAttribute( 'src' );
				if ( $url ) {
					$frame->removeAttribute( 'src' );
					// Escape url and preserve special charaters (if any).
					$frame->setAttribute( 'data-src', wp_specialchars_decode( esc_url( $url ) ) );
					$frame->setAttribute( 'src', '' );
				}
			}
			$media = $dom->saveHTML();
		}

		return $media;
	}

	/**
	 * Get translated media string.
	 *
	 * @since  1.0.1
	 *
	 * @param str $media_type audio | video | gallery | playlist.
	 * @return string
	 */
	public function get_media_text( $media_type ) {
		$text_arr = [
			'audio'    => esc_html__( 'Audio', 'aamla' ),
			'iaudio'   => esc_html__( 'Audio', 'aamla' ),
			'playlist' => esc_html__( 'Playlist', 'aamla' ),
			'video'    => esc_html__( 'Video', 'aamla' ),
			'gallery'  => esc_html__( 'Gallery', 'aamla' ),
		];

		$media_text = '';
		if ( $media_type && isset( $text_arr[ $media_type ] ) ) {
			$media_text = $text_arr[ $media_type ];
		}

		return $media_text;
	}

	/**
	 * Enqueue scripts and styles to front end.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_front() {
		wp_enqueue_style(
			'aamla_media_manager_style',
			get_template_directory_uri() . '/add-on/media-manager/assets/media-manager.css',
			array(),
			AAMLA_THEME_VERSION,
			'all'
		);

		wp_enqueue_script(
			'aamla_media_manager_js',
			get_template_directory_uri() . '/add-on/media-manager/assets/media-manager.js',
			[],
			AAMLA_THEME_VERSION,
			true
		);
	}
}

Media_Manager::init();
