<?php
/**
 * Template Name: No Sidebar
 * Template Post Type: post, page
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

<article class="container singular_content wide-content entry">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<div class="the_content entry-content">
				<?php the_content(); ?>
			</div>
			<div class="entry-content">
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
			</div>
				<?php
				if ( is_single() ) :
					?>
			<div class="post-meta-footer">
					<?php get_template_part( 'template-parts/post-meta-info', 'single-footer' ); ?>
			</div>
					<?php
				endif;

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
		</div>
	</div>
</article>
		<?php
endwhile;
endif;
?>

<?php get_footer(); ?>
