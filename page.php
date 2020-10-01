<?php get_header();
$page_header = absint(get_theme_mod( 'page_header', 1 ));
$class = '';  
if ( $page_header == 1 ) {
	get_template_part('breadcrums'); 
} else {
	$class = 'no-page-header';
} ?>
<div class="container">
	<div class="row enigma_blog_wrapper  <?php echo esc_attr($class); ?>">
		<div class="col-md-8">
			<?php get_template_part('template-parts/post','page'); ?>	
		</div>
		<?php get_sidebar(); ?>	
	</div>
</div>	
<?php get_footer(); ?>