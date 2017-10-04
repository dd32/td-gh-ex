<?php
get_header();
?>

<article class="noresults">
<h2 class="storytitle"><?php _e("Error 404 - Page Not Found!", 'northern-web-coders'); ?></h2>
<p><?php _e('The requested page  was not found.', 'northern-web-coders'); ?></p>
<?php get_search_form(); ?>
</article>

</div>

<?php get_sidebar('2'); ?>

<?php get_footer(); ?>
