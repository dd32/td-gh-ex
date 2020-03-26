<h4 class="featured"><?php echo esc_attr("Latest Offers & Deals ",''); ?></h4>
<div class="row">
<?php 
$args = array( 
 'ignore_sticky_posts' => true,
 'showposts' => 12,
'cat' => '-1',  );
$the_query = new WP_Query( $args );
 if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();
			 ?>							
<div class="col-md-2 todays">
<div class="best-deals">
<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark">
<?php if ( has_post_thumbnail() ) {the_post_thumbnail('promax-popularpost');} else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" /><?php } ?>

<span class="ltl"><?php the_title(); ?></span>

</a>
</div> 		
</div> 		
<?php endwhile; ?>
<?php endif; ?>	<?php wp_reset_postdata(); ?>
</div>

