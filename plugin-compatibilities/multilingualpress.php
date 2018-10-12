<?php
/**
 * This file adds compatability between this theme and the 'Multilingual Press' plugin
 *
 * @see https://wordpress.org/plugins/multilingualpress/
 * @package agncy
 */

/**
 * The class that adds compatibilty between "Multilingual Press" and this theme
 */
class AgncyMultilingualPressCompatibility {

	/**
	 * The class constructor. It constructs things.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		// Only fire this class if the yoast plugin is really active.
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'multilingualpress/multilingualpress.php' ) || is_plugin_active( 'multilingual-press/multilingual-press.php' ) ) {
			$this->action_dispatcher();
			$this->filter_dispatcher();
		}
	}

	/**
	 * Set the actions we need in this class.
	 *
	 * @access private
	 * @return void
	 */
	private function action_dispatcher() {
		add_action( 'wp_head', array( $this, 'render_top_navigation' ) );
	}

	/**
	 * Set the filters we need in this class.
	 *
	 * @access private
	 * @return void
	 */
	private function filter_dispatcher() {

	}

	/**
	 * Create a navigation between translations
	 *
	 * @see http://make.multilingualpress.org/2014/04/create-a-custom-language-switcher/
	 *
	 * @param  string $between  Separator between items.
	 * @param  string $before   HTML before items.
	 * @param  string $after    HTML after items.
	 * @return string
	 */
	public function mlp_navigation( $between = ' | ', $before = '<span class="mlp-lang-nav contact-item">', $after = '</span>' ) {
		$langs = (array) mlp_get_available_languages();
		$links = (array) mlp_get_interlinked_permalinks();

		if ( empty( $langs ) ) {
			return '';
		}

		$links_by_lang = array();
		foreach ( $links as $link ) {
			$links_by_lang[ $link['language_long'] ] = $link;
		}

		$items = array();
		foreach ( $langs as $blog_id => $lang ) {
			if ( isset( $links_by_lang[ str_replace( '_', '-', $lang ) ] ) ) {
				$link = $links_by_lang[ str_replace( '_', '-', $lang ) ]['permalink'];
			} else {
				$link = get_home_url( $blog_id );
			}

			// take just the main code.
			$first = strtok( $lang, '_' );
			$text  = mb_strtoupper( $first );

			$items[] = sprintf(
				'<a href="%1$s" hreflang="%2$s" rel="alternate">%3$s</a>',
				esc_url( $link ),
				esc_attr( $lang ),
				$text
			);
		}

		echo wp_kses_post( $before . join( $between, $items ) . $after );
	}

	/**
	 * Check if we actually have linked languages and show the apprpriate link.
	 *
	 * @access public
	 * @return void
	 */
	public function render_top_navigation() {
		$links = (array) mlp_get_available_languages();

		if ( ! empty( $links ) ) {
			add_action( 'agncy_contact_bar', array( $this, 'mlp_navigation' ) );
		}

	}


}
new AgncyMultilingualPressCompatibility();
