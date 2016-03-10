<?php 
get_header();
get_template_part('index', 'banner'); 
if(is_home()) { echo '</div>'; }
?>
<!-- Blog & Sidebar Section -->
<section class="site-content">
	<div class="container">
		<div class="row">
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