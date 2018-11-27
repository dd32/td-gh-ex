<?php
/**
 * The template for displaying search forms in beam
 *
 * @package Beam
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="field">
        <label class="label">
            <span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'beam' ); ?></span>
            <div class="control">
                <input type="search" class="input search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'beam' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'beam' ); ?>">
            </div>
        </label>
        <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'beam' ); ?>">
    </div>
</form>
