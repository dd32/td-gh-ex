<?php get_header(); ?>

<?php get_template_part( 'template-part', 'wrap-before' ); ?>

					<article id="post-0" class="post error-404 page-not-found">
						<header class="entry-header page-header">
							<h1 class="entry-title"><?php _e( 'Not found - error 404', 'activetab' ); ?></h1>
						</header><!-- /.entry-header -->

						<div class="entry-content">
							<div class="alert alert-error">
								<?php _e( 'The URL you requested could not be found.', 'activetab' ); ?>
							</div>

							<?php get_search_form(); ?>

						</div><!-- /.entry-content -->
					</article><!-- /#post-0 -->

<?php get_template_part( 'template-part', 'wrap-after' ); ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>