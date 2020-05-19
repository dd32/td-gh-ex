<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">

	<div class="entry-meta">

			<?php
				// Translators: used between list items, there is a space after the comma.
				$categories_list = get_the_category_list( __( ', ', 'bassist' ) );
				if ( $categories_list ) {
					echo '<span class="cat-links"><span class="fa fa-folder-open" aria-hidden="true"></span>' . $categories_list . '</span>';
				}
			?>
	</div><!-- .entry-meta -->
	
<?php
	bassist_entry_title();

	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">
		<span class="fa fa-thumb-tack"></span> <span class="screen-reader-text">' . __( 'Featured', 'bassist' ) . '</span></span>';
	}
?>
	<div class="entry-meta">
		<?php
			// This is used for the styling of post formats.
			$format = get_post_format(); 
			if ($format):
				bassist_post_format_info();
			endif;
		?>

		<span class="byline">
			<?php
				if ( 'post' == get_post_type() ) {
				// Translators: there is a space after "By".
				print( __('By ', 'bassist') );
				printf( '<a href="%1$s" rel="author"><span class="fa fa-user" aria-hidden="true"></span>%2$s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author() );
				}
			?>
		</span><!--.byline -->
		<?php edit_post_link('<span class="fa fa-pencil" aria-hidden="true"></span>'. __('Edit', 'bassist') ) ?>

	</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() && ! (has_post_format('video') ) ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail(); ?>
		</a>
	</div><!-- post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if ( strpos( $post->post_content, '<!--more' ) || get_post_format() ) {
			the_content( sprintf(
				__( 'Continue reading', 'bassist' ).' %s <span class="meta-nav">&rarr;</span>',
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		} else {
			the_excerpt();
		}
		?>

	</div><!-- .entry-content -->

	<?php bassist_entry_footer(); ?>

</article><!-- #post-## -->

