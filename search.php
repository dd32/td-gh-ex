<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage JATheme
 * @since JATheme 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
    
    		<?php values_get_ad_728_90(); ?>


		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'jatheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php JATheme_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="cat-content-post-main">
                 <div class="cat-content-post-img">
				 <?php if ( has_post_thumbnail()) : ?>
                 <a href="<?php echo get_permalink(); ?>"><img src="<?php wp_get_attachment_image_src( 'thumbnail' ); ?>" /></a>			
                 <?php else : ?>
                 <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg"  width="150px" 				height="150px" /></a>
                 <?php endif; ?>
                 </div>
                 
                 <div class="cat-content-post-tilte-excerpt">
                 <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                 <?php the_excerpt(); ?>
                 </div>
                 </div>
			<?php endwhile; ?>

			<?php JATheme_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'jatheme' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'jatheme' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>