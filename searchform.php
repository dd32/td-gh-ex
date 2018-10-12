<?php
/**
 * The template file to describe the search form
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agncy
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input aria-label="<?php echo esc_attr( _x( 'Search &hellip;', 'placeholder', 'agncy' ) ); ?>" type="search" class="clean-input" placeholder="<?php echo esc_attr( _x( 'Search &hellip;', 'placeholder', 'agncy' ) ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button aria-label="<?php echo esc_attr( _x( 'Submit', 'aria-label', 'agncy' ) ); ?>" type="submit" class="input-group-button search-submit color-primary--background-hover">
			<i class="fa fa-search" aria-hidden="true"></i>
		</button>
	</div>
</form>
