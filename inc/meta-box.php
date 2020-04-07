<?php
/**
 * Adding Custom Meta Boxes.
 *
 * @package Fmi
 */

/**
 * Add new meta box
 */
function vs_meta_boxe_layout_options() {

  $function = sprintf( 'add_meta_%s', 'box' );

  $function( 'vs_mb_layout_options', esc_html__( 'Layout Options', 'fmi' ), 'vs_mb_layout_options_callback', array( 'post', 'page' ), 'side' );
}
add_action( sprintf( 'add_meta_%s', 'boxes' ), 'vs_meta_boxe_layout_options', 100 );

/**
 * Callback meta box
 *
 * @param object $post The post object.
 */
function vs_mb_layout_options_callback( $post ) {

  wp_nonce_field( 'layout_options', 'vs_mb_layout_options' );

  $sidebar            = get_post_meta( $post->ID, 'vs_singular_sidebar', true );

  // Set Default.
  $sidebar            = $sidebar ? $sidebar : 'default';
  ?>
    <h4><?php esc_html_e( 'Sidebar', 'fmi' ); ?></h4>
    <select name="vs_singular_sidebar" id="vs_singular_sidebar">
      <option value="default" <?php selected( 'default', $sidebar ); ?>> <?php esc_html_e( 'Default', 'fmi' ); ?></option>
      <option value="right" <?php selected( 'right', $sidebar ); ?>> <?php esc_html_e( 'Right Sidebar', 'fmi' ); ?></option>
      <option value="left" <?php selected( 'left', $sidebar ); ?>> <?php esc_html_e( 'Left Sidebar', 'fmi' ); ?></option>
      <option value="disabled" <?php selected( 'disabled', $sidebar ); ?>> <?php esc_html_e( 'No Sidebar', 'fmi' ); ?></option>
    </select>
  <?php
}

/**
 * Save meta box
 *
 * @param int $post_id The post id.
 */
function vs_mb_layout_options_save( $post_id ) {

  // Bail if we're doing an auto save.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }

  // if our nonce isn't there, or we can't verify it, bail.
  if ( ! isset( $_POST['vs_mb_layout_options'] ) || ! wp_verify_nonce( $_POST['vs_mb_layout_options'], 'layout_options' ) ) { // Input var ok; sanitization ok.
    return;
  }

  if ( isset( $_POST['vs_singular_sidebar'] ) ) { // Input var ok; sanitization ok.
    $sidebar = sanitize_text_field( $_POST['vs_singular_sidebar'] ); // Input var ok; sanitization ok.
    update_post_meta( $post_id, 'vs_singular_sidebar', $sidebar );
  }
}
add_action( 'save_post', 'vs_mb_layout_options_save' );
