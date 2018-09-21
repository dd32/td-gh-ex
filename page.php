<?php
/**
 *	The template for dispalying the Page.
 *
 *	@package WordPress
 *	@subpackage AccountantLaw
 */
?>
<?php get_header(); ?>
	<section class="wide-nav">
		<div class="wrapper">
			<h1><?php the_title(); ?></h1>
		</div><!--/div .wrapper-->
	</section><!--/section .wide-nav-->
</header><!--/header-->
<main role="main" id="content">
	<div class="wrapper cf">
		<div id="posts">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="post">
					<div class="post-excerpt">
						<?php the_content(); ?>
					</div><!--/div .post-excerpt-->
				</div><!--/div .post-->
			<?php endwhile; else: ?>
            	<p><?php _e('Sorry, no posts matched your criteria.', 'accountantlaw'); ?></p>
        	<?php endif; ?>
		</div><!--/div #posts-->
		<?php get_sidebar(); ?>
	</div><!--/div .wrapper-->
</main><!--/section #content-->
<?php get_footer(); ?>