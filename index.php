<?php get_header(); ?>


<?php get_sidebar(); ?>


<div id="content">

<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>



<div class="post">

<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

<p class="timestamp"><?php the_time('Y-m-d - H:i') ?> | <?php the_category(', ') ?> | <?php comments_popup_link( 'No comments', 'One comment', '% comments', '', ''); ?></p>



<div class="contenttext">

<?php the_content('Read more &gt;'); ?>

</div>

</div>

  <hr />

<?php endwhile; ?>



<div id="postnav">

<p><?php next_posts_link('&laquo; Next posts') ?></p>

<p class="right"><?php previous_posts_link('Previous posts &raquo;') ?></p>

</div>

		

<?php else : ?>

<h2>The page is nowhere to be found</h2>

<p>Whatever you're looking for, it isn't here. Try the search field or the archives instead.</p>

<?php endif; ?>



</div>



<?php get_footer(); ?>