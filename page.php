<?php get_header();
$class            = '';  
if ( get_theme_mod( 'breadcrumb', 1 ) == 1 ) {
	get_template_part('breadcrums'); 
} else {
	$class = 'no-breadcrumb';
} ?>
<div class="container">
	<div class="row enigma_blog_wrapper">
		<div class="col-md-8">
			<?php get_template_part('post','page'); ?>	
		</div>
		<?php get_sidebar(); ?>	
	</div>
</div>	
<?php get_footer(); ?>