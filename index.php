<?php
get_header();
get_template_part('index', 'banner');
?>
<!-- Blog Full Width Section -->
<div class="blog-section">
	<div class="container">
		<div class="row">
		
			<!--Blog Area-->
					<div class="<?php elegance_post_layout_class(); ?>" >
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'post','paged'=>$paged);		
					$post_type_data = new WP_Query( $args );
					while($post_type_data->have_posts()){
					$post_type_data->the_post();
					global $more;
					$more = 0;
					?>
					<?php get_template_part('content',''); ?>
					<?php }	?>
					<div class="blog-pagination">
					<?php previous_posts_link( __('Previous','elegance') ); ?>
					<?php next_posts_link( __('Next','elegance') ); ?>
					</div>
				
			</div>
			<!--/Blog Area-->
			<?php get_sidebar(); ?>
		</div>	
	</div>
</div>
<?php get_footer(); ?>
<!-- /Blog Full Width Section -->