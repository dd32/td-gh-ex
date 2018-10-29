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
class LhThemeFunctions {

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
		add_action( 'login_enqueue_scripts', array( $this, 'lh_login_logo' ) );
	}

	/**
	 * The action dispatcher, that calls needed WordPress filter for this class.
	 */
	function filter_dispatcher() {
		add_filter( 'admin_footer_text', array( $this, 'lh_admin_footer' ) ); // change admin footer text.
		add_filter( 'login_headerurl', array( $this, 'lh_login_logo_url' ) );
		add_filter( 'login_headertitle', array( $this, 'lh_login_logo_url_title' ) );

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
		$url  = __( 'http://www.wp-munich.com', 'agncy' );
		$name = __( 'WP Munich', 'agncy' );
		echo 'Made with &#x2661; by <a href="' . esc_attr( $url ) . '" target="_blank">' . esc_attr( $name ) . '</a>. Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>.';
	}

	/**
	 * Add some css code to change the default logo
	 * Called by action "login_enqueue_scripts".
	 *
	 * @author Hendrik Luehrsen
	 * @since 3.1
	 */
	function lh_login_logo() {
		?>
		<style type="text/css">
			body.login div#login h1 a {
				display: block;
				background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/wpm-logo.png);
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				padding-bottom: 0;
				margin-bottom: 0;
				width: 100%;
				height: auto;
			}

			body.login div#login h1 a:after {
				content: '';
				display: block;
				padding-bottom: 66%;
			}
		</style>
		<?php
	}

	/**
	 * Change the login logo url
	 *
	 * @author Hendrik Luehrsen
	 * @since 3.1
	 *
	 * @return string The new url
	 */
	function lh_login_logo_url() {
		return __( 'http://www.wp-munich.com', 'agncy' );
	}

	/**
	 * Change the login logo title
	 *
	 * @author Hendrik Luehrsen
	 * @since 3.1
	 *
	 * @return string The new title
	 */
	function lh_login_logo_url_title() {
		return __( 'WP Munich', 'agncy' );
	}

	/**
	 * The custom "read more" link.
	 *
	 * @access public
	 * @param string $more The default more link.
	 * @return string $more The custom more link.
	 */
	public function excerpt_more( $more ) {
		$more = '<a href="' . get_the_permalink() . '" class="read-more-link"><span>Read more <i class="fa fa-angle-right"></i></span></a>';
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
			$defaults, array(
				'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title has-tertiary-background-color">',
				'title_reply'        => '<span class="text">' . __( 'Leave a Reply', 'agncy' ) . '</span>',
				// translators: the name of the author of the reply to comment.
				'title_reply_to'     => '<span class="text">' . __( 'Leave a Reply to %s', 'agncy' ) . '</span>',
				'class_submit'       => 'submit has-tertiary-background-color',

			)
		);

		return $defaults;
	}
}
$_lh_theme_functions = new LhThemeFunctions();
