<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content_box">
<div id="content_body">
<?php $posts_to_show = 100; //Max number of articles to display
$debut = 0; //The first article to be displayed 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="h2-archive"><?php the_title(); ?></div>
<?php
$myposts = get_posts('numberposts=$posts_to_show&offset=$debut');
foreach($myposts as $post) :
?>
<small><?php the_time('l, F jS, Y') ?></small>
<div class="h3-archive"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
<?php endforeach; ?>
<?php endwhile; ?>
<?php include (TEMPLATEPATH . '/archive-list.php'); ?>
<?php else : ?>
<p><center>Sorry, but you are looking for something that isn't here.</center></p>
<?php include (TEMPLATEPATH . '/archive-list.php'); ?>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
