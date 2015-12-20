<?php 
/* 	Awesome Theme's part for showing blog or page in the front page
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/

?>
<div class="clear"></div>
<?php if ( 'posts' == get_option( 'show_on_front' ) ): ?>
<div id="wpsblogpost" class="box100 bqpcontainer" >
	<div class="box90">
    	
        <div class="featured-boxs" >

			<?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="featured-box view effect"><a href="<?php the_permalink(); ?>" target="_blank" ><div class="fpthumb"><?php the_post_thumbnail('fpage-thumb'); ?><div class="mask"></div></div><h3 class="ftitle"><?php the_title(); ?></h3></a><div class="fppost-content"><?php $awesome_excerpt_length=20; the_excerpt(); ?></div></div>
			<?php endwhile; ?>
			<?php awesome_page_nav(); ?>
		<?php endif; wp_reset_query(); ?>
			
		</div>
	</div>
</div>

<?php else: ?>
<div id="container" class="f-blog-page">
<?php echo '<div id="content-full">'; get_template_part( 'post-content' ); echo '</div>'; ?>
</div>

<?php endif; ?>