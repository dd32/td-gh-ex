<?php
/* 	Awesome Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/
?>


<div class="box90">
	
    <?php $awesome_sticky = get_option( 'sticky_posts' ); $awesome_fpbp_args = array( 'post_type'=> 'post',  'orderby' => 'date', 'order' => 'DESC', 'post__in'  => $awesome_sticky ); $awesome_fpbp_query = new WP_Query($awesome_fpbp_args); ?>
    <div class="featured-boxs">
    	<?php if (have_posts()) : $awesome_pcount = 0; while ( $awesome_fpbp_query->have_posts()) : if ( $awesome_pcount > 2 ): break; endif;  $awesome_fpbp_query->the_post(); $awesome_pcount++; ?>
				<span class="featured-box" > 
					<div class="box-icon fa-modx"></div>
						<a href="<?php the_permalink(); ?>" target="_blank" ><h3 class="ftitle"><?php echo the_title(); ?></h3></a>
						<p><?php echo the_excerpt(); ?></p>
				</span>
		<?php endwhile; endif; wp_reset_query(); ?>

	</div> <!-- featured-boxs -->

</div>
<div class="lsep"></div>

