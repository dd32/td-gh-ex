<?php get_header(); ?>

<article id="post-0" class="post not-found">

	<div class="post-header no-split">

		<h1 class="post-title">

			<?php esc_html_e( 'Error 404', 'aemi' ); ?>

		</h1>

	</div>

	<div class="post-content centered">

		<p><?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'aemi' ); ?></p>

		<?php get_search_form(); ?>

	</div>

</article>

<?php get_footer(); ?>
