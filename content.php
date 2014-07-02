<?php
/**
 * @package Aperture
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="date-aperture">
			<span class="month-aperture"><?php the_time('M') ?></span>
			<span class="day-aperture"><?php the_time('d') ?></span>
		</div>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php 
		$image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
		if ( has_post_thumbnail()) : ?>
			<div class="post-featured-image">
				<?php if ( has_post_format( 'image' )) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					<?php the_post_thumbnail( 'aperture-image-post-format' ); ?></a>
				<?php } else the_post_thumbnail();
				if ( ! empty ( $image_caption ) ) { 
							echo '<div class="featured-image-caption"><p>' . get_post(get_post_thumbnail_id())->post_excerpt . '</p></div>'; } ?>
			</div>
		<?php endif; ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'aperture' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'aperture' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php aperture_posted_on(); ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'aperture' ) );
				if ( $categories_list && aperture_categorized_blog() ) :
			?>
			<span class="sep"> | </span>
			<span class="cat-links">
				<?php printf( __( '%1$s', 'aperture' ), $categories_list ); ?>
			</span>
		<?php endif; // End if categories ?>

		<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'aperture' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tags-links">
				<?php printf( __( '%1$s', 'aperture' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'No Comments', 'aperture' ), __( '1 Comment', 'aperture' ), __( '% Comments', 'aperture' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'aperture' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
