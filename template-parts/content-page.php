<?php
/**
 * The template used for displaying page content
 *
 * @subpackage AyaSpirit
 * @author ayatemplates
 * @since AyaSpirit 1.0.0
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="entry-title"><?php the_title(); ?></h1>
	
	<div class="page-content">
		<?php
			if ( has_post_thumbnail() ) :

				the_post_thumbnail();

			endif;
			
			the_content( esc_html__( 'Read More...', 'ayaspirit') );
		?>
	</div><!-- .page-content -->

	<div class="page-after-content">
		
		<?php if ( ! post_password_required() ) : ?>

			<?php if ('open' == $post->comment_status) : ?>

				<span class="icon comments-icon">
					<?php comments_popup_link( esc_html__( 'No Comments', 'ayaspirit' ), esc_html__( '1 Comment', 'ayaspirit' ), esc_html__( '% Comments', 'ayaspirit' ), '', esc_html__( 'Comments are closed.', 'ayaspirit' )); ?>
				</span>

			<?php endif; ?>

			<?php edit_post_link( esc_html__( 'Edit', 'ayaspirit' ), '<span class="edit-icon">', '</span>' ); ?>
		<?php endif; ?>

	</div><!-- .page-after-content -->
</article><!-- #post-## -->

