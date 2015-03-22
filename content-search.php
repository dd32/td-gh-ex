    <section id = "site-content">
        <article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h3 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'silverquantum' ); ?></a></h3>
				<div><small class = "metadata-posted-on"><?php silverquantum_metadata_posted_on_setup(); ?></small></div>
					<div class = "small-post-thumbnail">
					<?php the_post_thumbnail('small-thumbnail'); ?>
					</div>
					<?php the_excerpt(); ?>
				<small class = "metadata-posted-in"><?php silverquantum_metadata_posted_in_setup(); ?></small>
        </article>
    </section>
<?php get_sidebar(); ?>