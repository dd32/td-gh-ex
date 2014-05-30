<!-- Loop -->
<article class="thumbnail no-border-radius no-border" id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
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
			<?php if (is_search()) : ?>
				<?php // For Search Post  ?>
				<?php the_excerpt('25'); ?>
			<?php endif; ?>
			
			<?php if (is_front_page()) : ?>
				<?php // For Front Page Post  ?>
				<?php the_excerpt('25'); ?>
			<?php endif; ?>
			
			<?php if (is_home()) : ?>
				<?php // For Home Post  ?>
				<?php the_excerpt('25'); ?>
			<?php endif; ?>
			
			<?php if (is_post_type_archive()) : ?>
				<?php // For Archives Post  ?>
				<?php the_excerpt('25'); ?>
			<?php endif; ?>
			
			<?php if (is_single()) : ?>
				<?php // For Single  ?>
				<?php the_content(); ?>
			<?php endif; ?>
			
			<?php if (is_page()) : ?>
				<?php // For Page  ?>
				<?php the_content(); ?>
			<?php endif; ?>
			
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
