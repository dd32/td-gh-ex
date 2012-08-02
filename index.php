<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Responsive 
 * @author         Sampression (sampression.com)
 * @copyright      2012 Sampression
 * @license        license.txt
 * @version        Release: 1.0
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<section id="content" class="clearfix">
	
  <?php if (have_posts()) : ?>
  <div id="post-listing" class="clearfix">
  
	<?php 
		// Show only one Sticky Post
	$args = array(
		'posts_per_page' => 1,
		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1
	);
	query_posts( $args );
	
	while (have_posts()) : the_post();
		get_template_part( 'loop', 'index' ); 
	endwhile; 
	wp_reset_query();
	
	// Exclude Sticky Posts and show remaining normal posts
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts( array(
		'post__not_in' => get_option( 'sticky_posts' ),
		'paged' => $paged
		) );
		
		while (have_posts()) : the_post();
		get_template_part( 'loop', 'index' );
	
		endwhile;
	
	?>

     </div>
  <!-- #post-listing --> 
  <?php
	  sampression_content_nav( 'nav-below' );
	  else:
	?>
    
    <article id="post-0" class="no-results not-found">
        <header class="entry-header">
            <h2 class="entry-title"><?php _e( 'Nothing Found', 'sampression' ); ?></h2>
        </header><!-- .entry-header -->
    
        <div class="entry-content">
            <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'sampression' ); ?></p>
        </div><!-- .entry-content -->
    </article><!-- #post-0 -->

<?php endif; ?>

  
</section>
<!-- #content -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>