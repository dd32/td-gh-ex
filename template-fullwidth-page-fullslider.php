<?php
	/**
	* Template Name: Fullwidth Page + Slider
	*/
	get_header();
	$page_layout_style 	= get_post_meta($post->ID,'themeofwp_layout_style',true); 
	$theme_layout 		= themeofwp_option(''.$shortname.'_theme_layout');
?>

<div id="fullwidth" style="margin: 0; padding: 0;">
<?php if ( have_posts() ) { ?>
<?php while ( have_posts() ) { the_post(); ?>
	
	<?php 
	global $post;
	$ID = $post->ID;
	$slider_shortcode = get_post_meta($ID, 'themeofwp_shortcode', true);
	echo do_shortcode( $slider_shortcode );
	?>
<?php } ?>
<?php } else { ?>
<?php } ?>
</div>

<!--/.theme-layout-start-->
<?php echo themeofwp_layout() ;?>

	<!--/#page-->
	<section id="page">
		
		<!--/.container -->
		<div class="<?php if ( $page_layout_style=='boxed' ) : ?>container-fluid<?php endif; ?><?php if ( $page_layout_style=='fullwidth' ) : ?>container<?php endif; ?><?php if($theme_layout=='boxed' && $page_layout_style==''){ ?>container-fluid<?php } ?><?php if($theme_layout=='fullwidth' && $page_layout_style==''){ ?>container<?php } ?>">
		
			<!--/.row -->
			<div class="row">
	       
				<!--/#content-->
				<div id="content" class="site-content col-md-12" role="main">
					
					<?php while ( have_posts() ) { the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit - ', 'avien-light' ), '<small class="edit-link">', '</small><div class="clearfix"></div>' ); ?>
						<?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php } ?>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php themeofwp_link_pages(); ?>
						</div>
					</article>
					
					<?php comments_page(); ?>
					
					<?php } ?>
					
				</div>
				<!--/#content-->

			</div><!--/.row -->
		
		</div><!--/.container -->
	
	</section><!--/#page-->
	
</div><!--/.theme-layout-end-->

<?php get_footer();