<h4><i class="fa fa-line-chart" aria-hidden="true"></i>
 <?php echo esc_html(get_theme_mod('promax_popular_label',__('Popular Posts','promax') )); ?></h4>
<div id="populars">
<?php 
$args = array( 
 'ignore_sticky_posts' => true,
 'showposts' => 5,
'orderby' => 'comment_count',  );
$the_query = new WP_Query( $args );
 if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();
			 ?>							
<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark">
<div class="pop">
<?php if ( has_post_thumbnail() ) {the_post_thumbnail('promax-popularpost');} else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/noimage.jpg" /><?php } ?>

<span class="ltl"><?php the_title(); ?></span>

</div> 		
</a>	<?php endwhile; ?>
<?php endif; ?>	<?php wp_reset_postdata(); ?>
</div>					
<div style="clear:both;"></div>