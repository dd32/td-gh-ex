<?php

require_once(dirname(__FILE__).'/Css_Executor.php');

/**
 * Generates CSS files
 *
 * @author Greg Priday <greg@siteorigin.com>
 * @copyright Copyright (c) 2011, SiteOrigin
 * @license GPL <siteorigin.com/gpl>
 */
class Origin_Css {
	
	private $filename;
	
	/**
	 * @var CSSDocument The CSS document
	 */
	private $css_doc;
	
	function __construct($filename = null){
		if(empty($filename)) $filename = get_template_directory().'/conf/origin.css';
		
		$this->filename = $filename;
	}

	/**
	 * Parse a CSS file
	 * @param null $file
	 * @return CSSDocument
	 */
	function parse($file = null){
		if(!empty($this->css_doc)) return $this->css_doc;
		if(!class_exists('CSSParser')) require(dirname(__FILE__).'/../externals/css-parser/CSSParser.php');
		if(empty($file)) $file = $this->filename;
		
		// Read the contents of the CSS file
		$reader = new POMO_FileReader($file);
		$css = $reader->read_all();
		
		// Parse the CSS
		$parser = new CSSParser($css);
		$this->css_doc = $parser->parse();
	}
	
	/**
	 * Return an array indicating which settings effect which CSS selectors
	 * @return array()
	 */
	function get_setting_selectors(){
		if (empty($this->css_doc)) $this->parse();
		return $this->css_doc->originGetEffects();
	}
	
	/**
	 * Gets all the selectors.
	 *
	 * @return array() A flat array of selectors.
	 */
	function get_selectors(){
		if (empty($this->css_doc)) $this->parse();
		$selectors = array();
		foreach($this->css_doc->getAllRuleSets() as $rule){
			foreach($rule->getSelectors() as $selector){
				$selectors[] = $selector->getSelector();
			}
		}
		array_unique($selectors);
		
		return $selectors;
	}

	/**
	 * Generate the CSS
	 * 
	 * @param array $values The settings values
	 * @param string $executor The executor we'll be using
	 * 
	 * @return string The CSS
	 */
	function get_css($values, $executor = 'Origin_Css_Executor'){
		if (empty($this->css_doc)) $this->parse();
		
		$this->css_doc->originProcess($values, $executor);
		return $this->css_doc->__toString();
	}
	
	/**
	 * Gets the JS code required to generate
	 * @return string
	 */
	function get_js_function(){
		if (empty($this->css_doc)) $this->parse();
		
		return $this->css_doc->originJavascriptFunction();
	}
}