<?php
get_header(); ?>
<div class="container">
    <div class="row">
		<div class="main-content col-sm-12 col-md-8">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<nav class="next-prev">
						<ul class="pager">
							<li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'ThemingStrap' ) . '</span> %title' ); ?></li>
							<li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'ThemingStrap' ) . '</span>' ); ?></li>
						</ul><!-- .pagination -->
					</nav>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>