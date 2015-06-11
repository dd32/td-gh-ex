<?php get_header(); ?>                          
<div class="main-tag">
<div class="block1">
		<div class="block1-center">
				<center><h1><?php _e('Search Results for: ') ?><?php echo get_search_query(); ?></h1>  </center>
			<div class="content">
				<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
				<div class="post-main"> 
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span>(<?php the_date_xml(); ?>)</span></h1>
					<div class="post">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<?php the_excerpt(); ?>
					</div>
				</div> 
				<?php endwhile; ?>
				<div class="nav">
					<?php posts_nav_link(); ?>
				</div>
				<?php else : ?>
				<div class="post-main"> 
					<h1>No found.</h1>
				</div> 		
				<?php endif; ?>
			</div>
		</div>
</div>
	</div>
<?php get_footer(); ?>