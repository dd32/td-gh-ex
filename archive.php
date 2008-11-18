<?php get_header(); ?>



<div id="content">

<?php if (have_posts()) : ?>

<?php $post = $posts[0]; ?>



<?php if (is_category()) { ?><h2>Category: <?php echo single_cat_title(); ?></h2>

<?php } elseif (is_day()) { ?><h2>Date: <?php the_time('F jS, Y'); ?></h2>

<?php } elseif (is_month()) { ?><h2>Month: <?php the_time('F, Y'); ?></h2>

<?php } elseif (is_year()) { ?><h2>Year: <?php the_time('Y'); ?></h2>

<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2>Archive</h2>

<?php } ?>



<?php while (have_posts()) : the_post(); ?>

<div class="post">

<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

<p class="timestamp"><?php the_time('j F, Y (H:i)') ?> | <?php the_category(', ') ?> | <?php comments_popup_link( 'No comments', 'One comment', '% comments', '', ''); ?><?php edit_post_link('[e]',' | ',''); ?></p>

<div class="contenttext">

<?php the_excerpt(); ?>

</div>

</div>



<?php endwhile; ?>



<div id="postnav">

<p><?php next_posts_link('&laquo; Next posts') ?></p>

<p class="right"><?php previous_posts_link('Previous posts &raquo;') ?></p>

</div>



<?php else : ?>

<h2>Error 404 - Page not found!</h2>

<p>Sorry, but you're looking for something that isn't here. Try looking somewhere else.</p>

<?php endif; ?>



</div>



<?php get_sidebar(); ?>

<?php get_footer(); ?>