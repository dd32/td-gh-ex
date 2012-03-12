<?php
/*
 * Template Name: Portfolio Template Three Column
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

<div id="container">
<div id="portfolio-box">


		<div id="threecolumnportfolio">


<?php
query_posts('post_type=projects');

global $more;
$more = 0;
?>	

                <ul id="filter">
                    <li class="current"><a href="#"><?php _e('All', 'skylark'); ?></a></li>
                  <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'skilltypes')); ?>
                </ul>
                

<?php  $query = new WP_Query(); 
				   $query->query('post_type=projects&posts_per_page=-1'); ?>
<ul id="portfolio">	
<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    	  $terms = get_the_terms( get_the_ID(), 'skilltypes' );  ?>  

	<li class="<?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } ?>"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('3c-thumbnail'); ?><h1 class="portfolio-title"><?php the_title(); ?></h1></a> <?php the_excerpt(); ?></li>


<?php endwhile; endif; ?>

</ul>



		</div><!-- #content-container -->
	
</div></div>
<?php get_footer(); ?>