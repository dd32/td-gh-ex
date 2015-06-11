<?php get_header(); ?>   



<div class="block1">
		<div class="block1-center">
			<div class="block1-center1">
				<div class="sidebar-user2 span2">
						<br/><br/><br/><br/>
						<center><h1>ALanding lite</h1></center>
						<br/><br/><p style="text-align: justify;">
						This template will help you create a Landing Page or One Page.<br/><br/><br/>
						</p>
						<br/>
						<h3>+ Free theme</h3>
						<h3>+ 20 Sidebars</h3>
						<h3>+ Responsive web design</h3>
						<br/><br/>
						
				</div>
				<div class="sidebar-user3 span2">
					<center><br/><br/><br/><img src="<?php echo get_template_directory_uri(); ?>/images/imglpfree.png"/>
								

					</center><br/><br/><br/>
				</div>
			</div>
		</div>
</div>	
<div class="main-tag">
	<div class="main">
			<div class="content">
				<?php if(have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
				<div <?php post_class(); ?>><?php comments_template(); ?>
				<div class="post-main">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span></h1>
					<div class="post">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<?php the_content( 'Read more...' ); ?>
						<span class="entry-comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')) ?></span>
						<div class="categories"><tag><?php the_tags(); ?></tag>	Categories: <?php the_category(' '); ?></div>
					</div>
				</div> 
				</div> 
				<?php endwhile; ?>

			<?php if(function_exists('wp_pagenavi')) : ?>
			<div class="navigation"><?php wp_pagenavi(); ?></div>
			<?php else : ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_posts_link(__('&laquo; Newer')) ?></div>
		<div class="alignright"><?php next_posts_link(__('Older &raquo;')) ?></div>
	</div>	
	<?php endif; ?>
				<?php endif; ?>
			</div>

	</div>	
</div>	



<?php get_footer(); ?>