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
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'anIMass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php } else { ?>	
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'anIMass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php } ?>				

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'anIMass' ), 'after' => '</div>' ) ); ?>
						
							
					</div><!-- .entry-content -->
						<div class="entry-utility">
						<?php edit_post_link( __( 'Edit', 'anIMass' ), '<span class="edit-link">', '</span>' ); ?>
					<span class="meta-sep">|</span>
    <a href="<?php echo get_permalink(); ?>">Permalink</a>
    </div>
				</div><!-- #post-## -->
				
<div class="post2">
	</div>
				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<div class="post2">
	</div>
			</div><!-- #content -->
</article>
		
<!--page.php end-->
<!--include sidebar-->
<?php get_sidebar(); ?> 
<!--include footer-->
<?php get_footer(); ?>