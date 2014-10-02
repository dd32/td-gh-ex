<?php // blog-style index layout
$bartleby_options = get_option ('bartleby_options'); ?>
<div class="row">
		<div class="twelve columns" id="content">
		<?php if (have_posts()) : ?>
		<div class="column-posts">
		<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h5 class="latest-title-blog">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h5>
		
					<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium', array ('class' => 'alignleft bartleby-thumbnail') ); ?>
					</a>
					<?php } 
						if ( !has_post_thumbnail() && $bartleby_options['post_default_image'] != '' ) { ?>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $bartleby_options['post_default_image']; ?>" alt="<?php the_title(); ?>"
								class="alignleft bartleby-thumbnail" />
						</a>
					<?php } ?>
		
					<?php
						$bartleby_options = get_option( 'bartleby_options' );
						if ( $bartleby_options['elength'] != '0' ) { ?>
						<div class="bartleby-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<?php } ?>
		</article>
		<div class="bartleby-clear"></div>
		<?php endwhile;
				endif;
				?>
			</div>
		</div>
	<?php get_sidebar(); ?>
</div>