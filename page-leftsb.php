<?php //Template Name:Page With Left Sidebar
get_header(); 
$wl_theme_options = weblizar_get_options();
$class = '';
if($wl_theme_options['breadcrumb']!='') { 
	get_template_part('breadcrums');  
} else {
	$class = 'no-breadcrumb';
} ?>
<div class="container">
	<div class="row enigma_blog_wrapper <?php echo esc_attr( $class ); ?>">
		<?php get_sidebar(); ?>	
		<div class="col-md-8">
			<?php get_template_part('post','page'); ?>	
		</div>	
	</div>
</div>	
<?php get_footer(); ?>