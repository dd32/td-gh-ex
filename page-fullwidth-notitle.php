<?php /* Template Name: No Title*/ ?>
<?php get_header(); ?>
<div id="wrapper">
	<div id="contentcontainer" class="container_16 containermargin">
		<div id="container" class="grid_16">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="boxes box-standard">
					<div class="entry-content">
						<?php the_content(); ?>
						<div style="clear:both;"></div>
					</div><!-- .entry-content -->
				</article>
			<?php endwhile; endif;?>
		</div><!-- #container -->
	</div><!-- #contentcontainer -->
</div><!-- #wrapper -->
<?php get_footer(); ?>