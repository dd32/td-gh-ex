<?php
/**
 * The front-page template file.
 *
 * @package AcmeThemes
 * @subpackage AcmePhoto
 * @since AcmePhoto 1.1.0
 */
get_header(); ?>
<?php
/**
 * acmephoto_action_front_page hook
 * @since AcmePhoto 1.1.0
 *
 * @hooked acmephoto_featured_slider -  10
 * @hooked acmephoto_front_page -  20
 */
do_action( 'acmephoto_action_front_page' );
?>
<?php get_footer();