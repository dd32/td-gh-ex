<?php
/**
 * Display WooCommerce search form
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form
 *
 * @package Aamla
 * @since 1.0.1
 */

?>

<form method="get"<?php aamla_attr( 'search-form' ); ?> action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label class="label-search">
	<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'aamla' ); ?></span>
	<input type="search"<?php aamla_attr( 'search-field' ); ?> placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'aamla' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'aamla' ); ?>" />
</label>
<button type="submit"<?php aamla_attr( 'search-submit' ); ?>><?php aamla_icon( [ 'icon' => 'search' ] ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'aamla' ); ?></span></button>
<input type="hidden" name="post_type" value="product" />
</form>
