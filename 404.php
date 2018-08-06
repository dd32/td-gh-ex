<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package atlas-concern
 */

get_header();
?>
<div class="top-header">
 <div class="container">
   <div class="row">
      <div class="col-md-8">
       <h3><?php esc_html_e('404','atlas-concern'); ?></h3>
      </div>
   </div>
  </div>
</div>

<div class="container">
   <div class="row">
        <div class="col-md-12">
			<section class="error-404 not-found message">
				<div class="page-content">
					<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'atlas-concern' ); ?></h1>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'atlas-concern' ); ?></p>
				    <div class="h-btn">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-btn"><?php esc_html_e('Home Back','atlas-concern'); ?></a>
				    </div>
				</div>
			</section>

		</div>
	</div>
</div>
<?php
get_footer();
