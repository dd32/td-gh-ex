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
			
				<?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit - ', 'avien-light' ), '<small class="edit-link">', '</small>' ); ?>
				
				<!-- .post -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
						
					<!-- .entry-header -->
					<header class="entry-header">
						
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<!-- query posts -->
						<?php
							$published_text = __( '<span class="attachment-meta">on <time class="entry-date" datetime="%1$s">%2$s</time> in <a href="%3$s" title="Return to %4$s" rel="gallery">%5$s</a></span>', 'avien-light' );
							$post_title = get_the_title( $post->post_parent );
							if ( empty( $post_title ) || 0 == $post->post_parent ) {
								$published_text = '<span class="attachment-meta"><time class="entry-date" datetime="%1$s">%2$s</time></span>';                  
							}

							$published_text =   sprintf( $published_text,
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_url( get_permalink( $post->post_parent ) ),
								esc_attr( strip_tags( $post_title ) ),
								$post_title
								);

							$metadata = wp_get_attachment_metadata();

							$size_link = sprintf( '<span class="attachment-meta full-size-link"><a href="%1$s" title="%2$s" rel="lightbox">%3$s (%4$s &times; %5$s)</a></span>',
								esc_url( wp_get_attachment_url() ),
								esc_attr__( 'Link to full-size image', 'avien-light' ),
								__( 'Full resolution', 'avien-light' ),
								$metadata['width'],
								$metadata['height']
								);
						?>
						<!-- query posts -->

						<!--/.entry-meta -->
						<div class="entry-meta">
							<span><i class="fa fa-clock-o"></i> <?php _e( 'on ', 'avien-light' ); ?> <?php echo $published_text; ?></span> / 
							<span><i class="fa fa-comments"></i> <?php comments_popup_link('0', '1', ' % '); ?></span> / 
							<span><i class="fa fa-picture-o"></i> <?php echo $size_link; ?></span>
						</div>
						<!--/.entry-meta -->
						
					</header>
					<!--/.entry-header -->

					<!-- .entry-content -->
					<div class="entry-content">

						<!-- .entry-attachment -->
						<div class="entry-attachment">
							
							<!-- .attachment -->
							<div class="attachment">
							
								<?php themeofwp_the_attached_image(); ?>

								<?php if ( has_excerpt() ) { ?>
								
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								
								<?php } ?>
							</div>
							<!-- .attachment -->
							
						</div>
						<!-- .entry-attachment -->

						<?php if ( ! empty( $post->post_content ) ) { ?>
						<!-- .entry-description -->
						<div class="entry-description">
							<?php the_content(); ?>
							<?php themeofwp_link_pages(); ?>
						</div>
						<!-- .entry-description -->
						<?php } ?>
						
					</div>
					<!-- .entry-content -->
					
				</article>
				<!-- #post -->

				<!--/#image-navigation -->
				<ul class="navigation image-navigation pager" role="navigation">
					<li class="previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'avien-light' ) ); ?></li>
					<li class="next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'avien-light' ) ); ?></li>
				</ul>
				<!--/#image-navigation -->

				<!-- .comments -->
				<?php comments_template(); ?>
				<!-- .comments -->

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