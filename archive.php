<?php
	get_header();
	$page_layout_style 	= get_post_meta($post->ID,'themeofwp_layout_style',true); 
	$theme_layout 		= themeofwp_option(''.$shortname.'_theme_layout');
	
	$col= 'col-md-12';
	if ( themeofwp_option(''.$shortname.'_blog_sidebar')=='left' || themeofwp_option(''.$shortname.'_blog_sidebar')=='right'  ) {
		$col = 'col-md-9';
	}
?>

<!--/.theme-layout-start-->
<?php echo themeofwp_layout() ;?>

	<!--/.container -->
	<div class="<?php if ( $page_layout_style=='boxed' ) : ?>container-fluid<?php endif; ?><?php if ( $page_layout_style=='fullwidth' ) : ?>container<?php endif; ?><?php if($theme_layout=='boxed' && $page_layout_style==''){ ?>container-fluid<?php } ?><?php if($theme_layout=='fullwidth' && $page_layout_style==''){ ?>container<?php } ?>">
	
		<!--/.row -->
		<div class="row">
		
			<!-- sidebar left -->
			<?php if(themeofwp_option(''.$shortname.'_blog_sidebar')=='left'){ ?>
			<?php get_sidebar(); ?>
			<?php } ?>
			<!-- sidebar left -->
			
			<!-- #content -->
			<div id="content" class="site-content <?php echo $col; ?>" role="main">

				<!-- query posts -->
				<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) { the_post(); ?>
				<?php get_template_part( 'inc/post-templates/content', get_post_format() ); ?>
				<?php } ?>
				<!-- query posts -->

				<!-- pagination -->
				<?php echo themeofwp_pagination(); ?>
				<!-- pagination -->

				<?php } else { ?>
				<?php get_template_part( 'inc/post-templates/content', 'none' ); ?>
				<?php } ?>

			</div>
			<!-- #content -->
			
			<!-- sidebar right -->
			<?php if(themeofwp_option(''.$shortname.'_blog_sidebar')=='right'){ ?>
			<?php get_sidebar(); ?>
			<?php } ?>
			<!-- sidebar right -->
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->

<?php get_footer();