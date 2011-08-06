<?php
/** Chip Life Options */
function get_chip_life_options( $key = 'chip_life_options' ) {
	
	/** Setup Cache */
	static $chip_life_options = array();
	if ( ! empty( $chip_life_options ) ) {
		return $chip_life_options;
	}
	
	$chip_life_options = get_option( $key );
	return $chip_life_options;

}

/**
 * Avoid "Undefined Index"
 * Must be passed by reference
 */
function chip_life_undefined_index_fix( &$var ) {

	if ( isset( $var ) ) {
		return $var;
	}
	
	return '';
}

/** Chip Life 404 Page */
function chip_life_404_init() {
?>
<div class="taxonomy-wrap">
  <h2 class="taxonomy-title">Not Found, Error 404</h2>
</div>

<div class="post">  
  <div class="entry-content">	  
      <p>Apologies, but the page you requested could not be found. Perhaps searching will help.</p>
      <p><?php get_search_form(); ?></p>      
  <div class="clear"></div>
  </div><!-- end .entry-content -->  
</div>
<?php
}
?>