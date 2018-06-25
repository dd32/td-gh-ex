<?php
/**
 * The template for displaying the searchform
 *
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'weaver-xtreme' ); ?></span>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search for:', 'placeholder', 'weaver-xtreme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>
</form>

