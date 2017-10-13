<?php
/**
 * The template for displaying search forms in xtremelysocial
 *
 * @package totomo
 */
?>

<form class="field" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" id="searchterm" placeholder="<?php echo esc_attr_x( 'Type Here&hellip;', 'placeholder', 'atoz' ); ?>"  value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'atoz' ); ?>"/>
            <button type="submit" id="search" class="search" value="<?php echo esc_attr_x( 'Search', 'submit button', 'atoz' ); ?>" style="background-color:<?php echo esc_attr(get_theme_mod( 'atoz_accent_color' ));?>">Search</button>
</form>
