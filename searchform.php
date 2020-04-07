<?php
/**
 * The template for displaying search form.
 *
 * @package Fmi
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label class="sr-only"><?php esc_html_e( 'Search for:', 'fmi' ); ?></label>
  <div class="vs-input-group">
    <input type="search" value="<?php the_search_query(); ?>" name="s" class="search-field" placeholder="<?php echo esc_attr( get_theme_mod( 'misc_search_placeholder', __( 'Search ...', 'fmi' ) ) ); ?>" required>
    <span class="vs-input-group-btn"><button type="submit" class="search-submit"><i class="vs-icon vs-icon-search"></i></button></span>
  </div>
</form>
