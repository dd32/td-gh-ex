<?php
/**
 * @package bhost
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<footer class="entry-footer">
		<?php bhost_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bhost' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

<!-- About the Author -->
<div class="about-author">
	<div class="author_image">
		<?php echo get_avatar( get_the_author_meta('email') , 120 ); ?>
	</div>
	<div class="author_info">
		<h4><?php printf(__('Written By' , 'bhost')); ?> <?php the_author(); ?></h4>
		<p><?php echo get_the_author_meta('description');?></p>		
	</div>
</div>