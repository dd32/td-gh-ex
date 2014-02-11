<?php
/**
 * The template for displaying search forms in Athenea
 *
 * @package Athenea
 */
?>
<form role="search" method="get" class="search-form form-horizontal" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
      <div class="col-lg-12">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'label', 'athenea' ); ?></span>
		<input type="search" class="search-field form-control" id="busca" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'athenea' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	  </div>
    </div>
</form>
