<?php get_header(); ?>
<!-- Page Section -->
<div class="container">
	<div class="row">
		<div class="hc_page_header_area">						
			<h1><?php if ( is_day() ) : ?>
				<?php  _e( "Daily Archive", 'corpbiz' ); echo (get_the_date()); ?>
				<?php elseif ( is_month() ) : ?>
				<?php  _e( "Monthly Archive", 'corpbiz' ); echo (get_the_date( 'F Y' )); ?>
				<?php elseif ( is_year() ) : ?>
				<?php  _e( "Yearly Archive", 'corpbiz' );  echo (get_the_date( 'Y' )); ?>
				<?php else : ?>
				<?php _e( "Blog Archive", 'corpbiz' ); ?>
				<?php endif; ?>
			</h1>
		</div>
	</div>
</div>
<?php if(!is_home()) { echo '</div>'; }?>
<!-- /Page Section -->
<!-- Blog & Sidebar Section -->
<section class="site-content">
	<div class="container">
		<div class="row blog_sidebar_section">
			<!--Blog-->
			<div class="<?php corpbiz_post_layout_class(); ?>" >
				<?php 
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						get_template_part( 'content','');
					endwhile;
				endif;
				?>		
				<div class="paginations">
					<?php
					// Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
					'next_text'          => '<i class="fa fa-angle-double-right"></i>',
					) );
					?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>	
<?php get_footer(); ?>