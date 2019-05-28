<?php
/**
 * Luehrsen // Heinrich - WordPress Theme Functions
 *
 * A useful collection of great functions of daily usage in WordPress theme development.
 *
 * @package agncy
 */

/**
 * The theme functions class
 *
 * TODO: Make this a singleton pattern
 */
class AgncyThemeFunctions {

	/**
	 * The class constructor, that triggers the action and filter dispatcher.
	 */
	function __construct() {
		$this->action_dispatcher();
		$this->filter_dispatcher();
	}

	/**
	 * The action dispatcher, that calls needed WordPress actions for this class.
	 */
	function action_dispatcher() {
		add_action( 'admin_init', array( $this, 'maybe_fix_child_themes_parent' ), 9 );
	}

	/**
	 * The action dispatcher, that calls needed WordPress filter for this class.
	 */
	function filter_dispatcher() {
		add_filter( 'admin_footer_text', array( $this, 'lh_admin_footer' ) ); // change admin footer text.

		add_filter( 'excerpt_more', array( $this, 'excerpt_more' ), 10 );
		add_filter( 'the_content_more_link', array( $this, 'excerpt_more' ), 10 );

		add_filter( 'comment_form_defaults', array( $this, 'comment_form_defaults' ) );
	}

	/**
	 * Echoes custom text in the admin footer, is called by "admin_footer_text" filter
	 *
	 * @author Hendrik Luehrsen
	 * @since 1.0
	 *
	 * @return void
	 */
	function lh_admin_footer() {
		$url        = __( 'http://www.wp-munich.com', 'agncy' );
		$name       = __( 'WP Munich', 'agncy' );
		$made_with  = __( 'Made with &#x2661; by ', 'agncy' );
		$powered_by = __( 'Powered by', 'agncy' );
		echo '<i>' . esc_html( $made_with ) . ' <a href="' . esc_url( $url ) . '" target="_blank">' . esc_attr( $name ) . '</a>. ' . esc_html( $powered_by ) . ' <a href="http://www.wordpress.org" target="_blank">WordPress</a>.</i>';
	}

	/**
	 * The custom "read more" link.
	 *
	 * @access public
	 * @param string $more The default more link.
	 * @return string $more The custom more link.
	 */
	public function excerpt_more( $more ) {
		$readmore = __( 'Read more', 'agncy' );
		$more     = '<a href="' . get_the_permalink() . '" class="read-more-link"><span>' . esc_html( $readmore ) . ' <i class="fa fa-angle-right"></i></span></a>';
		return $more;
	}

	/**
	 * The URL to the posts page.
	 *
	 * @return string url to the posts page
	 */
	function agncy_get_post_page_url() {
		if ( 'page' == get_option( 'show_on_front' ) ) {
			return get_permalink( get_option( 'page_for_posts' ) );
		} else {
			return home_url();
		}
	}

	/**
	 * Filter the default values for comment form fields.
	 *
	 * @param  array $defaults Comment form defaults.
	 *
	 * @return array            The modified defaults
	 */
	public function comment_form_defaults( $defaults ) {

		$defaults = array_merge(
			$defaults,
			array(
				'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title has-tertiary-background-color">',
				'title_reply'        => '<span class="text">' . __( 'Leave a Reply', 'agncy' ) . '</span>',
				// translators: the name of the author of the reply to comment.
				'title_reply_to'     => '<span class="text">' . __( 'Leave a Reply to %s', 'agncy' ) . '</span>',
				'class_submit'       => 'submit has-tertiary-background-color',

			)
		);

		return $defaults;
	}

	/**
	 * Fix child theme support
	 * When the child theme is developed for the non-premium version the slug
	 * of the child theme is not working when the premium version of the theme
	 * is installed. This snipped will register the *-premium version of the
	 * theme and register it as that.
	 *
	 * @author Leo Fajardo (@leorw)
	 * @since 2.2.1
	 * @return void
	 */
	function maybe_fix_child_themes_parent() {
		global $pagenow;

		if ( 'themes.php' !== $pagenow ) {
			return;
		}

		$theme_directories = search_theme_directories();
		$themes            = array();

		foreach ( $theme_directories as $stylesheet => $theme_root ) {
			$theme       = new WP_Theme( $stylesheet, $theme_root['theme_root'] );
			$maybe_error = $theme->errors();

			if ( empty( $maybe_error ) && $theme->parent() ) {
				continue;
			}

			$themes[ $stylesheet ] = $theme;
		}

		foreach ( $themes as $stylesheet => $theme ) {

			if (
				$theme->get_template() === $stylesheet ||
				fs_ends_with( $theme->get_template(), '-premium' ) ||
				! isset( $themes[ $theme->get_template() . '-premium' ] )
				) {
				continue;
			}

			$cache_hash = ( 'theme-' . md5( $theme->get_theme_root() . '/' . $stylesheet ) );
			$cache      = wp_cache_get( $cache_hash, 'themes' );
			unset( $cache['errors'] );
			$cache['template']            = ( $theme->get_template() . '-premium' );
			$cache['headers']['Template'] = $cache['template'];

			wp_cache_set(
				$cache_hash,
				$cache,
				'themes',
				1800
			);
		}
	}

}
$_lh_theme_functions = new AgncyThemeFunctions();
