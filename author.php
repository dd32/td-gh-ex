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

				<?php if ( have_posts() ) { ?>

				<!-- .archive-header -->
				<header class="archive-header">
					<h1 class="archive-title"><?php printf( __( 'All posts by %s', 'avien-light' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>
				<!-- .archive-header -->

				<?php if ( get_the_author_meta( 'description' ) ) { ?>
				<?php get_template_part( 'author-bio' ); ?>
				<?php } ?>

				<?php while ( have_posts() ) { the_post(); ?>
				<?php get_template_part( 'inc/post-templates/content', get_post_format() ); ?>
				<?php } ?>

				<?php echo themeofwp_pagination(); ?>

				<?php } else { ?>
				<?php get_template_part( 'inc/post-templates/content', 'none' ); ?>
				<?php } ?>

			</div>
			<!--/#content -->
			
			<!-- sidebar right -->
			<?php if(themeofwp_option(''.$shortname.'_blog_sidebar')=='right'){ ?>
			<?php get_sidebar(); ?>
			<?php } ?>
			<!-- sidebar right -->
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->
<?php get_footer();