<?php get_header(); ?>	
<div id="wrapper">
<div class="container_16 containermargin">
	
		<!-- Category Drop Down -->
		<div id="selectcattag" class="grid_16">
			<div class="selectwrap">
				<form action="<?php echo home_url(); ?>/" method="get">
					<div>
							<?php $optionnone = __('Categories', 'minimum-minimal'); 
							$select = wp_dropdown_categories('show_option_none='.$optionnone.'&class=selecttarget&show_count=1&orderby=name&echo=0'); $select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select); echo $select; ?>
				<noscript><div><input type="submit" value="View" /></div></noscript>
					</div>
				</form>
			</div>
	
			<div class="selectwrap"><?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'shopselect1', 'menu_class' => 'shopselect', 'theme_location' => 'shopselect1', 'depth' => -1 ) ); ?></div>

			<div style="clear:both;"></div>
			<header class="archiveheader">						
				<?php if ( is_day() ) : ?>
					<h1 class="archive-title"><?php printf( get_the_date() ); ?></h1>
					<?php elseif ( is_month() ) : ?>
					<h1 class="archive-title"><?php printf( get_the_date('F Y') ); ?></h1>
					<?php elseif ( is_year() ) : ?>
					<h1 class="archive-title"><?php printf( get_the_date('Y') ); ?></h1>
				<?php endif; ?>
			</header>
		</div><!-- .selecttagcat -->
		<?php get_sidebar ( 'top' ); ?>
	</div>

	<div id="contentcontainer" class="container_16 containermargin postlistcontainer">
		<div class="grid_16"  >		
							
		 	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
					<?php get_template_part( 'loop', get_post_format() ); ?>
			<?php endwhile; else : ?>
		
			<article class="boxes box-standard">
				<header>
					<h1 class="entry-title"><?php _e( 'Sorry, nothing was found!', 'minimum-minimal' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'Nothing matched your search criteria. Please try searching again with some different keywords.', 'minimum-minimal' ); ?></p>
					<?php get_search_form(); ?>	
					<div style="clear:both;"></div>
				</div><!-- .entry-content -->
			</article>			
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