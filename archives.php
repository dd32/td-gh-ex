<?php get_header(); ?>
<div id="maincontent">

<?php if (have_posts()) : ?>



<?php
							if ( is_category() ) {
								printf( __( 'Category Archives: %s', 'appliance' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag Archives: %s', 'appliance' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								printf( __( 'Author News Archive %s', 'appliance' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_day() ) {
								printf( __( 'Daily Archives: %s', 'appliance' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives: %s', 'appliance' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives: %s', 'appliance' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} else {
								_e( 'Archives', 'appliance' );

							}
						?>
 	  <?php } ?>


<?php while (have_posts()) : the_post(); ?>


<div class="postbg">
<div class="postimage"><a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
echo get_the_post_thumbnail($post->ID);
} else {
echo main_image();
} ?>
</a></div>
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


<?php else : ?>
<?php endif; ?>

</div>
<?php get_footer(); ?>