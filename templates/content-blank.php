<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The default template for displaying content
 *
 * Displays content from blank page template - just the content...
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 */

global $weaverx_cur_post_ID;
$weaverx_cur_post_ID = get_the_ID();
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('content-blank'); ?>>
<?php 	weaverx_the_post_full();
?>
	</div><!-- #post-<?php the_ID(); ?> -->
<?php 	edit_post_link( __( 'Edit','weaverx'), '<span class="edit-link">', '</span>' ); ?>
