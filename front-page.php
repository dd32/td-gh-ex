<?php
/*
	Template Name: Front Page
	Selfie Theme's Front Page to Display the Home Page if Selected
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Selfie 1.0
*/
?>

<?php get_header(); ?>
<div class="clear"></div>
<?php if ( 'posts' == get_option( 'show_on_front' ) ): ?>
<div id="fpblog-box-item" class="box100 bqpcontainer" >
	<div class="box90">
    	
        <div class="featured-boxs" data-scroll-reveal="enter bottom, move 40px, over 2s, wait 0.2s">

			<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>


			<div class="featured-box view effect"><a href="<?php the_permalink(); ?>" target="_blank" ><div class="fpthumb"><?php the_post_thumbnail('fpage-thumb'); ?><div class="mask"></div></div><h3 class="ftitle"><?php the_title(); ?></h3></a><div class="fppost-content"><?php $selfie_excerpt_length=20; the_excerpt(); ?></div></div>

			<?php endwhile; ?>
			<?php selfie_page_nav(); ?>
		<?php endif; wp_reset_query(); ?>
			
		</div>
	</div>
</div>

<?php else: ?>

<div id="container">
<?php get_template_part( 'post-content' ); ?>
<?php get_sidebar(); ?>
</div>

<?php endif; get_footer(); ?>