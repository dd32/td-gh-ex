<?php get_header(); ?>
<!-- Page Section -->
<div class="page_mycarousel">
	<div class="container page_title_col">
		<div class="row">
			<div class="hc_page_header_area">						
				<h1><?php if ( is_day() ) : ?>
					<?php  _e( "Daily Archives:", 'corpbiz' ); echo (get_the_date()); ?>
					<?php elseif ( is_month() ) : ?>
					<?php  _e( "Monthly Archives:", 'corpbiz' ); echo (get_the_date( 'F Y' )); ?>
					<?php elseif ( is_year() ) : ?>
					<?php  _e( "Yearly Archives:", 'corpbiz' );  echo (get_the_date( 'Y' )); ?>
					<?php else : ?>
					<?php _e( "Blog Archives", 'corpbiz' ); ?>
					<?php endif; ?>
				</h1>
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