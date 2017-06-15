<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<!-- post details -->
		<div class="post-meta">
			<span class="author"><?php _e( 'By', 'twentysixteen' ); ?> <?php the_author_posts_link(); ?> - </span>
			<span class="date"><?php the_time('F j, Y'); ?></span>
			<span class="comments"> - <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'twentysixteen' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'twentysixteen' )); ?></span>
		</div>	
			<!-- /post details -->
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content entry-content-home">
		
		<?php
		/* Trim Archive Excerpt */
			$content = get_the_content();
            $content = strip_tags($content);
            echo substr($content, 0, 300);
            echo '...<br />';
        ?>
        
        <!-- Add Read More Button To Inherit Parent Color Schemes -->
        
        <div class="custom-button-container">
		  <button>
		      <a class="custom-button-read-more" href="<?php the_permalink(); ?>">Read More</a>
		  </button>
		</div>
 
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
