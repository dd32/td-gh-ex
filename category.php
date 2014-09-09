<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'jatheme' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();?>

     <div class="cat-content-post-main">
                 <div class="cat-content-post-img">
				 <?php if ( has_post_thumbnail()) : ?>
                 <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( array(150,150) ); ?></a>			
                 <?php else : ?>
                 <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg"  width="150px" 				height="150px" /></a>
                 <?php endif; ?>
                 </div>
                 
                 <div class="content-post-tilte-excerpt">
                 <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                 <small class="content-authore-excerpt"><b>Posted by</b> <?php the_author(); ?>.&nbsp;|&nbsp;<b> Published on</b> <?php get_option('jS F Y'); ?></small>
                 <div class="post_expert_index">
                 <?php the_excerpt(); ?><br />
                 </div>
                 <?php $com_num = get_comments_number( ); ?>
				 <?php if( $com_num == 0 ): ?>
                  <small class="content-comment_no">No Comment</small>
                 <?php elseif($com_num == 1): ?>
                 <small class="content-comment_no">1 Comment</small>
                 <?php else:  ?>
                 <small class="content-comment_no"><?php echo $com_num . ' Comments';?></small>
                 <?php endif; ?>
                 
                 </div>
                 </div>
<?php
			endwhile;

			artikler_theme_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>