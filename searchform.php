<?php
/**
 * The template for displaying search forms in Simple Catch
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
?>
    <form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    	<input type="text" value="Type Keyword" name="s" id="s" title="Type Keyword" onblur="if ('' == this.value) this.value = this.defaultValue;" onfocus="if (this.defaultValue == this.value) this.value='';"/>
        <button><?php _e( 'Search', 'simplecatch' ); ?></button>
        <div class="CL"></div>
    </form>