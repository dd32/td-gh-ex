<?php
/**
 * @package Atomic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
			
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
        
        <div class="entry-info">
			<?php atomic_posted_on(); ?>
		</div>
		<div class="entry-meta">
			
			<div class="meta-list">	
				<?php atomic_display_categories(); ?>
			</div>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				'Read More %s <span class="meta-nav">&rarr;</span>',
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'atomic' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="clear"></div>
	<?php
		if ( is_sticky() ) {?>
		<span class="sticky-post">
			<i class="fa fa-thumb-tack"></i>
			<?php _e( ' Sticked', 'atomic' );?>
		</span>
		<?php }
	?>
</article><!-- #post-## -->