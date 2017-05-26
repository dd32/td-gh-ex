<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('contentsolo'); ?> >

<?php 	if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
			<?php 	if ( is_sticky() && is_home() && ! is_paged() ) :
						echo '<span class="featured-post"><span class="genericon genericon-pinned" aria-hidden="true"></span>' . __( 'Featured', 'aguafuerte' ) . '</span>';
					endif;
			?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

		    	<?php
		    	 if ( is_archive() ||  is_search() ) {
		    	 	the_post_thumbnail('full');
		    	 }
		    	 else {
		    	 	the_post_thumbnail();
		    	 	} ?>
				</a>
			</div><!-- post-thumbnail -->

<?php 	else: 

			if ( is_sticky() && is_home() && ! is_paged() ):
				echo '<span class="featured-post"><span class="genericon genericon-pinned" aria-hidden="true"></span>' . __( 'Featured', 'aguafuerte' ) . '</span>';
			endif;

		endif; ?>

<div class="post-inner">
<?php aguafuerte_entry_header(); ?>
	<div class="entry-content">
<?php 	if ( ( get_post_format() || post_password_required() ) && ! has_post_format('chat') ) {
			the_content();
		}

		elseif ( strpos( $post->post_content, '<!--more' ) ) {
			the_content( sprintf(
				__( 'Continue reading', 'aguafuerte' ).' %s <span class="meta-nav">&rarr;</span>',
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		}

		else {
			the_excerpt();
		}	

		?>
	</div><!-- .entry-content -->

<?php aguafuerte_entry_footer(); ?>

<div>
</article><!-- #post-## -->

