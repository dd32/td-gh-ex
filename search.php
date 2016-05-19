<?php get_header(); ?>

<div class="container main-content">
	<div class="row">
		<div class="
		<?php if(get_theme_mod('aster_home_layout') == 'full') : ?>
		col-md-12
		<?php elseif(get_theme_mod('aster_home_layout') == 'leftsidebar') : ?>
		col-md-8 col-md-push-4
		<?php else : ?>
		col-md-8
		<?php endif; ?>
		">
			<div class="row">

				<header class="archive-header">
					<div class="archive-title"><?php printf( __( 'Search Results: <span>%s</span>', 'aster' ), get_search_query() ); ?></div>
				</header><!-- .page-header -->

				<div class="masonry_area">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

						<?php get_template_part('content', 'post'); ?>

					<?php endwhile; ?>

						<div class="col-md-12">
							<div class="next-previous-posts">
								<?php the_posts_navigation(
									array(
										'prev_text' => __( '<div class="text-left"><i class="fa fa-angle-left"></i> Older posts</div>', 'aster' ),
										'next_text' => __( '<div class="text-right">Newer posts <i class="fa fa-angle-right"></i></div>', 'aster' ),
									)
								) ?>
							</div>
						</div>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>
