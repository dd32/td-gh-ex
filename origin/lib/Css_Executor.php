<?php

/**
 * Has a whole bunch of static functions that handle custom CSS functions.
 * 
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2011, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Css_Executor{
	
	/**
	 * @var bool If we're operating in temp mode or not.
	 */
	static $temp_mode = false;
	
	/**
	 * @param bool $mode Set the global temp mode for the CSS Executor 
	 * @static 
	 */
	public static function set_temp_mode($mode){
		self::$temp_mode = $mode;
	}
	
	/**
	 * Simply joins all the arguments together into a string
	 * @static
	 * @return string
	 */
	public static function e(){
		$args = func_get_args();
		return implode('', $args);
	}

	/**
	 * Echo IF function
	 * @static
	 * @param bool|string $check The value to check
	 * @param bool|string $equals Must be equal to this
	 * @param string $true Return if true
	 * @param string $false Return if false 
	 */
	public static function eif($check, $opEquals, $true, $false){
		if(empty($check)){
			$check = false;
		}
		elseif(!is_bool($check)){
			$parts = preg_split('/([\!\=\>\<]+)/',$check.' '.$opEquals, null, PREG_SPLIT_DELIM_CAPTURE);
			if(count($parts) != 3) throw new Exception('Invalid EIF in CSS executor');
			
			list($a, $cmp, $b) = $parts;
			$fn = create_function('$a, $b', 'return $a '.$cmp.' $b;');
			$check = $fn($a,$b);
		}
		
		return $check ? $true : $false;
	}
	
	public static function multiply($a, $b){return $a * $b;}
	public static function divide($a, $b){return $a / $b;}
	public static function add($a, $b){return $a + $b;}
	public static function subtract($a, $b){return $a - $b;}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// The CSS functions
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Displays all the font styles for a font setting
	 * @param $v
	 * @return string
	 */
	function font($v){
		$v = unserialize($v);
		if($v['variant'] == 'regular') $v['variant'] = '400';
		
		$is_italic = strpos($v['variant'], 'italic') !== false;
		$weight = intval($v['variant']);
		
		$r = array();
		if($is_italic) array_push($r, 'font-style:italic');
		array_push($r, 'font-weight:'.$weight);
		array_push($r, 'font-family: "'.$v['family'].'", Arial, Helvetica, Geneva, sans-serif');
		
		return implode('; ', $r).'; ';
	}
	
	/**
	 * @static
	 * @return string The template URL
	 */
	public static function template_url(){
		return get_template_directory_uri();
	}
	
	/**
	 * @static
	 * @return string The site URL
	 */
	public static function site_url(){
		return get_site_url();
	}
	
	////////////////////////////////////////////////////////////////////////////
	// Color Functions
	////////////////////////////////////////////////////////////////////////////

	/**
	 * Varies the luminance of the argument color
	 * @param $color
	 * @param $lum
	 * @param null $m
	 * @return mixed
	 */
	public static function color_lum($color, $lum, $m = null){
		$base = new Origin_Color($color);
		if(!empty($m)) $lum *= $m;
		
		$base->lum += $lum;
		return $base->hex;
	}
	
	/**
	 * @static
	 * @param $float
	 * @return string
	 */
	public static function color_grey($float){
		return Origin_Color_Base::float2hex($float);
	}

	/**
	 * Displays an RGBA color
	 * @param $color The HEX color
	 * @param $opacity The opacity
	 * @return string RGBA string
	 */
	public static function rgba($color, $opacity){
		$rgb = Origin_Color_Base::hex2rgb($color);
		return 'rgba('.implode(',', $rgb).','.$opacity.')';
	}
	
	////////////////////////////////////////////////////////////////////////////
	// CSS Functions
	////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Creates the CSS for a gradient.
	 *
	 * @param string $color The hex of the center color.
	 * @param float $var The lum amount
	 * @return string
	 */
	public static function css_gradient($color, $var){
		$base = new Origin_Color($color);
		
		if(is_numeric($var)){
			$start = clone $base;
			$start->lum -= $var/2;
			
			$end = clone $base;
			$end->lum += $var/2;
		}
		else {
			$start = clone $base;
			$end = new Origin_Color($var);
		}
		
		return implode('; ', array(
			"background: #ffffff",
			"background: -moz-linear-gradient(top, {$start->hex} 0%, {$end->hex} 100%)",
			"background: -webkit-linear-gradient(top, {$start->hex} 0%, {$end->hex} 100%)",
			"background: -o-linear-gradient(top, {$start->hex} 0%, {$end->hex} 100%)",
			"background: -ms-linear-gradient(top, {$start->hex} 0%, {$end->hex} 100%)",
			"background: linear-gradient(top, {$start->hex} 0%, {$end->hex} 100%)",
			"filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='{$start->hex}', endColorstr='{$end->hex}',GradientType=0 )",
		)).'; ';
	}
	
	/**
	 * Generate cross browser border radius.
	 * 
	 * @static
	 * @param $radius
	 * @return string
	 */
	public static function css_border_radius($radius){
		return implode('; ', array(
			'-webkit-border-radius: '. $radius . 'px',
			'-moz-border-radius: '. $radius . 'px',
			'border-radius: '. $radius . 'px',
		)).'; ';
	}
	
	/**
	 * Generates cross browser CSS for a box shadow
	 * 
	 * @static
	 * @return string
	 */
	public static function css_box_shadow(){
		$args = func_get_args();
		$shadows = ceil(count($args)/6);
		$shadow_defs = array();
		
		for($i = 0; $i < $shadows; $i++){
			$inset = $args[$i*6 + 0];
			$x = $args[$i*6 + 1];
			$y = $args[$i*6 + 2];
			$size = $args[$i*6 + 3];
			$color = Origin_Color_Base::hex2rgb($args[$i*6 + 4]);
			$opacity = $args[$i*6 + 5];
			
			if($opacity > 0){
				$shadow_defs[] = 
					($inset ? 'inset ' : '')
					. $x . 'px '
					. $y . 'px '
					. $size . 'px '
					. 'rgba(' . implode(', ',$color) . ', ' . $opacity . ')';
			}
		}
		
		if(count($shadow_defs)){
			return implode('; ', array(
				'box-shadow: ' . implode(', ', $shadow_defs),
				'-webkit-box-shadow: ' . implode(', ', $shadow_defs),
				'-moz-box-shadow: ' . implode(', ', $shadow_defs)
			)).'; ';
		}
		else{
			return '';
		}
	}
	
	/**
	 * Generates cross browser CSS opacity
	 * 
	 * @static
	 * @param $opacity
	 * @return string
	 */
	public static function css_opacity($opacity){
		return implode('; ', array(
			'opacity: '.$opacity,
			'zoom: 1',
			'filter: alpha(opacity='.round($opacity*100).')',
		)).'; ';
	}
	
	/**
	 * Creates CSS for cross browser transparent background.
	 *
	 * @param string $color The hex color
	 * @param float $opacity Opacity as float 0-1
	 * 
	 * @return string
	 */
	public static function transparent_background($color, $opacity){
		$base = new Origin_Color($color);
		
		$hex = $base->hex . base_convert(round($opacity*255), 10, 16);
		return implode('; ', array(
			'background-color: '.$base->hex,
			'background-color: rgba('.implode(', ', $base->rgb).','.$opacity.')',
			'filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='.$hex.',endColorstr='.$hex.')',
			'zoom: 1'
		)).'; ';
	}

	/**
	 * Generate and return an overlay image CSS
	 * 
	 * @static
	 * @param $background
	 * @param $texture
	 * @param $texture_level
	 * @param $noise
	 * 
	 * @throws Exception
	 * @return string The URL of the overlay image
	 */
	public static function api_overlay($background, $texture, $texture_level, $noise) {
		$texture = unserialize($texture);
		if(($texture['texture'] == '::none' || $texture_level == 0) && $noise == 0) return $background;
		
		// Prepare the input
		$request = array(
			'background' => substr($background,1),
			'texture' => $texture['texture'],
			'blend' => $texture['blend'],
			'texture_level' => $texture_level,
			'noise' => $noise,
		);
		$image_url = Origin::ENDPOINT . '/imageapi/overlay/' . implode('/',array_map('urlencode', array_values($request))) . '/';

		return $background . ' url(' . $image_url . ') center center';
	}

	/**
	 * Create the CSS for a gradient image.
	 * 
	 * @static
	 * 
	 * @param $start
	 * @param $end
	 * @param $height
	 * @param $texture
	 * @param $texture_level
	 * @param $noise
	 * 
	 * @throws Exception
	 * @return string
	 */
	public static function api_gradient($start, $end, $height, $texture, $texture_level, $noise) {
		$texture = unserialize($texture);
		if($start == $end && ($texture['texture'] == '::none' || $texture_level == 0) && $noise == 0) return $start;

		// Prepare the input
		if(!is_array($texture)){
			$texture['texture'] = $texture;
			$texture['blend'] = 'Multiply';
		}

		$request = array(
			'start' => substr($start,1),
			'end' => substr($end,1),
			'height' => $height,
			'texture' => $texture['texture'],
			'blend' => $texture['blend'],
			'texture_level' => $texture_level,
			'noise' => $noise,
		);
		$image_url = Origin::ENDPOINT . '/imageapi/gradient/' . implode('/', array_map('urlencode', array_values($request))) . '/';

		return $end . ' url(' . $image_url . ') left top repeat-x';
	}
}