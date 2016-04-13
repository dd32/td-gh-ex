<?php
/**
 * The template for displaying single posts
 *
 * @package Admiral
 */
?>

	<header class="page-header clearfix">
			
		<h2 class="page-title"><?php echo get_the_category_list(', '); ?></h2>
		
	</header>
	
	<?php admiral_breadcrumbs(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php admiral_post_image_single(); ?>
		
		<header class="entry-header">
			
			<?php admiral_entry_meta(); ?>
			
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
			<?php admiral_posted_by(); ?>

		</header><!-- .entry-header -->
		
		<div class="entry-content clearfix">
			<?php the_content(); ?>
			<!-- <?php trackback_rdf(); ?> -->
			<div class="page-links"><?php wp_link_pages(); ?></div>
		</div><!-- .entry-content -->
		
		<footer class="entry-footer">
			
			<?php admiral_entry_tags(); ?>
			<?php admiral_post_navigation(); ?>
			
		</footer><!-- .entry-footer -->

	</article>