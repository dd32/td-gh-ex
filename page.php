<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<!-- post -->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
			<div class="post-text">
<?php
$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
if ($children) { ?>
	<div id="submenu">
		<ul>
			<?php echo $children; ?>
		</ul>
	</div>
<?php } ?> 	
				<div class="post-title">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</div>
				<?php the_content('<p><b>Continue Reading &raquo;</b></p>'); ?>
			</div>
			<div class="post-foot">
				<?php edit_post_link('Edit Post', '<span class="alignright">', '</span>'); ?>
			</div>
			<?php comments_template(); ?>
		</div>
		<div class="sep"></div>
		<!--/post -->

	<?php endwhile; ?>

<?php else : ?>

		<div class="post">
			<div class="post-title"><h1>Not Found</h1></div>
			<p>Sorry, but you are looking for something that isn't here.</p>
		</div>
		
<?php endif; ?>

<?php get_footer(); ?>