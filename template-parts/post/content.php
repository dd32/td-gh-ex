<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bestblog
 */

?>

		<?php	if (get_theme_mod('layout_page_gen','content1')) {
					$blogpost_style = get_theme_mod('layout_page_gen', array( 'content1', 'content2'));
					get_template_part('template-parts/layouts/part', ''.$blogpost_style .'');
			}?>
