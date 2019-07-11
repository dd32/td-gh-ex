<?php
/**
 * Spacious New Theme Notice Class.
 *
 * @author  ThemeGrill
 * @package Spacious
 * @since   1.5.7
 */

// Exit if directly accessed.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Spacious_New_Theme_Notice
 */
class Spacious_New_Theme_Notice {

	/**
	 * Constructor function to include the required functionality for the class.
	 *
	 * Spacious_New_Theme_Notice constructor.
	 */
	public function __construct() {

		add_action( 'after_switch_theme', array( $this, 'spacious_theme_notice' ) );

		// Display the new theme notice when transient is present.
		if ( get_transient( 'spacious_theme_switched' ) ) {
			add_action( 'admin_notices', array( $this, 'spacious_new_theme_notice' ) );
			add_action( 'admin_init', array( $this, 'spacious_ignore_new_theme_notice' ) );
		}

	}

	/**
	 * Set the transient after switch theme..
	 */
	public function spacious_theme_notice() {

		set_transient( 'spacious_theme_switched', 'spacious_new_theme_notice', 3 * DAY_IN_SECONDS );
		add_action( 'admin_notices', array( $this, 'spacious_new_theme_notice' ) );
		add_action( 'admin_init', array( $this, 'spacious_ignore_new_theme_notice' ) );

	}

	/**
	 * Add a dismissible notice in the dashboard about new theme.
	 */
	public function spacious_new_theme_notice() {
		global $current_user;
		$user_id        = $current_user->ID;
		$ignored_notice = get_user_meta( $user_id, 'spacious_ignore_new_theme_notice' );
		if ( ! empty( $ignored_notice ) ) {
			return;
		}

		$dismiss_button = sprintf(
			'<a href="%s" class="notice-dismiss" style="text-decoration:none;"></a>',
			'?nag_ignore_new_theme=0'
		);

		$message = sprintf(
		/* translators: %1$s Zakra theme link %2$s Zakra theme demo link */
			esc_html__( 'Zakra - our new most flexible free WordPress theme. %1$s Zakra is fully compatible with Gutenberg, Elementor and other major page builders. Comes with %2$s to quickly setup your new website.', 'spacious' ),
			sprintf(
				'<a target="_blank" href="%1$s"><strong>%2$s</strong></a>',
				esc_url( admin_url( 'theme-install.php?theme=zakra' ) ),
				esc_html__( 'Check it out!', 'spacious' )
			),
			sprintf(
				'<a target="_blank" href="%1$s"><strong>%2$s</strong></a>',
				esc_url( 'https://demo.themegrill.com/zakra-demos/?utm_source=spacious-dashboard&utm_medium=notice-link&utm_campaign=zakra-demo' ),
				esc_html__( '10+ free starter sites', 'spacious' )
			)
		);

		printf(
			'<div class="notice updated" style="position:relative;">%1$s<p>%2$s</p></div>',
			$dismiss_button,
			$message
		);
	}

	/**
	 * Update the spacious_ignore_new_theme_notice option to true, to dismiss the notice from the dashboard
	 */
	public function spacious_ignore_new_theme_notice() {
		global $current_user;
		$user_id = $current_user->ID;

		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset( $_GET['nag_ignore_new_theme'] ) && '0' == $_GET['nag_ignore_new_theme'] ) {
			add_user_meta( $user_id, 'spacious_ignore_new_theme_notice', 'true', true );
		}
	}

}

new Spacious_New_Theme_Notice();
