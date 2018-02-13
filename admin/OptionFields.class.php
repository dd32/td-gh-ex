<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AttireOptionFields {


	/**
	 * @usage Generate Layout Type Dropdown
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public static function LayoutType( $params ) {
		$html = "<select  name='" . esc_attr( $params['name'] ) . "' id='" . esc_attr( $params['id'] ) . "' style='width: 100px'>";
		$html .= "<option value=''>" . __( 'Select', 'attire' ) . "</option>";
		$html .= "<option value='wide'" . ( $params['selected'] === 'wide' ? 'selected=selected' : '' ) . ">" . __( 'Wide', 'attire' ) . "</option>";
		$html .= "<option value='boxed'" . ( $params['selected'] === 'boxed' ? 'selected=selected' : '' ) . ">" . __( 'Boxed', 'attire' ) . "</option>";
		$html .= "<option value='framed'" . ( $params['selected'] === 'framed' ? 'selected=selected' : '' ) . ">" . __( 'Framed', 'attire' ) . "</option>";
		$html .= "</select>";

		return $html;
	}


	/**
	 * @usage Generate Post sharing control option
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public static function PostSharing( $params ) {

		extract( $params );
		$sns  = array(
			'icon-facebook'             => 'Facebook',
			'icon-twitter'              => 'Twitter',
			'icon-fontello-delicious'   => 'Delicious',
			'icon-fontello-yahoo'       => 'Yahoo',
			'icon-fontello-quora'       => 'Quora',
			'icon-fontello-digg'        => 'Digg',
			'icon-fontello-reddit'      => 'Reddit',
			'icon-fontello-xing'        => 'Xing',
			'icon-fontello-flickr'      => 'Flickr',
			'icon-fontello-evernote'    => 'Evernote',
			'icon-fontello-stumbleupon' => 'Stumble Upon',
			'icon-fontello-mixi'        => 'Mixi',
			'icon-pinterest'            => 'Pinterest',
			'icon-googleplus'           => 'Google+',
			'icon-linkedin'             => 'LinkedIn',
			'icon-fontello-instagram'   => 'Instagram',
			'icon-fontello-yelp'        => 'Yelp',
			'icon-fontello-myspace'     => 'My Space',
			'icon-fontello-skype'       => 'Skype',
			'icon-envelope'             => 'Email'
		);
		$html = "<ul class='post-sharing'>";
		foreach ( $sns as $icon => $label ) {
			$checked = in_array( $icon, $selected, true ) ? 'checked=checked' : '';
			$html    .= "<li><label><input type='checkbox' name='" . esc_attr( $name ) . "[]' value='" . esc_attr( $icon ) . "' " . esc_attr( $checked ) . " /> " . esc_html( $label ) . "</label></li>";
		}
		$html .= "</ul>";

		return $html;
	}

	public static function HeaderStyles( $params ) {
		WP_Filesystem();
		global $wp_filesystem;
		extract( $params );
		$default = ! isset( $params['default'] ) ? 1 : $params['default'];

		$navheads = scandir( get_template_directory() . '/templates/headers/' );
		if ( file_exists( get_stylesheet_directory() . '/templates/headers/' ) ) {
			$navheads = array_merge( $navheads, scandir( get_stylesheet_directory() . '/templates/headers/' ) );
		}

		$html     = "<select name='" . esc_attr( $name ) . "' id='" . esc_attr( $id ) . "' style='width: 150px'><option value='" . esc_attr( $default ) . "'>Default</option>";
		$navheads = array_unique( $navheads );
		foreach ( $navheads as $navhead ) {
			if ( strpos( $navhead, '.php' ) && ( file_exists( get_template_directory() . '/templates/headers/' . $navhead ) || file_exists( get_stylesheet_directory() . '/templates/headers/' . $navhead ) ) ) {
				$tmpdata = file_exists( get_stylesheet_directory() . '/templates/headers/' . $navhead ) ? $wp_filesystem->get_contents( get_stylesheet_directory() . '/templates/headers/' . $navhead ) : $wp_filesystem->get_contents( get_template_directory() . '/templates/headers/' . $navhead );
				$navhead = str_replace( ".php", "", $navhead );
				if ( preg_match( "/Nav[\s]*Header[\s]*Template[\s]*:([^\-\->]+)/", $tmpdata, $matches ) ) {
					$htitle = $matches[1];
				} else {
					$htitle = $navhead;
				}
				$html .= "<option value='" . esc_attr( $navhead ) . "' " . selected( $selected, $navhead, false ) . ">" . esc_html( $htitle ) . "</option>";
			}
		}

		$html .= "</select>";

		return $html;
	}

	public static function SidebarDropdown( $params ) {
		global $wp_registered_sidebars;

		$sidebars = array();
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$sid              = $sidebar['id'];
			$sidebars[ $sid ] = $sidebar['name'];
		}

		$html = "<select name ='{$params['name']}'><option value='no_sidebar'>" . __( 'Do Not Apply', 'attire' ) . "</option>";
		$html .= "<option value='default'>" . __( 'Theme Default', 'attire' ) . "</option>";
		if ( is_array( $sidebars ) ) {
			foreach ( $sidebars as $id => $name ) {
				$html .= "<option " . selected( $params['selected'], $id, false ) . " value='" . esc_attr( $id ) . "'>" . esc_attr( $name ) . "</option>";
			}
		}
		$html .= "</select>";

		return $html;
	}

	public static function GetFonts() {
		$ini_directory = get_template_directory() . '/theme-data/';
		$font_array    = parse_ini_file( "$ini_directory/fonts.php", true );

		return $font_array;
	}
}