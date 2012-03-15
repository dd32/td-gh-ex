<?php
get_header();
?>

<section class="column-full">

<article class="post">
<p><?php printf(_e('Sorry, no posts matched your criteria.', 'nwc')); ?></p>
<?php get_search_form('id=123'); ?>
</article>

</section>

<?php get_footer(); ?>