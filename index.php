<?php get_header(); ?>
<!--ab hier die index.php-->
<div class="blend"><a href="#content">gleich zum inhalt springen</a></div>

<div id="platzoben"></div> <!---/ platzoben-->

<div id="content">
<div id="contentinnen">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<h2><a href="<?php the_permalink() ?>" title="Permalink"><?php the_title(); ?></a></h2>
<div class="contentdeko">

<div class="contenttext">
<?php the_content(); ?>
</div><!--contenttext-->

<div class="infos">
<?php the_author(); ?> in <?php the_category(',') ?> on <?php the_time('F d Y') ?> <?php comments_popup_link(' &raquo; 0 comments', ' &raquo; 1 comment', ' &raquo; % comments', '', ' &raquo; comments are closed'); ?> <?php edit_post_link('&raquo; edit','',''); ?>
</div><!--infos-->
</div><!--contentdeko-->

<?php comments_template(); /*Das reicht v�llig, wenn ich nicht will, dass die Einzelansicht (in single.php) sich von der Gesamtansicht unterscheidet*/ ?>

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
