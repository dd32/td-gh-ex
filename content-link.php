<?php
/*
# ==============================================
# content-link.php
#
# Template part for displaying link post type
# ==============================================
*/
?>

<!-- Start single post -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'masonry-entry col-md-4' ); ?>>
	<?php if( is_sticky() ) { ?> <span class="sticky-post"><i class="fa fa-paperclip"></i></span> <?php } ?>
	<div class="post-wrapper">
			
		<div class="thumb-link">
			<?php
				
				// Fetch post content
				$content = get_post_field( 'post_content', get_the_ID() );
				
				// Get content parts
				$content_parts = get_extended( $content );
				
				// Output part before <!--more--> tag
				echo '<i class="fa fa-link" ></i> ' . $content_parts['main'];
			
			?>
			<div class="post-meta-1">
				<?php akyl_post_meta( 'date' ); ?>
				<?php akyl_post_meta( 'comment' ); ?>
				<div class="clearfix"></div>
			</div>

		</div>
		
		<div class="post-content">
			<header>
				<h2 class="post-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a>
				</h2>
			</header>
			<div class="post-main">
			
				<div class="post-meta-2 tags"></div>

				<div class="post-excerpt">
					<?php 
						$content = $post->post_content;
						$pos = strpos($content, '<!--more-->');
						if ( $pos ) {
							echo mb_strimwidth($content_parts['extended'], 0, 100) . '<strong>. . .</strong>';
						}else{
							the_excerpt();
						}
					?>
				</div>

				<div class="read-more">
					<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'akyl' ); ?> <i class="fa fa-long-arrow-right"></i></a>
				</div>

			</div>
		</div>
	</div>
</article>
<!-- End single post -->