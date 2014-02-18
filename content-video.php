<div class="post-header">

	<?php $videourl = get_post_meta($post->ID, 'videourl', true); if ( $videourl != '' ) : ?>

		<div class="featured-media">
		
			<?php if (strpos($videourl,'youtube') !== false) : ?>
			
				<?php $url = $videourl;
				preg_match(
				        '/[\\?\\&]v=([^\\?\\&]+)/',
				        $url,
				        $matches
				    );
				$id = $matches[1];
				
				$youtube_url = 'http://www.youtube.com/embed/' . $id . '?autoplay=0'; 
				printf( '<iframe width="1136" height="568" src="%s" allowfullscreen></iframe>', esc_url( $youtube_url ) ); ?>
				
			<?php elseif (strpos($videourl,'vimeo') !== false) : ?>
			
				<?php $url = $videourl;
				preg_match(
				        '/(\d+)/',
				        $url,
				        $matches
				    );
				$id = $matches[1];
				
				$vimeo_url = 'http://player.vimeo.com/video/' . $id; 
				printf( '<iframe width="1136" height="568" src="%s" allowfullscreen></iframe>', esc_url( $vimeo_url ) ); ?>
				 				
			<?php elseif (strpos($videourl,'dailymotion') !== false) : ?>
			
				<?php $url = $videourl;
				preg_match(
				        '/video\/([^_]+)/',
				        $url,
				        $matches
				    );
				$id = $matches[1];
				
				$dailymotion_url = 'http://www.dailymotion.com/embed/video/' . $id; 
				printf( '<iframe width="1136" height="568" src="%s" allowfullscreen></iframe>', esc_url( $dailymotion_url ) ); ?>
				 				
			<?php elseif (strpos($videourl,'kickstarter') !== false) : ?>
			
				<?php $url = $videourl;
				preg_match(
				        '/projects\/([^?]+)/',
				        $url,
				        $matches
				    );
				$id = $matches[1];
				
				$kickstarter_url = 'http://www.kickstarter.com/projects/' . $id . '/widget/video.html'; 
				printf( '<iframe width="1136" height="568" src="%s" allowfullscreen></iframe>', esc_url( $kickstarter_url ) ); ?>
														
			<?php elseif (strpos($videourl,'.mp4') !== false) : ?>
				
				<video controls>
				
					<source src="<?php echo $videourl ?>" type="video/mp4">
					<?php _e('Your browser does not support the video tag.', 'hemingway'); ?>
					
				</video>
					
			<?php endif; ?>
			
		</div>
	
	<?php endif; ?>
	
    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    
    <div class="post-meta">
	
		<span class="post-date"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_time(get_option('date_format')); ?></a></span>
		
		<span class="date-sep"> / </span>
			
		<span class="post-author"><?php the_author_posts_link(); ?></span>
		
		<span class="date-sep"> / </span>
		
		<?php comments_popup_link( '<span class="comment">' . __( '0 Comments', 'hemingway' ) . '</span>', __( '1 Comment', 'hemingway' ), __( '% Comments', 'hemingway' ) ); ?>
		
		<?php if( is_sticky() && !has_post_thumbnail() ) { ?> 
		
			<span class="date-sep"> / </span>
		
			<?php _e('Sticky', 'hemingway'); ?>
		
		<?php } ?>
		
		<?php if ( current_user_can( 'manage_options' ) ) { ?>
		
			<span class="date-sep"> / </span>
						
			<?php edit_post_link(__('Edit', 'hemingway')); ?>
		
		<?php } ?>
								
	</div>
    
</div> <!-- /post-header -->
									                                    	    
<div class="post-content">
	    		            			            	                                                                                            
	<?php the_content(); ?>
			
	<?php wp_link_pages(); ?>
				        
</div> <!-- /post-content -->
            
<div class="clear"></div>