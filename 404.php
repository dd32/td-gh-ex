<?php
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2019, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AeonBlog
 */

get_header();
?>

<div class="error-page-wrapper">
	<div class="container">
			<div class="error-message text-center">
				<h2 class="page-title"><?php esc_html_e( '404', 'aeonblog' ); ?></h2>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'aeonblog' ); ?></p>	
			</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
