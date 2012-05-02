<?php

/**
 * Creates nestable, responsive, accurate grids.
 *
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2011, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Grid {
	
	static $_specialResolutions = array(
		'mobile' => 420, // A generic mobile resolution
		'iphone' => 320,
		'iphone-landscape' => 640,
		'vga' => 640,
		'ipad' => 768,
		'ipad-landscape' => 1024,
		'svga' => 800,
		'xga' => 1024,
		'full' => 1920,
	);
	
	static $_grid_defaults = array(
		'cell' => array(
			'weight' => null,
		),
		'grid' => array(
			'responsive' => 'mobile=1&iphone-landscape=50%',
			'neg' => true,
			'cols' => null,
			'margin' => null,
			'cell-margin' => null,
		)
	);
	
	private $_config;
	
	/**
	 * Must we go ahead with processing the grids
	 */
	private $_do;

	function __construct(){
		$this->_do = false;
		add_action('init', array($this, 'action_init'), 1000);
		
		add_action('template_redirect', array($this, 'start_buffer'), 1000);
		add_action('wp_enqueue_scripts', array($this, 'enqueue_style'));
		add_filter('the_content', array($this, 'dataizer'));
		
		add_action('wp_footer', array($this, 'enable'));
	}
	
	/**
	 * Intialize the grid engine
	 */
	function action_init(){
		if(get_transient('origin_grids_clean') == false){
			$grids = get_option('origin_grids', array());
			foreach($grids as $code => $data){
				if(time() - $data['time'] > 86400){
					delete_option('origin_grids_'.$data['id']);
					unset($grids[$code]);
				}
			}

			update_option('origin_grids', $grids);
		}
	}
	
	function enqueue_style(){
		wp_enqueue_style('grid-engine', ORIGIN_BASE_URL.'/css/grid.css');
	}
	
	/**
	 * Start the buffer
	 */
	public function start_buffer(){
		ob_start(array($this, 'process'));
	}
	
	/**
	 * Enable the grid engine. This is to stop exited queries from being run.
	 */
	public function enable(){
		// We assume if we've made it all the way to wp_footer, then we'll have valid html to process
		$this->_do = true;
	}

	/**
	 * Parses a post's content to create grids
	 * @param string $content The post content
	 * @return mixed Grid content
	 */
	public function dataizer($content){
		$content = preg_replace_callback('#\[ *(cell)([^\]]*)\]#i', array($this, 'shortcode_dataizer'), $content);
		$content = preg_replace('#\[ */\ *cell([^\]])*\]#i', "\n\n</div>", $content);
		
		$content = preg_replace_callback('#\[ *(grid)([^\]]*)\]#i', array($this, 'shortcode_dataizer'), $content);
		$content = preg_replace('#\[ */\ *grid([^\]])*\]#i', "</div>", $content);
		
		return $content;
	}

	/**
	 * Turns a shortcode into a tag with the name being the class and the attributes being data-* fields.
	 * @param array $matches
	 * @return string
	 */
	public function shortcode_dataizer($matches = array()){
		$matches[2] = trim($matches[2]);
		preg_match_all('/([a-zA-Z-]+)\s*=\s*(\"??)([^"]*?)\\2/siU', $matches[2], $tag_matches);
		
		$atts = array();
		foreach($tag_matches[1] as $i => $tag){
			$atts[$tag] = $tag_matches[3][$i];
		}
		
		if(empty(self::$_grid_defaults[$matches[1]])) return '';
		
		$atts = shortcode_atts(self::$_grid_defaults[$matches[1]], $atts);
		
		$classes = array();
		$classes[] = $matches[1];
		if(isset($atts['neg'])){
			$classes[] = ($atts['neg'] ? 'withneg' : 'noneg');
		}
		
		$return = '<div class="'.implode(' ', $classes).'" ';
		foreach($atts as $tag => $val){
			if(!empty($val)) $return .= 'data-'.$tag.'="'.esc_attr($val).'" ';
		}
		$return .= ">\n\n";
		return  $return;
	}

	/**
	 * Process the DOM. Modify classes and generate the CSS.
	 * @param string $html The initial HTML
	 * @return string The processed HTML
	 */
	public function process($html){
		if(!$this->_do) return $html;
		if(empty($html)) return $html;
		
		$dom = new DOMDocument('1.0', get_bloginfo('charset'));
		@$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
		
		// Add IDs and classes to grid elements and create a signature that defines the CSS file.
		$tosign = array();
		$grid_groups = array();
		foreach($xpath->query('//div[contains(@class, "grid")]') as $gi => $grid_container){
			if(!$grid_container->hasAttribute('id')){
				// G = Grid
				$grid_container->setAttribute('id', 'g-' . $gi);
			}
			
			// Add the clearing div
			$clear = $dom->createElement('div');
			$clear->setAttribute('class', 'clear');
			$grid_container->appendChild($clear);
			
			$tosign[$gi] = array(
				'id' => $grid_container->getAttribute('id'),
				'class' => $grid_container->getAttribute('class'),
				'data-responsive' => $grid_container->getAttribute('data-responsive'),
				'data-margin' => $grid_container->getAttribute('data-margin'),
				'data-cell-margin' => $grid_container->getAttribute('data-cell-margin'),
				'cells' => array()
			);
			foreach($grid_container->attributes as $attribute){
				if(substr($attribute->name,0,5) == 'data-'){
					$tosign[$gi][$attribute->name] = $attribute->value;
				}
			}
			
			foreach($xpath->query('./div[contains(@class, "cell")]', $grid_container) as $ci => $cell){
				$cell->setAttribute('class', $cell->getAttribute('class').' '.'cell-'.$ci);
				
				$tosign[$gi]['cells'][$ci] = array(
					'id' => $cell->getAttribute('id'),
					'class' => $cell->getAttribute('class'),
					'data-weight' => $cell->getAttribute('data-weight'),
					'data-responsive' => $cell->getAttribute('data-responsive'),
				);
				foreach($cell->attributes as $attribute){
					if(substr($attribute->name,0,5) == 'data-'){
						$tosign[$gi]['cells'][$ci][$attribute->name] = $attribute->value;
					}
				}
			}
			
			$group_def = $tosign[$gi];
			unset($group_def['id']);
			
			@$grid_groups[serialize($group_def)][] = $grid_container->getAttribute('id');
		}

		// We're going to group grids to save some CSS
		$groups = array();
		foreach($grid_groups as $k => $g) {
			if(count($g) > 1) $groups[] = $g;
		}

		// Give any groups specific class names
		foreach($groups as $gid => $group) {
			foreach($group as $member) {
				$grid_element = $dom->getElementById($member);
				$classes = $grid_element->getAttribute('class');

				// GDG = Grid Group
				$grid_element->setAttribute('class', $classes.' gdg-'.$gid);
				$grid_element->setAttribute('data-grid-group', $gid);
			}
		}
		
		// Check if we've already cached this grid CSS
		$grids = get_option('origin_grids', array());
		$key = md5(serialize($tosign));
		if(!empty($grids[$key])){
			$css_text = get_option('origin_grids_'.$grids[$key]['id']);
			
			// Add the style link
			$head = $xpath->query('head')->item(0);
			if(empty($head)) return $dom->saveHTML();

			$style = $dom->createElement('style');
			$style->setAttribute('id', 'origin-dynamic-grid');
			$style->setAttribute('type', 'text/css');
			$style->setAttribute('media', 'screen');
			$head->appendChild($style);
			
			// CSS Text
			$text = $dom->createTextNode($css_text);
			$style->appendChild($text);

			return $dom->saveHTML();
		}
		
		// Generate the grid CSS
		$css = array();
		$grid_containers = $xpath->query('//div[contains(@class, "grid")]');
		
		// Size the grid
		$done_group = array();
		foreach($grid_containers as $gi => $grid_container){
			$cells = $xpath->query('./div[contains(@class, "cell")]', $grid_container);
			
			if($grid_container->hasAttribute('data-grid-group')){
				$group = $grid_container->getAttribute('data-grid-group');
				if(!empty($done_group[$group])) continue;
				$done_group[$group] = true;
				
				// GDG = Grid Group
				$grid_identifier = '.gdg-'.$group;
			}
			else{
				$grid_identifier = '#' . $grid_container->getAttribute('id');
			}
			
			if($grid_container->hasAttribute('data-margin')) {
				$css[1920]['margin-bottom:' . $grid_container->getAttribute('data-margin') . ';'][] = $grid_identifier;
			}
			
			$cols = intval($grid_container->getAttribute('data-cols'));
			if(empty($cols)){
				$cols = $cells->length;
			}
			
			// Resses that this grid operates at
			$responsive_reses = array(1920); // We consider 1920 the maximum width
			$responsive = array(
				1920 => $cols
			);
			
			// Analyze the responsiveness of the columns (collapsing)
			if($grid_container->hasAttribute('data-responsive')){
				parse_str($grid_container->getAttribute('data-responsive'), $rs);
				
				foreach($rs as $res => $scale){
					$res = isset(self::$_specialResolutions[$res]) ? self::$_specialResolutions[$res] : $res;
					$responsive_reses[] = intval($res);
					
					if(substr($scale,-1,1) == '%'){
						// Percentage based
						$responsive[$res] = ceil($cols / 100 * substr($scale,0,strlen($scale)-1));
					}
					else{
						// Integer based
						$responsive[$res] = intval($scale);
					}
				}
			}
			krsort($responsive);

			// Now we look at the cell responsiveness (reweighting)
			$cell_responsive = array();
			foreach($cells as $ci => $cell){
				@$cell_responsive[$ci][1920] = $cell->hasAttribute('data-weight') ? $cell->getAttribute('data-weight') : 1; 
				if($cell->hasAttribute('data-responsive')){
					parse_str($cell->getAttribute('data-responsive'), $rs);
					foreach($rs as $res => $weight) {
						$res = isset(self::$_specialResolutions[$res]) ? self::$_specialResolutions[$res] : $res;
						$responsive_reses[] = intval($res);
						@$cell_responsive[$ci][intval($res)] = floatval($weight); 
					}
					
					krsort($cell_responsive[$ci]);
				}
			}

			// Prepare the responsive resses array
			rsort($responsive_reses);
			$responsive_reses = array_unique($responsive_reses);
			
			foreach($responsive_reses as $i => $res){
				$cols = self::get_nearest_res_value($responsive, $res);
				$weight_sum = 0;
				
				// Calculate the maximum weight sum
				$max_weight_sum = $cols;
				$cell_weight = array();
				foreach($cells as $ci => $cell){
					$weight = $cell_weight[$ci] = self::get_nearest_res_value($cell_responsive[$ci],$res);
					
					$weight_sum += $weight;
					if($ci % $cols == $cols - 1){
						$max_weight_sum = max($max_weight_sum, $weight_sum);
						$weight_sum = 0;
					}
				}
				$max_weight_sum = max($max_weight_sum, $weight_sum);
				
				// Set the cell defaults
				$css[$res]['clear:none;'][] = $grid_identifier.' > .cell';
				
				// A single column
				if($cols == 1){
					$css[$res]['width:100%;'][] = $grid_identifier.' > .cell';
				}
				
				foreach($cells as $ci => $cell){
					$weight = $cell_weight[$ci];
					
					if($cols != 1){
						if($ci % $cols == 0) $css[$res]['clear:left;'][] = $grid_identifier.' > .cell-'.$ci;
						
						$width_rule = "width:". round(100 / $max_weight_sum * $weight,4)  ."%;";
						$css[$res][$width_rule][] = $grid_identifier.' > .cell-'.$ci;
					}
					
					if(floor($ci/$cols) == ceil($cells->length/$cols)-1){
						$css[$res]['margin-bottom:0px'][] = $grid_identifier.' > .cell-'.$ci;
					}
					else{
						$margin = $grid_container->getAttribute('data-cell-margin');
						if(empty($margin)) $margin = '15px';
						$css[$res]['margin-bottom:'.$margin.';'][] = $grid_identifier.' > .cell-'.$ci;
					}
				}
			}
		}
		
		// Build the CSS
		$css_text = '';
		krsort($css);
		foreach($css as $res => $def){
			if($res < 1920){
				$css_text .= '@media (max-width:'.$res.'px)';
				$css_text .= '{';
			}
			
			foreach($def as $property => $selector){
				$selector = array_unique($selector);
				$css_text .= implode(',', $selector).'{'.$property.'}';
			}
			
			if($res < 1920) $css_text .= '}';
		}
		
		$head = $xpath->query('head')->item(0);
		if(empty($head)) return $dom->saveHTML();
		
		// Save the CSS to the database
		$grids = get_option('origin_grids', array());
		
		// Find a unique ID for the grid
		$id = 0;
		while(true){
			$id++;
			foreach($grids as $key => $data) if($data['id'] == $id) continue 2;
			break;
		}

		$key = md5(serialize($tosign));
		$grids[$key] = array(
			'id' => $id,
			'time' => time(),
		);
		update_option('origin_grids', $grids);
		add_option('origin_grids_'.$id, $css_text, '', 'no');
		
		$style = $dom->createElement('style');
		$style->setAttribute('id', 'origin-dynamic-grid');
		$style->setAttribute('type', 'text/css');
		$style->setAttribute('media', 'screen');
		$head->appendChild($style);
		
		// CSS Text
		$text = $dom->createTextNode($css_text);
		$style->appendChild($text);
		
		
		return $dom->saveHTML();
	}
	
	static function get_nearest_res_value($input, $res){
		$k = array_keys($input);
		$v = array_values($input);
		
		foreach($k as $i => $this_res){
			if($res == $this_res) return $v[$i];
			if($res >= $this_res) return $v[$i-1];
		}
		
		return $v[count($v)-1];
	}
}