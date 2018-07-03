<?php
/**
 * A script for grabbing media related to a post.
 *
 * This class incorporates code from Stargazer WordPress Theme,
 * Copyright 2013 – 2018 Justin Tadlock. Stargazer is distributed
 * under the terms of the GNU GPL.
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Grabs media related to the post.
 *
 * @since  1.0.1
 */
class Media_Grabber {

	/**
	 * The HTML version of the media to return.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    string
	 */
	public $media = '';

	/**
	 * The original media taken from the post content.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    string
	 */
	public $original_media = '';

	/**
	 * The post format. audio | video | gallery.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    string
	 */
	public $type = '';

	/**
	 * The type of media to be extracted.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    array
	 */
	public $media_type = [];

	/**
	 * Whether to split the media from the post content.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    bool
	 */
	public $split;

	/**
	 * The playlist shortcode in post content.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    string
	 */
	public $playlist = '';

	/**
	 * Post ID.
	 *
	 * @since  1.0.1
	 * @access public
	 * @var    int
	 */
	public $post_id;

	/**
	 * Constructor method. Sets up Media Manager.
	 *
	 * @since  1.0.1
	 *
	 * @param string $type  audio | video | gallery.
	 * @param bool   $split Whether to split the media from the post content.
	 */
	public function __construct( $type, $split ) {

		// Set the object properties.
		if ( 'audio' === $type ) {
			$this->media_type = [ 'audio' ];
		} elseif ( 'video' === $type ) {
			$this->media_type = [ 'video', 'object', 'embed', 'iframe' ];
		}
		$this->type    = $type;
		$this->split   = $split;
		$this->post_id = get_the_ID();

		// Find the media related to the post.
		$this->set_media();
	}

	/**
	 * Destructor method. Removes filters we needed to add.
	 *
	 * @since  1.0.1
	 */
	public function __destruct() {

		remove_filter( 'the_content', [ $this, 'split_media' ], 5 );
		remove_filter( 'the_content', [ $this, 'split_media' ], 11 );
	}

	/**
	 * Basic method for returning the media found.
	 *
	 * @since  1.6.0
	 * @access public
	 * @return string
	 */
	public function get_media() {

		$this->media = apply_filters( 'aamla_media_grabber_media', $this->media, $this );
		$this->type  = $this->playlist ? 'playlist' : $this->type;
		$media       = '';
		if ( $this->media ) {
			$media = sprintf( '<div%1$s>%2$s</div>',
				aamla_get_attr( 'entry-' . $this->type ),
				$this->media
			);
		}

		return [ $media, $this->type ];
	}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.1
	 */
	public function set_media() {

		if ( 'gallery' === $this->type ) {
			$this->media = get_post_gallery();
		} else {
			// Finds matches for shortcodes in the content.
			preg_match_all( '/' . get_shortcode_regex() . '/s', get_the_content(), $matches, PREG_SET_ORDER );

			if ( ! empty( $matches ) ) {
				foreach ( $matches as $shortcode ) {
					if ( 'playlist' === $shortcode[2] ) {
						$this->playlist = array_shift( $shortcode );
						$this->media    = do_shortcode( $this->playlist );
						break;
					}
					if ( in_array( $shortcode[2], $this->media_type, true ) ) {
						$this->original_media = array_shift( $shortcode );
						break;
					}
				}
			}
		}

		if ( ! $this->media && $this->media_type ) {
			global $wp_embed;

			// Use WP's embed functionality to handle the [embed] shortcode and autoembeds.
			$content = $wp_embed->run_shortcode( get_the_content() );
			$content = $wp_embed->autoembed( $content );

			// Filter shortcodes in the content through their hooks.
			$content = do_shortcode( $content );

			// Get media from the content.
			$media       = get_media_embedded_in_content( $content, $this->media_type );
			$this->media = $media ? $media[0] : '';
		}

		if ( $this->split && $this->media ) {
			if ( $this->playlist || $this->original_media ) {
				add_filter( 'the_content', [ $this, 'split_media' ], 5 ); // BEFORE run_shortcode.
			} else {
				add_filter( 'the_content', [ $this, 'split_media' ], 11 ); // AFTER do_shortcode().
			}
		}
	}

	/**
	 * Remove first audio/video from the post content.
	 *
	 * Since we are moving first audio / video to the top of the page (if post format is audio
	 * or video ). Therefore, let's remove first audio / video html from post content.
	 *
	 * @since 1.0.1
	 *
	 * @param array $content Content of the current post.
	 * @return string
	 */
	public function split_media( $content ) {

		if ( get_the_ID() !== $this->post_id ) {
			return;
		}

		if ( $this->playlist ) {
			$content = str_replace( $this->playlist, '', $content );
		} elseif ( $this->original_media ) {
			$content = str_replace( $this->original_media, '', $content );
		} else {
			$content = str_replace( $this->media, '', $content );
		}

		return $content;
	}
}
