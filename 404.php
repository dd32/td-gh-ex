<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Best_Charity
 */

get_header();
?>
<section class="blog-block">
	<div class="container">
		<div class="row">
			<div class="col-xl-9 col-lg-8">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'best-charity' ); ?></h1>
				</header>

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'best-charity' ); ?></p>
				</div>
			</div>	
		</div>
	</div>
</section>

<?php
get_footer();
?>