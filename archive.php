<?php
/**
 * The template for displaying Archive pages.
 
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rootstrap
 * @since WP RootStrap 1.0
 */

get_header(); ?>

	<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>	
	<div class="content-padder">
		
		<?php if ( have_posts() ) : ?>
	
			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();
	
						elseif ( is_tag() ) :
							single_tag_title();
	
						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', 'rootstrap' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
	
						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'rootstrap' ), '<span>' . get_the_date() . '</span>' );
	
						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'rootstrap' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
	
						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'rootstrap' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
	
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'rootstrap' );
	
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'rootstrap');
	
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'rootstrap' );
	
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'rootstrap' );
	
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'rootstrap' );
	
						else :
							_e( 'Archives', 'rootstrap' );
	
						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
	
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
	
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>
	
			<?php endwhile; ?>
	
			<?php rootstrap_content_nav( 'nav-below' ); ?>
	
		<?php else : ?>
	
			<?php get_template_part( 'no-results', 'archive' ); ?>
	
		<?php endif; ?>
	
	</div><!-- .content-padder -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>
