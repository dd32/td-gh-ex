<?php
/**
 * @package URVR
 */
global $urvr;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title( '<i class="el-icon-tags"></i>','' ); ?></h1>

		<div class="entry-meta">
			<?php urvr_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if( isset( $urvr['single-featured-image'] ) && $urvr['single-featured-image'] ) : ?>
			<?php if( has_post_thumbnail() ) : ?>
				<div class="post-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', TEXTDOMAIN ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', TEXTDOMAIN ) );
				if ( $categories_list && urvr_categorized_blog() ) :
			?>
			<span class="cat-links">
				<i class="el-icon-list-alt"></i>
				<?php printf( __( ' %1$s', TEXTDOMAIN ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', TEXTDOMAIN ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<i class="el-icon-tags"></i>
				<?php printf( __( ' %1$s', TEXTDOMAIN ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->