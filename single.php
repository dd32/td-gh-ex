<?php get_header(); ?>   
<div class="main-tag">
	<div class="main">
			<div class="content">
				<?php if(have_posts()) : ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
				<?php while(have_posts()) : the_post(); ?>
				<div class="post-main"> 
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php the_date(); ?></span></h1>
					<div class="post">
						<?php the_content(); ?> <hr />
						<?php wp_link_pages(); ?>
							<div class="categories"><div class="tagi"><?php the_tags(); ?></div>	<?php _e( 'Categories ', 'alanding-lite' ); ?> <?php the_category(' '); ?></div>
							<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'alanding-lite' ) . '</span> %title' ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'alanding-lite' ) . '</span>' ); ?></span>
						<?php comments_template(); ?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>