<?php
get_header();
?>


<article class="noresults"> 
<h2 class="storytitle"><?php _e("Error 404 - Page Not Found!", 'northern'); ?></h2>
<p><?php _e('The requested page  was not found.', 'northern'); ?></p>
<?php get_search_form(); ?>
</article>

</section>

<?php get_sidebar(''); ?>
<?php get_sidebar('2'); ?>
<?php get_sidebar('3'); ?>
<?php get_sidebar('4'); ?>

<?php get_footer(); ?>