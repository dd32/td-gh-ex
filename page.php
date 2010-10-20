<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage anIMass
 * @since anIMass 7.0
 */

get_header(); ?>
<!--page.php-->

<div id="maincontent">
<article >


<div id="content" role="main">
		

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>	
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>				

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'anIMass' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'anIMass' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
<div class="post2">
	</div>
	

<?php endwhile; ?>

		</div><!-- #content -->
	
</article>
		
<!--page.php end-->
<!--include sidebar-->
<?php get_sidebar(); ?> 
<!--include footer-->
<?php get_footer(); ?>