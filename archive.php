<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package atoz
 */

get_header(); ?>

<section id="sb-imgbox" style="padding-bottom:80px;">
	<div class="container">
		<div class="row text-center">
			<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			</header>
			<!-- .page-header -->
			<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>
			<!--Blog Listing-->
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>
			<div class="clearfix"></div>
			<?php the_posts_pagination( array( 'prev_text' => esc_attr( '<<', 'atoz ' ),
								'next_text' => esc_attr( '>>', 'atoz' ), ) ); else : get_template_part( 'template-parts/content', 'none' ); endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();