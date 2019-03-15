<?php
/**
 * The template for displaying the searchform
 *
 */
$searchw = esc_html__( 'Search for:', 'weaver-xtreme' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo $searchw; ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( $searchw ); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
	</label>
	<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>
</form>
