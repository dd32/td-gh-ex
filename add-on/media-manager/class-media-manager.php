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
			array_push( $callbacks, [ [ $this, 'media_markup' ], $format, false, true ] );
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
	 * @param bool   $wrapper     Whether media to be wrapped in 'entry-featured-media'.
	 * @return void
	 */
	public function media_markup( $media_type, $split_media, $wrapper = false ) {

		$media_obj = new Media_Grabber( $media_type, $split_media );
		$media_arr = $media_obj->get_media();
		$media     = $media_arr[0];
		if ( ( $wrapper || ! is_single() ) && $media ) {

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

			$media_post = sprintf( '<div class="entry-featured-media-extra">%s%s</div>', $toggle, $title );
			$media      = sprintf( '<div%1$s>%2$s%3$s</div>',
				aamla_get_attr( 'entry-featured-media' ),
				$media_post,
				$media
			);
		}

		if ( $media ) {
			echo $media; // WPCS xss ok. Contains HTML, other values escaped.
		}
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
			false,
			'all'
		);
	}
}

Media_Manager::init();
