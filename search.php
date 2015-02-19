<?php get_header(); ?>	
<div id="wrapper">
<div class="container_16 containermargin">
	
		<?php get_template_part( 'dropdowns' ); ?>
		<?php get_sidebar ( 'top' ); ?>
	</div>


	<div id="contentcontainer" class="container_16 containermargin postlistcontainer">
		<div class="grid_16">		
							
		 	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
					<?php get_template_part( 'loop', get_post_format() ); ?>
			<?php endwhile; else : ?>
		
			
				<header class="archiveheader">
					<h1 class="entry-title archive-title"><?php _e( 'Sorry, nothing was found!', 'minimum-minimal' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'Nothing matched your search criteria. Please try searching again with some different keywords.', 'minimum-minimal' ); ?></p>
					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'minimum-minimal' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php _e( 'Search for ...', 'minimum-minimal' ); ?>" value="" name="s" title="<?php _e( 'Search for:', 'minimum-minimal' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="Search" />
</form>

					<div style="clear:both;"></div>
				</div><!-- .entry-content -->

					
			<?php endif;?>

		
	
	
		</div><!-- #content -->
		
		
	<div style="clear:both;"></div>	
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<div id="nav-below" class="nav-below grid_16">
			<?php next_posts_link(__('Load More Posts', 'minimum-minimal')); ?>
			</div><!-- #nav-below -->		
		<?php endif; ?>
	
	
	
	<div style="clear:both;"></div>

		
	</div><!-- #contentcontainer -->
</div><!-- #wrapper -->
<?php get_footer(); ?>