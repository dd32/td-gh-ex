<?php get_header(); ?>
<?php get_template_part('index', 'banner'); ?>
<!-- Blog & Sidebar Section -->
<<div class="container">
	<div class="row blog_sidebar_section">
		<!--Blog-->
		<div class="<?php corpbiz_post_layout_class(); ?>" >
			<?php 	
			while(have_posts()):the_post();
				global $more;
				$more = 0;
			?>			
			<?php get_template_part('content','');	?>
			<?php endwhile ?>
			<?php corpbiz_post_link(); ?>		
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>	
<?php get_footer(); ?>