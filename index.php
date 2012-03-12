<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skylark
 * @since Skylark 1.0
 */

get_header(); ?>

<div id="homecontainer">

	
<div id="homepage">
<div class="action">
     	<?php query_posts("post_type=calltoaction&orderby=rand&showposts=1");        
        global $more; $more = 0; ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="posts<?php echo $i; ?>">
		<?php the_content(); ?>
		</div>
		<?php endwhile; ?>
</div><!-- end .action -->

<div id="latestwork">
<div class="latestdescription">
	<h2>Work</h2>
	<p>A collection of our most recent projects</p>
</div><!-- end #latestdescription -->
<div class="latestworkswrap">
     <?php query_posts("post_type=projects&showposts=4");        
        global $more; $more = 0; ?>
        <?php $i = 0; ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php $i++; ?>
		<div class="posts<?php echo $i; ?>">
			
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
		
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

		</div>
		<?php endwhile; ?>
		</div><!-- end .latestpostswrap -->
</div><!-- end #latestposts -->


<div id="latestposts">
<div class="latestdescription">
	<h2>News</h2>
	<p>Our latest news and announcements</p>
</div><!-- end #latestdescription -->
<div class="latestpostswrap">
     <?php query_posts("category_name=&showposts=4");        
        global $more; $more = 0; ?>
        <?php $i = 0; ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php $i++; ?>
		<div class="posts<?php echo $i; ?>">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
		
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<span class="thedate"><?php the_time('m/d/Y') ?></span>
			<div class="latest-entry">
				<?php the_excerpt(); ?>
			</div>

		</div>
		<?php endwhile; ?>
		</div><!-- end .latestpostswrap -->
</div><!-- end #latestposts -->


</div><!-- end #homepage -->
</div>

<?php get_footer(); ?>