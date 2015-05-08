<?php
	/**
	* Template Name: Blog
	*/
	get_header();
	$page_sidebar 		= get_post_meta($post->ID,'page_sidebar',true);
	$page_layout_style 	= get_post_meta($post->ID,'themeofwp_layout_style',true); 
	$theme_layout 		= themeofwp_option(''.$shortname.'_theme_layout'); 
	
	if ( $page_sidebar=='left' || $page_sidebar=='right' || themeofwp_option(''.$shortname.'_blog_sidebar')=='left' || themeofwp_option(''.$shortname.'_blog_sidebar')=='right' || $page_sidebar=='none') {
	$col = 'col-md-9';
	}
	
	if ( $page_sidebar=='nosidebar' || themeofwp_option(''.$shortname.'_blog_sidebar')=='nosidebar') {	
	$col= 'col-md-12';
	}
?>

<!--/.theme-layout-start-->
<?php echo themeofwp_layout() ;?>

	<!--/.container -->
	<div class="<?php if ( $page_layout_style=='boxed' ) : ?>container-fluid<?php endif; ?><?php if ( $page_layout_style=='fullwidth' ) : ?>container<?php endif; ?><?php if($theme_layout=='boxed' && $page_layout_style==''){ ?>container-fluid<?php } ?><?php if($theme_layout=='fullwidth' && $page_layout_style==''){ ?>container<?php } ?>">
	
		<!--/.row -->
		<div class="row">
	
			<?php if($page_sidebar=='none' || $page_sidebar==''){ ?>
				<!-- sidebar left -->	
					<?php if(themeofwp_option(''.$shortname.'_blog_sidebar')=='left'){ ?>
						<?php get_sidebar(); ?>
					<?php } ?>
					
				<?php } else { ?>
				
					<?php if($page_sidebar=='none' || $page_sidebar=='left'){ ?>
						<?php get_sidebar(); ?>
					<?php } ?>
				<!-- sidebar left -->
			<?php } ?>
			
			<!-- #content -->
			<div id="content" class="site-content <?php echo $col; ?>" role="main">
				
				<?php 
				global $post; $more; $more = 0;
				$args = array('post_type' => 'post', 'paged' => $paged ); query_posts($args);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				?>
				
				<!-- loop post -->
				<?php get_template_part( 'inc/post-templates/content', get_post_format() ); ?>
				<!--loop post -->
				
				<?php endwhile; ?>
				
				<?php echo themeofwp_pagination(); ?>
				
				<?php wp_reset_query(); // Reset the Query Loop?>

			</div>
			<!-- #content -->
			
			<?php if($page_sidebar=='none' || $page_sidebar==''){ ?>
				<!-- sidebar right -->	
					<?php if(themeofwp_option(''.$shortname.'_blog_sidebar')=='right'){ ?>
					<?php get_sidebar(); ?>
					<?php } ?>
					
				<?php } else { ?>
				
					<?php if($page_sidebar=='none' || $page_sidebar=='right'){ ?>
						<?php get_sidebar(); ?>
					<?php } ?>
				<!-- sidebar right -->
			<?php } ?>
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->
<?php get_footer();