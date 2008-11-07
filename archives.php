<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
<div class="entry">
<div class="archivespages">

<h2>Archives by Month:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Archives by Category:</h2>
	<ul>
		 <?php wp_list_categories('title_li='); ?>
	</ul>

</div>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
