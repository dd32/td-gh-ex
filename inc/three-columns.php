<?php // template for display the three-column post layout
$bartleby_options = bartleby_get_theme_options(); ?>
<div class="row">
	<div id="content" class="sixteen columns">
		<?php if (have_posts()) : ?>
			<ul class="block-grid three-up mobile-one-up column-posts">
			<?php while (have_posts()) : the_post(); ?>
				<li <?php post_class('column-post-li') ?>>
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h5 class="latest-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h5>
					<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium', array ('class' => 'aligncenter bartleby-thumbnail') ); ?>
					</a>
					<?php } 
						if ( $bartleby_options['post_default_image'] != '' && !has_post_thumbnail()  ) { ?>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $bartleby_options['post_default_image']; ?>" alt="<?php the_title(); ?>"
								class="aligncenter bartleby-thumbnail" />
						</a>
					<?php } ?>
					<?php
					if ( $bartleby_options['elength'] != '0' ) { ?>
					<div class="bartleby-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<?php } ?>
					</article>
				</li>
		<?php endwhile; ?>
			</ul>
	</div>
<?php endif; ?>
	</div>