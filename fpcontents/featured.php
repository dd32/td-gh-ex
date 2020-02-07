<?php
/* 	AssociationX Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$associationx_frfboxfstk = associationx_get_option('frfboxfstk', '');
$associationx_fboxnum = 4;
if( !$associationx_frfboxfstk ) return;
?>
<div class="box90">	
    <?php 
	$associationx_sticky = get_option( 'sticky_posts' ); 
	$associationx_fpbp_args = array( 'post_type'=> 'post',  'orderby' => 'date', 'order' => 'DESC', 'post__in'  => $associationx_sticky ); 
	$associationx_fpbp_query = new WP_Query($associationx_fpbp_args); ?>
    <div class="featured-boxs stkfeatured">
    	<?php $associationx_counter = 0; if (have_posts()) : global $associationx_ExLength; $associationx_ExLength = 30; while ( $associationx_fpbp_query->have_posts() ) : $associationx_counter++; if ( $associationx_counter > $associationx_fboxnum ): break; endif; $associationx_fpbp_query->the_post(); ?>
				<div class="featured-box" data-sr='enter bottom, move 50px, over 1s, wait 0.3s'> 
					<a href="<?php the_permalink(); ?>" target="_blank" ><div class="fboxiconimgt flexallcenter"><?php the_post_thumbnail('associationx-fpage-thumb', ['class' => 'box-fimage']); ?><h3 class="ftitle"><?php the_title(); ?></h3></div></a>
					<?php the_excerpt(); ?>
				</div>
		<?php endwhile; endif; wp_reset_query(); $associationx_ExLength = 50;   ?>
	</div> <!-- featured-boxs -->
</div>