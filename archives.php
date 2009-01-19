<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>


	
<div id="content">

<h2 class="title"><?php the_title(); ?></h2>

<div class="home"><!-- begin home -->
<div class="recentposts">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="repost">
				<?php the_content('<p>Continue reading &raquo;</p>'); ?>
	
				<?php //if page is split into more than one
					link_pages('<p>Pages: ', '</p>', 'number'); ?>

				
<ul>
<?php
$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
foreach($years as $year) : 
?>
<li><a href="<?php echo get_year_link($year); ?> "><?php echo $year; ?></a></li>
<?php endforeach; ?>
</ul>


	  <?php endwhile; endif; ?>
	<?php edit_post_link('(edit this page)', '<p>', '</p>'); ?>
	
			</div>
				
</div>
</div>
</div>

<?php include(TEMPLATEPATH."/left.php");?>
<?php include(TEMPLATEPATH."/right.php");?>


<?php get_footer(); ?>