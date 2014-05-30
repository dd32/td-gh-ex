<?php
/*
* This is the default post format.
*
* So basically this is a regular post. if you don't want to use post formats,
* you can just copy ths stuff in here and replace the post format thing in
* single.php.
*
* The other formats are SUPER basic so you can style them as you like.
*
* Again, If you want to remove post formats, just delete the post-formats
* folder and replace the function below with the contents of the "format.php" file.
*/
?>
<!-- Loop -->
<article class="thumbnail no-border-radius no-border" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<!-- Entry Thumbnail -->
	<div class="entry-thumbnail">
		<?php the_post_thumbnail( 'bnw-thumb-1170' ); ?>
	</div><!-- Entry Thumbnail -->
	
	<!-- Content -->
	<div class="caption">
		<!-- Entry Header -->
		<header class="entry-header">
			<!-- Entry Title -->
			<!--
				Title called in page/custom page. If you want show title here remove comments.
			-->
			<h3>
				<?php 
				/*
				if ( has_post_format( 'aside' )) {
				echo '<i class="fa fa-file-text-o"></i>';
				}

				elseif ( has_post_format( 'gallery' )) {
				echo '<i class="fa fa-picture-o"></i>';
				}

				elseif ( has_post_format( 'link' )) {
				echo '<i class="fa fa-link"></i>';
				}

				elseif ( has_post_format( 'image' )) {
				echo '<i class="fa fa-picture-o"></i>';
				}

				elseif ( has_post_format( 'quote' )) {
				echo '<i class="fa fa-quote-left"></i>';
				}

				elseif ( has_post_format( 'status' )) {
				echo '<i class="fa fa-rss"></i>';
				}

				elseif ( has_post_format( 'video ' )) {
				echo '<i class="fa fa-video-camera"></i>';
				}

				elseif ( has_post_format( 'audio' )) {
				echo '<i class="fa fa-music"></i>';
				}

				elseif ( has_post_format( 'chat' )) {
				echo '<i class="fa fa-comments"></i>';
				}
				else {
				echo '<i class="fa fa-file-o"></i>';
				}
				*/
				?>
		
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php //the_title(); ?>
				</a>
				
			</h3><!-- Entry Title -->
		</header><!-- /entry-header -->
		
		<!-- Entry Content -->
		<section class="entry-content clearfix" itemprop="articleBody">
			
			<?php
				// the content
				the_content();

				/*
				* Link Pages is used in case you have posts that are set to break into
				* multiple pages. You can remove this if you don't plan on doing that.
				*
				* Also, breaking content up into multiple pages is a horrible experience,
				* so don't do it. While there are SOME edge cases where this is useful, it's
				* mostly used for people to get more ad views. It's up to you but if you want
				* to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
				*
				* http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
				*
				*/
				wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bnwtheme' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				) );
			?>
			
		</section><!-- /entry-content -->
		
		<hr class="style-six">
		
		<!-- Entry Footer -->
		<footer class="entry-footer">
			<!-- Entry meta -->
			<div class="entry-meta">
			
				<!-- Time and Date -->
				<i class="fa fa-calendar"></i><?php _e( 'Posted', 'bnwtheme' ); ?> <?php the_date('j F,Y'); ?>
				<!-- /Time and Date -->
				<br>
				
				<!-- Comments Number -->
				<i class="fa fa-comments"></i><?php comments_number( __( 'No Comments', 'bnwtheme' ), __( 'One Comment', 'bnwtheme' ), _n( '% Comments', '% Comments', get_comments_number(), 'bnwtheme' ) );?>
				<!-- /Comments Number -->
				<br>
				
				<!-- Tags -->
				<i class="fa fa-tag"></i><?php the_tags( '<span class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bnwtheme' ) . '</span>',', ', '</span>' ); ?>
				<!-- /Tags -->
				<br>
				
				<!-- Category Lists -->
				<i class="fa fa-bookmark-o"></i><?php printf( '<span class="footer-category">' . __('filed under', 'bnwtheme' ) . ': %1$s</span>' , get_the_category_list(', ') ); ?>
				<!-- /Category Lists -->
				<br>
				
				<!-- Author Meta -->
				<i class="fa fa-user"></i><?php printf( __('by', 'bnwtheme' ) . ': <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
				<!-- /Author Meta -->
				
			</div><!-- /entry-meta -->
		</footer><!-- /entry-footer -->
	</div><!-- /caption -->
</article>
<!-- /Loop -->
<?php comments_template(); ?>
