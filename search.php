<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        Sampression Lite 
 * @author         Sampression (sampression.com)
 * @copyright      2012 Sampression
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<section id="content" class="clearfix">
  <?php if (have_posts()) : ?>

<header class="page-header columns sixteen">
    <h2 class="page-title quick-note search-title"><?php
        printf( __( 'Search Results for: %s', 'sampression' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h2>
</header>

<div id="post-listing" class="clearfix">
  
  <section class="corner-stamp post columns four">
  <header><h3><?php _e('Categories', 'sampression'); ?></h3></header>
  <div class="entry">
    <ul class="categories">
    	<?php wp_list_categories('title_li'); ?> 
    </ul>
  </div>
  </section>
  <!-- .corner-stamp -->
  
   <?php
  	while (have_posts()) : the_post(); 
    get_template_part( 'loop', 'search' );
    endwhile;
	?>
    
</div>
<!-- #post-listing --> 
  <?php  else: ?>
    
    <article id="post-0" class="no-results not-found">
        <header class="entry-header">
            <h2 class="entry-title"><?php _e( 'Nothing Found For: ', 'sampression' ); echo '&quot;' . get_search_query() . '&quot;'; ?></h2>
        </header><!-- .entry-header -->
    
        <div class="entry-content">
            <p><?php _e( 'Apologies, but no results were found for the requested keyword. Please try another keywords..', 'sampression' ); ?></p>
            
        </div><!-- .entry-content -->
    </article><!-- #post-0 -->

<?php endif; ?>
  
</section>
<!-- #content -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>