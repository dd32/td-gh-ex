<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package thebox
 * @since thebox 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Questo contenuto non esiste pi&ugrave;.', 'thebox' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p>
						<?php // _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'thebox' ); ?>
						Il mio nuovo blog si trova ora a questo indirizzo:
						<a href="http://design.altervista.org" title="Design And">design.altervista.org</a>
					</p>

					<?php // get_search_form(); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

<?php get_sidebar('sidebar-1'); ?>
<?php get_footer(); ?>

