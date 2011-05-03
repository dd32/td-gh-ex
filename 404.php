<?php
get_header();
?>


<section class="column-full">

<article class="post">
<h3 class="storytitle" id="post-<?php the_ID(); ?>">404 - <?php printf(_e( 'Not Found')); ?></h3>
<p><?php printf(_e( 'Page not found' )); ?></p>
<?php get_search_form(); ?>
</article> 
 
</section>  


<?php get_footer(); ?>
