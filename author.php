<?php
/**
 * @package Beach
 */

get_header(); ?>

<section id="primary">
	<div id="content" role="main">

		<header class="page-header">
			<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'beach' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?></h1>
		</header>

		<?php rewind_posts(); ?>

		<?php beach_content_nav( 'nav-above' ); ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php beach_content_nav( 'nav-below' ); ?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>
</section><!-- #primary -->

<?php get_footer(); ?>
