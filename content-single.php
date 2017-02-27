<?php
/**
 * @package HowlThemes
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="text">', '</h1>' ); ?>

		<div class="entry-meta">
			<div class="postdcp"><?php drag_themes_posted_on(); ?></div>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php
   if(get_theme_mod('aqueduct_featured_toggle', false)){
		 if ( get_the_post_thumbnail() != '' ) {
	   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
	   $source_image_url = get_the_post_thumbnail_url($post->ID, 'aqueduct-xlarge');
	    echo '<img src="';
	    echo $source_image_url;
	    echo '" alt="';the_title();
	    echo '" />';
	     echo '</a>';
	     }
	 }
	 ?>
	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'aqueduct' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php drag_themes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
