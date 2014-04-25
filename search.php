<?php
get_header(); ?>
<div class="container">
    <div class="row">
		<div class="main-content col-sm-12 col-md-9">
			<?php if ( have_posts() ) : ?>
				<div class="alert alert-info search-info">
					<h3 class="page-title">
					<span class="glyphicon glyphicon-search"></span>
						<?php printf( __( 'Search Results for: %s', 'ThemingStrap' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h3>
				</div>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
					<?php ThemingStrap_pagination_nav(); ?>
				<?php else : ?>
				<article id="post-0" class="no-results not-found alert alert-danger">
					<header class="post-header">
						<h1 class="search-title">
							<span class="icon-bullhorn"></span>
							<?php _e( 'Nothing Found', 'ThemingStrap' ); ?>
						</h1>
					</header>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'ThemingStrap' ); ?></p>
						<div class="col-lg-6 search-wrap">
							<?php get_search_form(); ?>
						</div>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
				<?php endif; ?>
			</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>