<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

			<?php get_template_part( 'loop', 'index' ); ?>
			<?php numeric_pagination(); ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>