<?php
	/**
	* Template Name: Blog Modern
	*/
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
			<div id="blog" class="site-content <?php echo $col; ?>" role="main" style="padding-top:30px;">
				
				<?php 
				$args = array('post_type' => 'post', 'paged' => $paged ); query_posts($args);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				?>
				
				<!-- loop post start -->
				<div class="col-sm-12">
				<div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
							<article class="media clearfix">
								<div class="entry-thumbnail pull-left">
									<?php 
										 if ( has_post_thumbnail()) {
										   the_post_thumbnail('home-blog-thumb', array('class' => 'img-responsive'));
										 }
									?>
									
									<?php 
										 $post_format= get_post_format();
										 if ( ! $post_format = get_post_format() ){
											$post_format = 'standard';
										}
										 if ( has_post_format( 'image' )) {
									?>
									<span class="post-format post-format-<?php echo $post_format?>">
										<i class="fa fa-image"></i>
									</span>
									<?php } ?>	
									
									<?php if ( has_post_format( 'gallery' )) { ?>
									<span class="post-format post-format-<?php echo $post_format?>">
										<i class="fa fa-picture-o"></i>
									</span>
									<?php } ?>
									
									<?php if ( has_post_format( 'standard') || !has_post_format()) { ?>
									<span class="post-format post-format-<?php echo $post_format?>">
										<i class="fa fa-thumb-tack"></i>
									</span>
									<?php } ?>
									
									<?php if ( has_post_format( 'audio' )) { ?>
									<span class="post-format post-format-<?php echo $post_format?>">
										<i class="fa fa-music"></i>
									</span>
									<?php } ?>
									
									<?php if ( has_post_format( 'video' )) { ?>
									<span class="post-format post-format-<?php echo $post_format?>">
										<i class="fa fa-film"></i>
									</span>
									<?php } ?>
									
									
								</div>
								<div class="media-body">
									<header class="entry-header">
										
										<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a></h2>
										<div class="entry-date"><?php echo get_the_date('d F Y'); ?> </div> 
									</header>

									<div class="entry-content">
										<?php 
										$excerpt_len = themeofwp_option(''.$shortname.'_excerpt_len');
										echo theme_excerpt(''.$excerpt_len.'');
										?>
										<a class="btn btn-default btn-sm" href="<?php the_permalink(); ?>">Read More</a>
									</div>

									<footer class="entry-meta">
										<?php if(themeofwp_option(''.$shortname.'_show_comments')=='1'){ ?><span class="entry-comments"><i class="fa fa-comments-o"></i> <?php comments_popup_link('0', '1', ' %'); ?></span><?php } ?>
										<?php if(themeofwp_option(''.$shortname.'_show_author')=='1'){ ?><span class="entry-author"><i class="fa fa-user"></i> <?php the_author_link(); ?></span><?php } ?>
									</footer>
								</div>
							</article>
						</div>
						</div>
				<!--/#post -->
				
				<div class="clearfix" style="margin-bottom:60px;"></div>
				
				<?php endwhile; ?>

				<?php echo themeofwp_pagination(); ?>
				
				<?php wp_reset_query(); // Reset the Query Loop?>

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