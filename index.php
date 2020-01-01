<?php get_header();
$wl_theme_options = weblizar_get_options();
$class = '';
if($wl_theme_options['breadcrumb']!='') { 
	get_template_part('breadcrums'); 
} else {
	$class = 'no-breadcrumb';
} ?>
<div class="container">	
	<div class="row enigma_blog_wrapper <?php echo esc_attr( $class ); ?>">
		<div class="col-md-8">
			<?php if ( have_posts()): 
				while ( have_posts() ): the_post(); ?>	
					<?php get_template_part('post','content'); ?>	
				<?php endwhile; 
			endif; ?>
			<div class="text-center wl-theme-pagination">
		        <?php echo esc_html( the_posts_pagination( array( 'mid_size' => 2 ) ) ); ?>
		        <div class="clearfix"></div>
		    </div>
		</div>
		<?php get_sidebar(); ?>
	</div>	
</div>
<?php 
get_footer();