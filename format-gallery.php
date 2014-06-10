<article <?php post_class('h-entry clearfix'); ?> id="post-<?php the_ID(); ?>">
										
	<header class="entry-header">
											
		<h3 class="entry-title"><?php the_title(); ?></h3>

			<div class="entry-meta">
												
				<span class="dt-published"><?php the_date(); ?></span>

				<span class="sep">|</span>

				<span class="u-category"><?php the_category(' - '); ?></span>																							

				<?php if(comments_open()){ ?>
				<span class="sep">|</span>	

				<span class="span-comment">
				<?php comments_number(__('No Comments', 'newsmag'),__('1 Comment', 'newsmag'),__('% Comments', 'newsmag')); ?>
				</span>	
				<?php } ?>

				<?php edit_post_link(__('Edit','newsmag')); ?>

				</div> <!-- end entry-meta -->

				</header> <!-- end entry-header -->

				<div class="entry-content">		

			
					<?php if(function_exists('get_field')){ ?>


						<?php $gallery=get_field('gallery'); ?>
					

						<div class="slider swipe">

					
	 					<?php foreach($gallery as $galleries){ ?> 
						<div class="h-entry">

							<div class="image">
								<img src="<?php echo $galleries['sizes']['thumbnail']; ?>" title="<?php echo $galleries['title']; ?>" alt="<?php echo $image['alt']; ?>">							
							</div> <!-- end image -->

							<div class="slider-title-wrap">
								
								<p class="gallery-caption"><?php echo $galleries['caption'] ?></p>
								
							</div> <!-- end slider-title-wrap -->

							
						</div> <!-- end h-entry -->
						<?php } ?>
					

						</div> <!-- end slider swipe -->


					<?php } ?>
											
				<?php the_content(); ?>

	</div> <!-- end entry-content -->
										
</article> <!-- end h-entry -->

