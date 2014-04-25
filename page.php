<?php
get_header(); ?>
<div class="container">
    <div class="row">
		<div class="main-content col-sm-12 col-md-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>