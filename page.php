<?php get_header(); ?>

<div id="container">
<div id="content">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entry">
<h1><?php the_title(); ?></h1>


<div class="archive">

<?php the_content('Continue reading ...'); ?>
</div>




<!--
<?php trackback_rdf(); ?>
-->

</div>
<?php endwhile; else: ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
