<?php get_header(); ?>
<!-- Page Section -->
<div class="container">
	<div class="row">
		<?php have_posts();  ?>
			<div class="hc_page_header_area">						
				<h1><?php printf( __( 'Tag Archive %s', 'corpbiz' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
			</div>
		
	</div>
</div>
<?php
if(!is_home()) { echo '</div>'; } ?>
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