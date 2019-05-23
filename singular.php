<?php
/**
 * The singlar template file
 *
 * @package agncy
 */

get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
			<?php get_template_part( 'template-parts/title-bar' ); ?>
			<?php get_template_part( 'template-parts/postthumbnail' ); ?>

			<?php
			$article_classes = classNames(
				array(
					'container'        => true,
					'singular_content' => true,
					'entry'            => true,
					'wide-content'     => ! agncy_has_sidebar(),
				)
			);

			$row_classes = classNames(
				array(
					'row'         => true,
					'has-sidebar' => agncy_has_sidebar(),
				)
			);

			$wrapper_classes = classNames(
				array(
					'col-xs-12'       => true,
					'col-md-8'        => true,
					'content-wrapper' => true,
					'col-md-offset-2' => ! agncy_has_sidebar(),
				)
			);

			?>

<article class="<?php echo esc_attr( $article_classes ); ?>">
	<div class="<?php echo esc_attr( $row_classes ); ?>">
		<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
			<div class="the_content clearfix entry-content">
				<?php the_content(); ?>
			</div>
			<?php
				wp_link_pages(
					array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'agncy' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					)
				);
			?>
				<?php
				if ( is_single() && ! get_theme_mod( 'agncy_hide_single_meta', false ) ) :
					?>
			<div class="post-meta-footer">
					<?php get_template_part( 'template-parts/post-meta-info', 'single-footer' ); ?>
			</div>
					<?php
				endif;

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
		</div>
		<?php get_sidebar( get_post_type() ); ?>
	</div>
</article>
		<?php
endwhile;
endif;
?>

<?php get_footer(); ?>
