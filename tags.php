<?php
/*
Template Name: Tag Cloud
*/
?>

<?php get_header(); ?>

<div id="content">
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>

<div class="entry">
<div class="tagpage">

<?php wp_tag_cloud('smallest=10&largest=20'); ?>
</div>
</div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
