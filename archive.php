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
					<?php
					aster_archive_title( '<div class="archive-title">', '</div>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->


				<div class="masonry_area">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

						<?php get_template_part('content', 'post'); ?>

					<?php endwhile; ?>

						<div class="col-md-12">
							<?php if (get_theme_mod('aster_blog_pagination') == 'navigation') {
								aster_posts_navigation();
							} else {
								aster_posts_pagination();
							} ?>
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
