<?php 
	get_header(); 
	$page_layout_style 	= get_post_meta($post->ID,'themeofwp_layout_style',true); 
	$theme_layout 		= themeofwp_option(''.$shortname.'_theme_layout');
?>

	<!-- #content -->
	<div id="content" class="site-content" role="main">
		
		<!--/#error-->
		<div class="<?php if ( $page_layout_style=='boxed' ) : ?>container-fluid<?php endif; ?><?php if ( $page_layout_style=='fullwidth' ) : ?>container<?php endif; ?><?php if($theme_layout=='boxed' && $page_layout_style==''){ ?>container-fluid<?php } ?><?php if($theme_layout=='fullwidth' && $page_layout_style==''){ ?>container<?php } ?>">
			<h1>4<i class="fa fa-ban"></i>4</h1>
			<h2><?php _e( 'Page not found', 'themeofwp' );?></h2>
			<p><?php _e( 'The Page you are looking for doesn\'t exist or an other error occurred!', 'themeofwp' );?> </p>
			<a class="btn btn-default" href="<?php echo home_url(); ?>"><?php _e( 'Go back to the homepage', 'themeofwp' );?></a>
		</div>
		<!--/#error-->
		
	</div>
	<!-- #content -->

<?php get_footer();