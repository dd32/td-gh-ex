<?php get_header();?>

<div id="main" >

	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		
			<?php if ( !is_singular() ) : ?>
					<?php get_template_part('loop'); ?>
			<?php else : ?>	
					<?php get_template_part('loop','single'); ?>
			<?php endif; ?>

		</div>
			
	<?php endwhile; else: ?>
	
		<!-- Post Not Found --> 
		<div id="not-found-wrap">
			<h2>Search Results : Nothing Found</h2>
			<p>Try a new keyword.</p>
			<form role="search" method="get" id="searchform404" action="<?php echo home_url( '/' ); ?>">
				<input type="text" id="searchinput404" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" name="s" />
				<input type="submit" id="searchsubmit404" value="Search" />
			</form>
		</div>

	<!-- End Loop -->
	<?php endif; ?>
	
	<!-- Bottom Post Navigation -->
	<?php if (!( is_singular() || is_404() )) : ?>
		<div id="bottom-navi">
			<?php if ( function_exists('wp_pagenavi') ):?>
				<?php wp_pagenavi(); ?><!-- wp-pagenavi support -->
			<?php else : ?>
				<div class="left"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
				<div class="right"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

</div> <!-- #Main End -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>