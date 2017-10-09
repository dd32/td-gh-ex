<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Adagio Lite
 */

get_header(); ?>
<div id="wrapper">
<div id="contentwrapper" class="animated fadeIn">
  <h1 class="entry-title">
		<?php printf( esc_html__( 'Search Results for: %s', 'adagio-lite' ), '<span>' . get_search_query() . '</span>' ); ?>
  </h1>

  <div id="searchresult">
    	<?php if (have_posts()) : ?>
    		<?php while ( have_posts() ) : the_post(); ?>
    		<div <?php post_class(); ?>>
      			<div class="entry">
        			<h2 class="entry-title" id="post-<?php the_ID(); ?>">
                   		<a href="<?php the_permalink(); ?>" rel="bookmark">
          					<?php the_title(); ?>
          				</a>
                    </h2>
        			<div class="postcat"><span><?php echo get_the_date(); ?></span>
      <?php the_category( ', ' ); ?>
    </div>
        			<?php the_excerpt(); ?>
      			</div>
    		</div>

			<?php endwhile; ?>
    		<?php adagio_paging_nav(); ?>
    	<?php else : ?>
    		<p class="center">
      			<?php esc_html_e( 'No results.', 'adagio-lite' ); ?>
    		</p>
    	<?php endif; ?>
  	</div>
</div>
</div>
<?php get_footer(); ?>
