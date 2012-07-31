<?php get_header()?>


<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>




<div class="postbg">
<div class="postimage"><a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a></div>
<div class="postcontent">
<h3><a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title()?></a></h3>
<div class="posttext"><?php the_excerpt(); ?></div>
</div>
<div class="postreadmore"><h5><a href="<?php the_permalink()?>" title="Read more on <?php the_title_attribute(); ?>" rel="bookmark">Read more</a></h5></div>
<div class="smldivider"></div>
<div class="postcats"><?php
$category = get_the_category(); 
echo $category[0]->cat_name;
?></div>
<div class="postcomments"><a href="<?php the_permalink()?>#comments" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></div>
</div>


<?php endwhile; ?>


</div>
</div>

<div class="divider"></div>

<div id="postnavigation">
<div id="previousposts"><?php next_posts_link('Previous entries') ?></div>
<div id="nextposts"><?php previous_posts_link('Next entries') ?></div>
</div>
		
<?php else : ?>
<div id="maincontent">
<h1><?php _e('No posts found','appliance')?></h1>
<p><?php _e('There are no posts to display here.','appliance')?></p>
</div>
<?php endif; ?>




<?php get_footer()?>