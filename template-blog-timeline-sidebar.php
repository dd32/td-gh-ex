<?php
	/**
	* Template Name: Blog Timeline Sidebar
	*/
	get_header();
	$page_sidebar 		= get_post_meta($post->ID,'themeofwp_sidebar',true); 
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
			
				<!--/#post -->
				<div>
					
					<!--/.timeline -->
					<ul class="timeline">
				
						<!-- loop post start -->
						<?php 
						global $post; $more; $more = 0;
						$args = array('post_type' => 'post', 'paged' => $paged ); query_posts($args);
						$loop = new WP_Query( $args );
						$count = 0;
						if (have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); $count++; 
						
						$format = get_post_format();
						if ( false === $format ) {
							$format = 'pencil';
						}
						
						if ( video === $format ) {
							$format = 'film';
						}
						
						if ( audio === $format ) {
							$format = 'music';
						}
						
						if ( image === $format ) {
							$format = 'picture';
						}
						
						if ( gallery === $format ) {
							$format = 'camera';
						}
						?>
				
						<li id="post-<?php the_ID(); ?>" class="<?php if ($count % 2 == 0) { echo 'timeline-inverted'; } ?>">
						
							<!--/.timeline-badge -->
							<div class="timeline-badge">
								<i class="glyphicon glyphicon-<?php echo $format;?>"></i>
							</div>
							<!--/.timeline-badge -->
							  
							<!--/.timeline-panel -->
							<div class="timeline-panel">
													
								<!--/.timeline-heading -->
								<div class="timeline-heading">
									
									<!--/.timeline-title -->
									<h4 class="timeline-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
										<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
											<sup class="featured-post"><?php _e( 'Sticky', themeofwp ) ?></sup>
										<?php } ?>
									</h4>
									<!--/.timeline-title -->
									
								</div>
								<!--/.timeline-heading -->
							
								<!--/.timeline-body -->
								<div class="timeline-body">
									
									<!--/.timeline-meta -->
									<div class="row" style="padding:10px 0">
										<div class="col-md-6 text-muted text-left">
											<i class="fa fa-clock-o"></i> <?php echo get_the_date('d'); ?>.<?php echo get_the_date('m'); ?>.<?php echo get_the_date('Y'); ?></div>
										<div class="col-md-6 text-right"><i class="fa fa-comments"></i> <?php comments_popup_link('0', '1', ' % '); ?></div>
									</div>
									<!--/.timeline-meta -->
									
									<p><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', themeofwp ) ); ?></p>
								</div>
								<!--/.timeline-body -->
								
							</div>
							<!--/.timeline-panel -->
							
						</li>

						<?php endwhile; endif;//end of The Loop ?>
						
					</ul>
					<!--/.timeline -->
					
				</div>
				<!--/#post -->

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