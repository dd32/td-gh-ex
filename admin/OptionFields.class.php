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
		$html = "<select  name='{$params['name']}' id='{$params['id']}' style='width: 100px'>";
		$html .= "<option value=''>".__('Select','attire')."</option>";
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
			$html    .= "<li><label><input type='checkbox' name='{$name}[]' value='{$icon}' " . $checked . " /> {$label}</label></li>";
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

		$html     = "<select name='{$name}' id='{$id}' style='width: 150px'><option value='{$default}'>Default</option>";
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
				$html .= "<option value='{$navhead}' " . selected( $selected, $navhead, false ) . ">{$htitle}</option>";
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
				$html .= "<option " . selected( $params['selected'], $id, false ) . " value='{$id}'>{$name}</option>";
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

	public static function CustomBackground( $params ) {
		extract( $params );

		if ( ! isset( $selected ) || ! is_array( $selected ) || count( $selected ) == 0 ) {
			$selected = array(
				'image'      => '',
				'position_h' => '',
				'position_v' => '',
				'attachment' => '',
				'repeat'     => '',
				'color'      => ''
			);
		}
		$html = "<div class='col-md-5' style='padding: 0'>";
		$html .= "<label>Background Color</label><br/>";
		$html .= '<input class="' . $id . ' colorpicker" type="text" name="' . $name . '[color]" id="' . $id . '_color" size=10 placeholder="Color" value="' . $selected['color'] . '" ><script>jQuery(function(){ preview_cbg("' . $id . '");});</script>';
		$html .= "<br/><label>Background Image</label><br/>";
		$html .= "<div class='input-group' style='margin-right: 10px;max-width: 500px'><span class='input-group-btn'><button rel='#{$id}_image' class='btn btn-default attire-media-upload' type='button'><i class='fa fa-picture-o'></i></button></span><input onchange='preview_cbg(\"{$id}\")' style='min-width: 90%' class='{$id} form-control' type='text' name='{$name}[image]' id='{$id}_image' value='{$selected['image']}' /></div>";
		$html .= "<br/><label>Background Image Position</label><br/>";
		$html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:90px' onchange='preview_cbg(\"{$id}\")' id='{$id}_position_h' name='{$name}[position_h]'><option value='left'>Left</option><option value='center' " . ( $selected['position_h'] == 'center' ? 'selected=selected' : '' ) . ">Center</option><option value='right' " . ( $selected['position_h'] == 'right' ? 'selected=selected' : '' ) . ">Right</option></select></div>";
		$html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:90px' onchange='preview_cbg(\"{$id}\")' id='{$id}_position_v' name='{$name}[position_v]'><option value='top'>Top</option><option value='center' " . ( $selected['position_v'] == 'center' ? 'selected=selected' : '' ) . ">Center</option><option value='bottom' " . ( $selected['position_v'] == 'bottom' ? 'selected=selected' : '' ) . ">Bottom</option></select></div>";
		$html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:150px;' onchange='preview_cbg(\"{$id}\")' id='{$id}_repeat' name='{$name}[repeat]'><option value='no-repeat'>No Repeat</option><option value='repeat' " . ( $selected['repeat'] == 'repeat' ? 'selected=selected' : '' ) . ">Repeat</option><option value='repeat-x' " . ( $selected['repeat'] == 'repeat-x' ? 'selected=selected' : '' ) . ">Repeat Horizontally</option><option value='repeat-y' " . ( $selected['repeat'] == 'repeat-y' ? 'selected=selected' : '' ) . ">Repeat Vertically</option><option value='stretched' " . ( $selected['repeat'] == 'stretched' ? 'selected=selected' : '' ) . ">Stretched</option></select></div>";
		$html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:90px' onchange='preview_cbg(\"{$id}\")' id='{$id}_attachment' name='{$name}[attachment]'><option value='scroll'>Scroll</option><option value='fixed' " . ( $selected['attachment'] == 'fixed' ? 'selected=selected' : '' ) . ">Fixed</option></select></div>";
		$html .= "<div style='clear:both;'>&nbsp;</div>";
		$bgs  = scandir( ATTIRE_TEMPLATE_DIR . '/images/bg/' );
		$html .= "<div id='prebgs' style='margin:0 0 10px 0px;float:left;width:290px;max-width:100%;height:75px;overflow:auto;background:#555;padding:5px;position: relative'>";
		foreach ( $bgs as $file ) {
			if ( $file != '.' && $file != '..' ) {
				$url  = get_template_directory_uri() . '/images/bg/' . $file;
				$html .= "<div data-url='$url' class='prebg' data-rel='{$id}' style='cursor:pointer;background:#fff url($url) center center;height:30px;width:38px;margin:2px;float:left;'></div>";
			}
		}
		$html            .= "<div style='clear:both'></div></div><div style='clear:both'></div>";
		$params['value'] = $selected['color'];
		$html            .= "</div>";
		$html            .= "<div class='col-md-7' style='padding-right: 0'>";
		$html            .= "<button class='btn btn-sm btn-default col-md-12' id='clear_cpb' type='button'>" . __( 'Clear', 'attire' ) . "</button>";
		$html            .= "<br/><div id='hfp' title='" . __( 'Monitor Preview', 'attire' ) . "' style='min-height:280px;min-width:100%; border: 1px solid rgba(0, 0, 0, 0.1);'></div>";
		$html            .= "</div>";

		return $html;
	}

}