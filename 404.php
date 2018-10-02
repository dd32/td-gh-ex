<?php
/**
 * Error - file not found
 *
 * @package Bexley
 */

	get_header();
?>
<article class="page-404">
	<section class="post-entry">

		<h1 class="posttitle"><?php esc_html_e( 'Error 404 - Not Found', 'bexley' ); ?></h1>
		<p class="page-404"><?php esc_html_e( 'Sorry, but the page you are looking for has not been found. Try checking the URL for errors, then hit the refresh button in your browser.', 'bexley' ); ?></p>

<?php
	$query = new WP_Query(
		array(
			'posts_per_page' => 5,
			'ignore_sticky_posts' => true,
		)
	);

	if ( $query->have_posts() ) {
?>
		<h3><?php esc_html_e( 'Recent Posts', 'bexley' ); ?></h3>
		<ul>
<?php
		while ( $query->have_posts() ) {
			$query->the_post();
?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
		}
?>
		</ul>
<?php
	}

	wp_reset_postdata();
?>
	</section>
</article>
<?php
	get_footer();
