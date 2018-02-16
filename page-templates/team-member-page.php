<?php
/*
 * Template Name: Team Member
 */
get_header();
	get_template_part('template-parts/content/content-elements/titles/page-major-title'); ?>
	<section id="content" role="main">
		<div class="main-content pad-tb-60 single-team-page">
			<div class="container grid-xl">
				<div class="columns">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<div class="column col-3 col-md-5 col-sm-12">
							<section id="content" role="main">

								<?php get_template_part('template-parts/content/content-elements/featured-image');
								comments_template();
								?>


							</section>
						</div>
					<div class="column col-6 col-md-7 col-sm-12">
						<?php the_content();?>
					</div>
					<?php endwhile;
					endif; ?>
					<div class="column col-3 col-md-12">
						<aside id="sidebar" role="complementary">
							<?php if ( is_active_sidebar( 'team-member-sidebar' ) ) : ?>
								<div id="primary" class="widget-area">
									<?php dynamic_sidebar( 'team-member-sidebar' ); ?>
								</div>
							<?php endif;?>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</section>


<?php get_footer();