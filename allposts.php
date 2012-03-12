<?php
/*
 * Template Name: Blog Template
 *
 * @package Skylark
 * @since Skylark 1.0
*/

get_header();

?>
<header class="site-title">
	<h1><?php the_title(); ?></h1> 
	<div class="searchform"><?php get_search_form(); ?></div>
</header>



		<div id="primary" class="site-content">
			
			<div id="content" role="main">

<?php
$limit = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('showposts=' . $limit . '&paged=' . $paged);
$wp_query->is_archive = true; $wp_query->is_home = false;

global $more;
$more = 0;
?>		
	
<?php while (have_posts()) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">
			<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->
		
			<div class="entry-meta"><?php skylark_posted_on(); ?> <span>&middot;</span> <?php comments_popup_link( __( 'Leave a comment', 'skylark' ), __( '1 Comment', 'skylark' ), __( '% Comments', 'skylark' ) ); ?> <?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'skylark' ) );
				if ( $tags_list ) :
			?>
			<span>&middot;</span> 
				<?php printf( __( 'Tagged in: %1$s', 'skylark' ), $tags_list ); ?>
			<?php endif; // End if $tags_list ?></div>

			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('single'); ?></a>	

			<div class="entry">

				<?php the_content('Read more...'); ?>

			</div>

			</article>

		<?php endwhile; ?>

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'skylark' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'skylark' ) ); ?></div>
				</div><!-- #nav-below -->

			</div><!-- #content -->
		</div><!-- #content-container -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>