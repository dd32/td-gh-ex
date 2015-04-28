<?php get_header(); ?>
<!-- Page Section -->
<div class="page_mycarousel">
	<div class="container page_title_col">
		<div class="row">
			<?php have_posts();  ?>
				<div class="hc_page_header_area">						
					<h1><?php printf( __( 'Tag Archives: %s', 'corpbiz' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
				</div>
			
		</div>
	</div>
</div>
<!-- /Page Section -->
<!-- Blog & Sidebar Section -->
<div class="container">
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