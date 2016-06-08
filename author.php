<?php
/**
* The template for displaying Author Archive pages.
*
* @package beam
* @since beam 0.1
*/

get_header(); ?>

<div id="content" class="site-content">
<div class="site-content-inner">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
		<?php
		the_post();
		?>

		<header class="page-header">
			
			<div id="author-description" class="round-corners">  

				<h2><?php printf( __( 'About %s', 'beam' ), get_the_author() ); ?></h2> 
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'beam_author_bio_avatar_size', 60 ) ); ?>
				<?php the_author_meta( 'description' ); ?><br />
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">View all posts by <?php the_author(); ?> <span class="meta-nav">&rarr;</span></a>

			</div><!-- #author-description -->

		</header>

			
			<?php
			rewind_posts();

				beam_content_nav( 'nav-above' ); 

				/* Start the Loop */ 
				while ( have_posts() ) : the_post(); 

					get_template_part( 'content', get_post_format() );

				endwhile; 

				// toolbox_content_nav( 'nav-below' );

				else : 
			?>

			<article id="post-0" class="post no-results not-found">

				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'beam' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'beam' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

			<?php endif; ?>

		</main><!-- .site-main -->
	</section><!-- #primary -->
 
<?php
get_sidebar(); 
get_footer();