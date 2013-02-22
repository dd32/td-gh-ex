<?php get_header(); ?>

<?php global $bartleby_options;

	$bartleby_settings = get_option( 'bartleby_options', $bartleby_options );

?>



<?php if ( $bartleby_settings['home_headline'] !='' && is_home() && !is_paged() ) { ?>



<div class="row">



<div class="sixteen columns">



<h1 class="big-headline">



<?php echo $bartleby_settings['home_headline']; ?>



</h1>



</div>



</div>



<?php } ?>


<div class="row">



<div class="sixteen columns">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<div class="eight columns">



<div class="column-post">



<article <?php post_class() ?> id="post-<?php the_ID(); ?>">



<h5 class="latest-title">



<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h5>



<?php the_excerpt(); ?>



</article>

</div>

</div>



<?php endwhile; ?>

</div>

</div>

<?php endif; ?>

<div class="row">

<div class="ten columns centered">

<section id="post-nav" role="navigation">

<?php posts_nav_link(); ?>

</section><!--End Navigation-->

</div>

</div>



<?php get_footer(); ?>

