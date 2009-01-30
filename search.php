<?php get_header(); ?>
<!--ab hier die page.php-->

<div id="platzoben"></div> <!---/ platzoben-->

<div id="content">
<div id="contentinnen">

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h3>Posts filed under '<?php echo single_cat_title(); ?>'</h3>

	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h3>Daily Archive for <?php the_time('F d Y'); ?></h3>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h3>Monthly Archive for <?php the_time('F Y'); ?></h3>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h3>Archive per Year for <?php the_time('Y'); ?></h3>

	<?php /* If this is a search */ } elseif (is_search()) { ?>
	<h3>Search Results:</h3>

	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h3>Archive of Authors</h3>

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h3>Blog-Archive</h3>

<?php } ?>
<?php endif; ?>


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<h2><a href="<?php the_permalink() ?>" title="Permalink"><?php the_title(); ?></a></h2>
<div class="contentdeko">

<div class="contenttext">
<?php the_content(); ?>
</div><!--contenttext-->

<div class="infos">
<?php the_author(); ?> in <?php the_category(',') ?> on <?php the_time('F d Y') ?> <?php comments_popup_link(' &raquo; 0 comments', ' &raquo; 1 comment', ' &raquo; % comments', '', ' &raquo; Comments are closed.'); ?> <?php edit_post_link('&raquo; edit','',''); ?>
</div><!--infos-->

</div><!--contentdeko-->
<div class="blend"><br /></div>

<?php comments_template(); ?>

<?php endwhile; ?>

<div id="altneuebeitraege">
	<?php previous_posts_link('Newer Articles') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php next_posts_link('Older Articles') ?>
</div>

<?php else : ?>
  
  <div class="nothingfound">
	<h3>Nothing found.</h3>
	<p>Sorry, but you are looking for something that isn't here.</p>
  </div>
<?php endif; ?>


</div> <!---/ contentinnen-->
</div> <!---/ content-->

<?php get_sidebar(); ?>

<div id="platzunten"></div> <!---/ platzunten-->

<?php get_footer(); ?>

</div> <!---/ container-->
</body>
</html>
