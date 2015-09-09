<!-- Small Thumbs -->
<div class="small-thumbs">

		<div class="entry clearfix">

			<!-- Entry Title -->
			<div class="entry-title">
				<h2><?php the_title(); ?></h2>
			</div><!-- .entry-title end -->
			
			<!-- Entry Meta -->
			<ul class="entry-meta clearfix">
				<li><i class="fa fa-calendar"></i> <?php the_time('m, Y'); ?></li>
				<li><a href="<?php the_author_link(); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a></li>
				<li><i class="fa fa-folder-open"></i> <?php echo get_the_category_list(', '); ?></li>
				<li><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i> <?php echo Agama::comments_count(); ?></a></li>
				<li><a href="<?php the_permalink(); ?>"><?php echo Agama::post_format(); ?></a></li>
			</ul><!--.entry-meta-->

			<!-- Entry Content -->
			<div class="entry-content notopmargin">
				
				<?php if( has_post_thumbnail() ): ?>
				<!-- Entry Image -->
				<div class="entry-image alignleft">
					<a href="<?php echo agama_return_image_src('post-thumbnail'); ?>">
						<img class="image_fade img-responsive image-grow" src="<?php echo agama_return_image_src('agama-blog-small'); ?>" alt="<?php the_title(); ?>">
					</a>
				</div><!--.entry-image-->
				<?php endif; ?>

				<?php the_content(); ?>

				<!-- Tag Cloud -->
				<div class="tagcloud clearfix bottommargin">
					<?php the_tags(); ?>
					<!--
					<a href="#">general</a>
					<a href="#">information</a>
					<a href="#">media</a>
					<a href="#">press</a>
					<a href="#">gallery</a>
					<a href="#">illustration</a>
					-->
				</div><!-- .tagcloud end -->

				<div class="clear"></div>

			</div>
			
			<!-- Content Footer -->
			<footer class="entry-meta">
				
				<?php edit_post_link( __( '<i class="fa fa-edit"></i> Edit', 'agama' ), '<span class="edit-link">', '</span>' ); ?>
				
				<?php Agama::about_author(); ?>
				
			</footer><!-- .entry-meta -->
			
		</div><!--.entry-->
		
</div><!--.small-thumbs-->