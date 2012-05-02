<?php

/**
* A CSSList is the most generic container available. Its contents include CSSRuleSet as well as other CSSList objects.
* Also, it may contain CSSImport and CSSCharset objects stemming from @-rules.
*/
abstract class CSSList {
	private $aContents;
	
	public function __construct() {
		$this->aContents = array();
	}
	
	public function append($oItem) {
		$this->aContents[] = $oItem;
	}
	
	public function __toString() {
		$sResult = '';
		foreach($this->aContents as $oContent) {
			$sResult .= $oContent->__toString();
		}
		return $sResult;
	}
	
	public function getContents() {
		return $this->aContents;
	}
	
	protected function allDeclarationBlocks(&$aResult) {
		foreach($this->aContents as $mContent) {
			if($mContent instanceof CSSDeclarationBlock) {
				$aResult[] = $mContent;
			} else if($mContent instanceof CSSList) {
				$mContent->allDeclarationBlocks($aResult);
			}
		}
	}
	
	protected function allRuleSets(&$aResult) {
		foreach($this->aContents as $mContent) {
			if($mContent instanceof CSSRuleSet) {
				$aResult[] = $mContent;
			} else if($mContent instanceof CSSList) {
				$mContent->allRuleSets($aResult);
			}
		}
	}
	
	protected function allValues($oElement, &$aResult, $sSearchString = null, $bSearchInFunctionArguments = false) {
		if($oElement instanceof CSSList) {
			foreach($oElement->getContents() as $oContent) {
				$this->allValues($oContent, $aResult, $sSearchString, $bSearchInFunctionArguments);
			}
		} else if($oElement instanceof CSSRuleSet) {
			foreach($oElement->getRules($sSearchString) as $oRule) {
				$this->allValues($oRule, $aResult, $sSearchString, $bSearchInFunctionArguments);
			}
		} else if($oElement instanceof CSSRule) {
			$this->allValues($oElement->getValue(), $aResult, $sSearchString, $bSearchInFunctionArguments);
		} else if($oElement instanceof CSSValueList) {
			if($bSearchInFunctionArguments || !($oElement instanceof CSSFunction)) {
				foreach($oElement->getListComponents() as $mComponent) {
					$this->allValues($mComponent, $aResult, $sSearchString, $bSearchInFunctionArguments);
				}
			}
		} else {
			//Non-List CSSValue or String (CSS identifier)
			$aResult[] = $oElement;
		}
	}
	
	/**
	 * Gets all the Origin functions in the CSS
	 * 
	 * @param $oElement
	 * @param $aResult
	 * @param null $sSearchString
	 * @param bool $bSearchInFunctionArguments
	 */
	protected function allOriginFunctions($oElement, &$aResult, $sSearchString = null, $bSearchInFunctionArguments = true) {
		if($oElement instanceof CSSList) {
			foreach($oElement->getContents() as $oContent) {
				$this->allOriginFunctions($oContent, $aResult, $sSearchString, $bSearchInFunctionArguments);
			}
		} else if($oElement instanceof CSSRuleSet) {
			foreach($oElement->getRules($sSearchString) as $oRule) {
				$this->allOriginFunctions($oRule, $aResult, $sSearchString, $bSearchInFunctionArguments);
			}
		} else if($oElement instanceof CSSRule) {
			$this->allOriginFunctions($oElement->getValue(), $aResult, $sSearchString, $bSearchInFunctionArguments);
		} else if($oElement instanceof CSSValueList) {
			if($bSearchInFunctionArguments || !($oElement instanceof CSSFunction)) {
				foreach($oElement->getListComponents() as $mComponent) {
					$this->allOriginFunctions($mComponent, $aResult, $sSearchString, $bSearchInFunctionArguments);
				}
			}
		}
		
		// We want origin functions
		if($oElement instanceof CSSOriginFunction){
			$aResult[] = $oElement;
		}
	}
	
	protected function allSelectors(&$aResult, $sSpecificitySearch = null) {
		
		// Create the specificity search function
		$parts = preg_split('/([\!\=\>\<]+)/','_ ' . $sSpecificitySearch, null, PREG_SPLIT_DELIM_CAPTURE);
		$parts = array_map('trim', $parts);
		
		if(count($parts) != 3) throw new Exception('Invalid Conditional');
		list($a, $cmp, $b) = $parts;
		$fn = create_function('$s', "return \$s $cmp $b;");
		
		foreach($this->getAllDeclarationBlocks() as $oBlock) {
			foreach($oBlock->getSelectors() as $oSelector) {
				if($sSpecificitySearch === null) {
					$aResult[] = $oSelector;
				} else {
					$bRes = $fn($oSelector->getSpecificity());
					if($bRes) {
						$aResult[] = $oSelector;
					}
				}
			}
		}
	}
}

/**
* The root CSSList of a parsed file. Contains all top-level css contents, mostly declaration blocks, but also any @-rules encountered.
*/
class CSSDocument extends CSSList {
	/**
	* Gets all CSSDeclarationBlock objects recursively.
	*/
	public function getAllDeclarationBlocks() {
		$aResult = array();
		$this->allDeclarationBlocks($aResult);
		return $aResult;
	}

	/**
	* @deprecated use getAllDeclarationBlocks()
	*/
	public function getAllSelectors() {
		return $this->getAllDeclarationBlocks();
	}
	
	/**
	* Returns all CSSRuleSet objects found recursively in the tree.
	*/
	public function getAllRuleSets() {
		$aResult = array();
		$this->allRuleSets($aResult);
		return $aResult;
	}
	
	/**
	* Returns all CSSValue objects found recursively in the tree.
	* @param (object|string) $mElement the CSSList or CSSRuleSet to start the search from (defaults to the whole document). If a string is given, it is used as rule name filter (@see{CSSRuleSet->getRules()}).
	* @param (bool) $bSearchInFunctionArguments whether to also return CSSValue objects used as CSSFunction arguments.
	* @return array
	*/
	public function getAllValues($mElement = null, $bSearchInFunctionArguments = false) {
		$sSearchString = null;
		if($mElement === null) {
			$mElement = $this;
		} else if(is_string($mElement)) {
			$sSearchString = $mElement;
			$mElement = $this;
		}
		$aResult = array();
		$this->allValues($mElement, $aResult, $sSearchString, $bSearchInFunctionArguments);
		return $aResult;
	}
	
	/**
	 * @param null $mElement
	 * @param bool $bSearchInFunctionArguments
	 * @return array
	 */
	public function getAllOriginFunctions($mElement = null, $bSearchInFunctionArguments = true){
		$sSearchString = null;
		if($mElement === null) {
			$mElement = $this;
		} else if(is_string($mElement)) {
			$sSearchString = $mElement;
			$mElement = $this;
		}
		$aResult = array();
		$this->allOriginFunctions($mElement, $aResult, $sSearchString, $bSearchInFunctionArguments);
		return $aResult;
	}

	/**
	* Returns all CSSSelector objects found recursively in the tree.
	* Note that this does not yield the full CSSDeclarationBlock that the selector belongs to (and, currently, there is no way to get to that).
	* @param $sSpecificitySearch An optional filter by specificity. May contain a comparison operator and a number or just a number (defaults to "==").
	* @example getSelectorsBySpecificity('>= 100')
	*/
	public function getSelectorsBySpecificity($sSpecificitySearch = null) {
		if(is_numeric($sSpecificitySearch) || is_numeric($sSpecificitySearch[0])) {
			$sSpecificitySearch = "== $sSpecificitySearch";
		}
		$aResult = array();
		$this->allSelectors($aResult, $sSpecificitySearch);
		return $aResult;
	}
  
	/**
	* Expands all shorthand properties to their long value
	*/ 
	public function expandShorthands() {
		foreach($this->getAllDeclarationBlocks() as $oDeclaration) {
			$oDeclaration->expandShorthands();
		}
	}

	/*
	* Create shorthands properties whenever possible
	*/
	public function createShorthands() {
		foreach($this->getAllDeclarationBlocks() as $oDeclaration) {
			$oDeclaration->createShorthands();
		}
	}
	
	/**
	 * Creates additional CSS rules to support all browsers
	 * 
	 * @todo finish this
	 */
	public function createCss3BrowserSupport() {
		
	}

	/**
	 * Inserts values and executes functions defined by the executor.
	 * @param $values
	 * @param $executor
	 * @return void
	 */
	public function originProcess($values, $executor){
		// Check all the conditionals
		foreach($this->getContents() as $c){
			if($c instanceof CSSOriginConditional){
				$c->substitute($values);
			}
		}
		
		// Swap out variables for their values
		foreach($this->getAllValues(null, true) as $value){
			if($value instanceof CSSOriginVariable){
				$value->substitute($values);
			}
		}
		
		// Now we need to process all the functions
		foreach($this->getAllOriginFunctions() as $function){
			$function->execute($executor);
		}
	}

	/**
	 * Sets the Javascript mode on all contained Origin objects
	 * @param $mode
	 */
	public function originSetJSMode($mode){
		foreach($this->getAllValues(null, true) as $value){
			if($value instanceof CSSOriginVariable) $value->setJSMode($mode);
		}
		foreach($this->getAllOriginFunctions() as $function) $function->setJSMode($mode);
		foreach($this->getContents() as $c){
			if($c instanceof CSSOriginConditional){
				$c->setJSMode($mode);
			}
		}
	}
	
	/**
	 * Gets the javascript function used to create dynamic CSS
	 * @return string
	 */
	public function originJavascriptFunction(){
		$this->originSetJSMode(true);
		$js = 'var originGenerateCss = function(v, e){ return "'.$this->__toString().'" };';
		
		$this->originSetJSMode(false);
		
		return $js;
	}
	
	/**
	 * @return array() Which origin variables affect which rules
	 */
	public function originGetEffects(){
		// We need to find out which deceleration blocks are affected by which origin variables
		$effects = array();
		foreach($this->getAllDeclarationBlocks() as $block){
			$selectors = array();
			foreach($block->getSelectors() as $s){
				$selectors[] = $s->getSelector();
			}
			
			foreach($this->getAllValues($block, true) as $value){
				if($value instanceof CSSOriginVariable){
					$var = $value->getVariable();
					if(!empty($var)){
						list($s, $n) = explode('->', $var);
						if(empty($effects[$s][$n])) @$effects[$s][$n] = array();
						$effects[$s][$n] = array_unique(array_merge($effects[$s][$n], $selectors));
					}
				}
			}
		}
		
		return $effects;
	}
}

/**
* A CSSList consisting of the CSSList and CSSList objects found in a @media query.
*/
class CSSMediaQuery extends CSSList {
	private $sQuery;
	
	public function __construct() {
		parent::__construct();
		$this->sQuery = null;
	}
	
	public function setQuery($sQuery) {
			$this->sQuery = $sQuery;
	}

	public function getQuery() {
			return $this->sQuery;
	}
	
	public function __toString() {
		$sResult = "@media {$this->sQuery} {";
		$sResult .= parent::__toString();
		$sResult .= '}';
		return $sResult;
	}
}

class CSSOriginConditional extends CSSList {
	private $conditional;
	private $jsMode;

	public function __construct() {
		parent::__construct();
		$this->conditional = null;
	}
	
	public function setConditional($conditional) {
		$this->conditional = $conditional;
	}

	public function getConditional() {
		return $this->conditional;
	}
	
	/**
	 * Enable/disable Javascript mode, which effects how the string is generated
	 * @param $jsMode
	 */
	public function setJSMode($jsMode) {
		$this->jsMode = $jsMode;
	}
	
	/**
	 * Replace variables in the conditional with actual values
	 * @param array $values The values
	 */
	public function substitute($values){
		do{
			preg_match('/(\$(\w+)->(\w+))[^\w|$]/', $this->conditional, $matches, PREG_OFFSET_CAPTURE);
			
			if(!empty($matches)){
				$value = $values[$matches[2][0]][$matches[3][0]];
				$this->conditional = substr_replace($this->conditional, $value, $matches[1][1], strlen($matches[1][0]));
			}
			else break;
			
		} while(true);
	}
	
	public function __toString(){
		if($this->jsMode){
			$condition = preg_replace('/\$(\w+)->(\w+)/',"v['$1']['$2']", $this->conditional);
			return '" + ' . "((" . $condition . ") ? (\"" . parent::__toString() . "\") : '') " . ' + "'; 
		}
		else{
			$parts = preg_split('/([\!\=\>\<]+)/',$this->conditional, null, PREG_SPLIT_DELIM_CAPTURE);
			$parts = array_map('trim', $parts);
			
			if(count($parts) != 3) throw new Exception('Invalid Conditional');
			list($a, $cmp, $b) = $parts;
			
			// Create a temporary comparison function
			$fn = create_function('$a, $b', 'return $a '.$cmp.' $b;');
			$c = $fn($a,$b);
			
			if($c) return parent::__toString();
			else return '';
		}
	}
}