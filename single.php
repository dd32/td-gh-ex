<?php get_header(); ?>

<div class="content">
											        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php $post_format = get_post_format(); ?>
			
			<?php if ( $post_format == 'video' ) : ?>
			
				<?php $video_url = get_post_meta($post->ID, 'video_url', true); if ( $video_url != '' ) : ?>
				
					<div class="featured-media">
					
						<?php if (strpos($video_url,'.mp4') !== false) : ?>
							
							<video controls>
							  <source src="<?php echo $video_url; ?>" type="video/mp4">
							</video>
																					
						<?php else : ?>
							
							<?php 
							
								$embed_code = wp_oembed_get($video_url); 
								
								echo $embed_code;
								
							?>
								
						<?php endif; ?>
						
					</div>
				
				<?php endif; ?>
				
			<?php elseif ( $post_format == 'gallery' ) : ?>
			
				<div class="featured-media">	
	
					<?php hoffman_flexslider('post-image'); ?>
					
				</div> <!-- /featured-media -->
				
			<?php elseif ( $post_format == 'quote' ) : ?>
			
				<?php $quote_content = get_post_meta($post->ID, 'quote_content', true); ?>
				<?php $quote_attribution = get_post_meta($post->ID, 'quote_attribution', true); ?>
					
				<div class="post-quote">
				
					<div class="section-inner thin">
						
						<blockquote><?php echo $quote_content; ?></blockquote>
					
						<?php if ( $quote_attribution != '' ) : ?>
						
							<cite><?php echo $quote_attribution; ?></cite>
						
						<?php endif; ?>
					
					</div> <!-- /section-inner -->
				
				</div> <!-- /post-quote -->
			
			<?php elseif ( has_post_thumbnail() ) : ?>
					
				<div class="featured-media">
		
					<?php the_post_thumbnail('post-image'); ?>
					
					<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
											
						<p class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
						
					<?php endif; ?>
					
				</div> <!-- /featured-media -->
					
			<?php endif; ?>
			
			<div class="post-inner section-inner thin">
				
				<div class="post-header">
													
					<p class="post-meta top">
					
						<a href="<?php the_permalink(); ?>" title="<?php the_time('h:i'); ?>"><?php the_time(get_option('date_format')); ?></a>
						
						<?php 
							if ( comments_open() ) {
								echo '<span class="sep">/</span> '; 
								comments_popup_link( __( '0 Comments', 'hoffman' ), __( '1 Comment', 'hoffman' ), __( '% Comments', 'hoffman' ) );
							}
						?> 
						
						<?php edit_post_link( __('Edit','hoffman'), '<span class="sep">/</span> ', ''); ?>
						
					</p>
											
					<h2 class="post-title"><?php the_title(); ?></h2>
															
				</div> <!-- /post-header -->
				    
			    <div class="post-content">
			    
			    	<?php the_content(); ?>
			    	
			    	<?php 
				    	$args = array(
							'before'           => '<div class="clear"></div><p class="page-links"><span class="title">' . __( 'Pages:','hoffman' ) . '</span>',
							'after'            => '</p>',
							'link_before'      => '<span>',
							'link_after'       => '</span>',
							'separator'        => '',
							'pagelink'         => '%',
							'echo'             => 1
						);
			    	
			    		wp_link_pages($args); 
			    	?>
			    
			    </div> <!-- /post-content -->
			    
			    <div class="clear"></div>
			
			</div> <!-- /post-inner -->
													                                    	        	        
		</div> <!-- /post -->
				
		<div class="tab-selector">
		
			<div class="section-inner thin">
			
				<ul>
				
					<li>
						<a class="active tab-comments" href="#">
							<div class="genericon genericon-comment"></div>
							<span><?php _e('Comments','hoffman'); ?></span>
						</a>
					</li>
					<li>
						<a class="tab-post-meta" href="#">
							<div class="genericon genericon-summary"></div>
							<span><?php _e('Post info','hoffman'); ?></span>
						</a>
					</li>
					<li>
						<a class="tab-author-meta" href="#">
							<div class="genericon genericon-user"></div>
							<span><?php _e('Author info','hoffman'); ?></span>
						</a>
					</li>
					
					<div class="clear"></div>
					
				</ul>
			
			</div>
		
		</div> <!-- /tab-selector -->
		
		<div class="section-inner thin post-meta-tabs">
			
			<div class="tab-post-meta tab">
			
				<div class="post-meta-items two-thirds">
			
					<div class="post-meta-item post-meta-author">
						<div class="genericon genericon-user"></div>
						<?php the_author_posts_link(); ?>
					</div>
					
					<div class="post-meta-item post-meta-date">
						<div class="genericon genericon-time"></div>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_time(get_option('date_format')); ?> <?php the_time(get_option('time_format')); ?></a>
					</div>
								
					<div class="post-meta-item post-meta-categories">
						<div class="genericon genericon-category"></div>
						<?php the_category(', '); ?>
					</div>
						
					<?php if( has_tag()) { ?>
						<div class="post-meta-item post-meta-tags">
							<div class="genericon genericon-tag"></div>
							<?php the_tags('', ', '); ?>
						</div>
					<?php } ?>
				
				</div>
				
				<div class="post-nav one-third">
				
					<?php
						$prev_post = get_previous_post();
						$next_post = get_next_post();
					?>
					
					<?php
					if (!empty( $next_post )): ?>
						
						<a class="post-nav-newer" title="<?php _e('Next post:', 'hoffman'); echo ' ' . get_the_title($next_post); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">
							<p><?php _e('Next post','hoffman'); ?></p>
							<h5><?php echo get_the_title($next_post); ?></h5>
						</a>
				
					<?php endif;
					
					if (!empty( $prev_post ) && !empty( $next_post )) echo '<hr>';
													
					if (!empty( $prev_post )): ?>
					
						<a class="post-nav-older" title="<?php _e('Previous post:', 'hoffman'); echo ' ' . get_the_title($prev_post); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">
							<p><?php _e('Previous post','hoffman'); ?></p>
							<h5><?php echo get_the_title($prev_post); ?></h5>
						</a>
				
					<?php endif; ?>
																					
				</div> <!-- /post-nav -->
				
				<div class="clear"></div>
				
			</div> <!-- /post-meta-tab -->
			
			<div class="tab-author-meta tab">
			
				<div class="author-meta-aside">
			
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'email' ), '256' ); ?></a>					
				</div> <!-- /author-meta-left -->
			
				<div class="author-meta-inner">
			
					<h3 class="author-name"><?php the_author_posts_link(); ?></h3>
					
					<p class="author-position">
				
						<?php
						
							echo 'Administrator';
						
							/*
							$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
							
							$user_roles = $curauth->roles;
							$user_role = array_shift($user_roles);
							
							if ($user_role == 'administrator') {
								_e('Administrator','hoffman');
							} elseif ($user_role == 'editor') {
								_e('Editor','hoffman');
							} elseif ($user_role == 'author') {
								_e('Author','hoffman');
							} elseif ($user_role == 'contributor') {
								_e('Contributor','hoffman');
							} elseif ($user_role == 'subscriber') {
								_e('Subscriber','hoffman');
							} else {
								echo $user_role ;
							}
							*/
						?>
						
					</h4>
					
					<?php $author_meta_description = get_the_author_meta('description'); ?>
					
					<?php if ( ! empty( $author_meta_description ) ) : ?>
						<p class="author-description">
							<?php the_author_meta('description'); ?>
						</p>
					<?php endif; ?>
					
					<div class="author-meta-social">
													
						<?php 
						$author_url = get_the_author_meta('user_url'); 
						if ( !empty($author_url) ) : ?>
							<a class="author-link-url" href="<?php echo $author_url ?>">
								<div class="genericon genericon-website"></div>
							</a>
						<?php endif; ?>
							
						<?php 
						$author_dribbble = get_the_author_meta('dribbble'); 
						if ( !empty($author_dribbble) ) : ?>
							<a class="author-link-dribbble" href="<?php echo $author_dribbble ?>">
								<div class="genericon genericon-dribbble"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_facebook = get_the_author_meta('facebook'); 
						if ( !empty($author_facebook) ) : ?>
							<a class="author-link-facebook" href="<?php echo $author_facebook ?>">
								<div class="genericon genericon-facebook-alt"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_flickr = get_the_author_meta('flickr'); 
						if ( !empty($author_flickr) ) : ?>
							<a class="author-link-flickr" href="<?php echo $author_flickr ?>">
								<div class="genericon genericon-flickr"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_googleplus = get_the_author_meta('googleplus'); 
						if ( !empty($author_googleplus) ) : ?>
							<a class="author-link-googleplus" href="<?php echo $author_googleplus ?>">
								<div class="genericon genericon-googleplus"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_linkedin = get_the_author_meta('linkedin'); 
						if ( !empty($author_linkedin) ) : ?>
							<a class="author-link-linkedin" href="<?php echo $author_linkedin ?>">
								<div class="genericon genericon-linkedin"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_instagram = get_the_author_meta('instagram'); 
						if ( !empty($author_instagram) ) : ?>
							<a class="author-link-instagram" href="<?php echo $author_instagram ?>">
								<div class="genericon genericon-instagram"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_pinterest = get_the_author_meta('pinterest'); 
						if ( !empty($author_pinterest) ) : ?>
							<a class="author-link-pinterest" href="<?php echo $author_pinterest ?>">
								<div class="genericon genericon-pinterest"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_skype = get_the_author_meta('skype'); 
						if ( !empty($author_skype) ) : ?>
							<a class="author-link-skype" href="<?php echo $author_skype ?>">
								<div class="genericon genericon-skype"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_tumblr = get_the_author_meta('tumblr'); 
						if ( !empty($author_tumblr) ) : ?>
							<a class="author-link-tumblr" href="<?php echo $author_tumblr ?>">
								<div class="genericon genericon-tumblr"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_twitter = get_the_author_meta('twitter'); 
						if ( !empty($author_twitter) ) : ?>
							<a class="author-link-twitter" href="<?php echo $author_twitter ?>">
								<div class="genericon genericon-twitter"></div>
							</a>
						<?php endif; ?>
						
						<?php 
						$author_vimeo = get_the_author_meta('vimeo'); 
						if ( !empty($author_vimeo) ) : ?>
							<a class="author-link-vimeo" href="<?php echo $author_vimeo ?>">
								<div class="genericon genericon-vimeo"></div>
							</a>
						<?php endif; ?>
						
						<div class="clear"></div>
					
					</div> <!-- /author-meta-social -->
				
				</div> <!-- /author-meta-inner -->
			
			</div> <!-- /tab-author-meta -->
			
			<div class="tab-comments tab">
							
				<?php comments_template( '', true ); ?>
				
			</div> <!-- /tab-comments -->
					
		</div> <!-- /section-inner -->
									                        
   	<?php endwhile; else: ?>

		<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "hoffman"); ?></p>
	
	<?php endif; ?>    

</div> <!-- /content -->
		
<?php get_footer(); ?>