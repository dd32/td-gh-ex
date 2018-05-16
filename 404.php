<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package bb wedding bliss
 */

get_header(); ?>

<div id="content-ts">
	<div class="container">
        <div class="page-content">
			<h1><?php esc_html_e('404 Not Found', 'bb-wedding-bliss' ); ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'bb-wedding-bliss' ); ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'bb-wedding-bliss' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url(home_url() ); ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'bb-wedding-bliss' ); ?></a>
			</div>
        </div>
	</div>
</div>
<?php get_footer(); ?>