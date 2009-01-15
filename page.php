<?php get_header(); ?>

<!-- begin post div -->
<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>



<div class="page_post">
		<?php the_content(); ?>
<p><?php edit_post_link('(edit this)'); ?></p>
<?php endwhile; ?>

<?php endif; ?>

</div> <!-- end post div -->
</div><!-- end CONTENT -->
<?php get_sidebar(); ?>