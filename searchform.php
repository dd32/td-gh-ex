<?php
/**
 * The template for displaying search forms in Simple Catch
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
$options = get_option( 'simplecatch_options' );
if( !isset( $options[ 'search_display_text' ] ) ) {
	$options[ 'search_display_text' ] = "Type Keyword";
}
if( !isset( $options[ 'search_button_text' ] ) ) {
	$options[ 'search_button_text' ] = "Search";
}
$search_display_text = $options[ 'search_display_text' ];
$search_button_text = $options[ 'search_button_text' ];
?>
    <form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    	<input type="text" value="<?php printf( __( '%s', 'simplecatch' ), $search_display_text ); ?>" name="s" id="s" title="Type Keyword" onblur="if ('' == this.value) this.value = this.defaultValue;" onfocus="if (this.defaultValue == this.value) this.value='';"/>
        <button><?php printf( __( '%s', 'simplecatch' ), $search_button_text ); ?></button>
        <div class="CL"></div>
    </form>