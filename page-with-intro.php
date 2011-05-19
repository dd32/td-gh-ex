<?php /*
Template Name: page-with-intro
*/ ?>


<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<div style="clear: both;"></div>
	<?php endwhile; else: endif; ?>
	<br /><br />
	<?php $slug = basename(get_permalink());
           // replace $slub with get_the_title() in the line below if you want to get posts based
           // on category name instead of slug  ?>
	<?php query_posts('category_name='.$slug.'&post_status=publish,future&orderby=date&order=desc');?>
<?php /*

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php mantra_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mantra' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<div class="entry-utility">
						<?php mantra_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'mantra' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
*/ ?>

<?php get_template_part( 'loop', 'index' ); ?>



			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
