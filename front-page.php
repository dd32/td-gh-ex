<?php
/*
	Searchlight Theme's Front Page
	Searchlight Theme's Front Page to Display the Home Page if Selected
	Copyright: 2014-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/
get_header(); ?>
<?php get_template_part( 'fpslide' ); ?>
<?php if ( 'posts' == get_option( 'show_on_front' ) ): ?>
<div id="fpblog-box-item" class="box100 bqpcontainer" >
	<div class="box90">
    <div id="content">	
        <div class="featured-boxs">

			<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="featured-box view effect fpost-box-ind"><a href="<?php the_permalink(); ?>" target="_blank" ><div class="fpthumb"><?php the_post_thumbnail('searchlight-fpage-thumb'); ?></div><h3 class="ftitle"><?php the_title(); ?></h3></a><div class="fppost-content"><?php $searchlight_excerpt_length=20; the_excerpt(); ?></div></div>

			<?php endwhile; ?>
			<?php searchlight_page_nav(); ?>
		<?php endif; wp_reset_query(); ?>
		
        </div>
	</div>
    <?php get_sidebar(); ?>
	
    </div>
</div>

<?php else: ?>

<div id="container" class="f-blog-page">
<?php get_template_part( 'post-content' ); ?>
<?php get_sidebar(); ?>
</div>

<?php endif; get_footer(); ?>