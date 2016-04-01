<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package attirant
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 col-md-12 col-sm-12 col-xs-12'); ?>>
	<div class="blog-entry-title col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>	
		</div>
		<div class="featured-thumb col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<?php if (get_post_format() != "" ): ?>
				<div class="post-format">
				<?php
					echo get_post_format();
				?>
				</div>
			<?php 
				endif; 	
			?>
	<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('attirant-blog-thumb'); ?></a>
		<?php else: ?>	
	<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri()."/images/dthumb.jpg" ); ?>"></a>
<?php endif; ?>
		</div>
</article>