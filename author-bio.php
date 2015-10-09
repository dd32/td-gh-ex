<?php 
global $data, $shortname; 

if(themeofwp_option(''.$shortname.'_single_post_author')) { ?>
	
	<!-- .author-info -->
	<div class="author-info">
		
		<!-- .author-description -->
		<div class="author-description">
			
			<h2 class="author-title"><?php printf( __( 'About the %s', 'avien-light' ), get_the_author() ); ?></h2>
				
				<p class="author-bio">
			
					<!-- .author-avatar -->
					<div class="author-avatar alignleft">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themeofwp_author_bio_avatar_size', 74 ) ); ?>					
					</div>
					<!-- .author-avatar -->
					
					<div>
						<?php the_author_meta( 'description' ); ?>
						<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'avien-light' ), get_the_author() ); ?>
						</a>
					</div>
					
				</p>
		</div>
		<!-- .author-description -->
		
	</div>
	<!-- .author-info -->
	
	<div class="clearfix"></div>
	
<?php }