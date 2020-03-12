<?php

/* 	AssociationX Theme's Post Content
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$postmeta = 0; $sinpostpnext = 1;
if(is_singular() && is_page()) $postmeta = 1;
if(is_single()) $sinpostpnext = 0;
do_action('associationx_before_content');
?>
<div id="content">	
	<?php
	do_action('associationx_starting_content');
	if (is_archive()) :  ?>
		<div class="arctitledes">
			<h1 class="arc-post-title"><?php the_archive_title(); ?></h1>
			<div class="description"><?php the_archive_description(); ?></div>
		</div>
		<div class="clear">&nbsp;</div>
	<?php endif; ?>

	<?php if (is_search()) : global $wp_query; $numposts = $wp_query->found_posts; ?>
		<div class="searchinfo narrowwidth">
			<h1 class="page-title fa-search-plus"><?php echo esc_html__('SEARCH RESULTS', 'associationx'); ?></h1>
			<h3 class="arc-src"><span><?php echo esc_html__('Search Term', 'associationx'); ?>: </span><?php the_search_query(); ?></h3>
			<h3 class="arc-src"><span><?php echo esc_html__('Number of Results', 'associationx'); ?>: </span><?php echo absint($numposts); ?></h3><br />
		</div>
		<div class="clear"></div>
	<?php endif; ?>
  	<div class="contentin narrowwidth">
		<?php
		$duppost = array();
		if ( have_posts() ): while ( have_posts() ) : the_post(); $duppost[] = absint($post->ID);			
			$havefimage = 'nofimage';			
			?>    
			<div <?php post_class('postandpage'); ?> id="post-<?php the_ID(); ?>">
				<div class="post-container" <?php if(!is_singular()) echo 'data-sr="enter left, move 60px, over 1s, wait 0.3s"'; ?>><?php					
					if(has_post_thumbnail()): $havefimage = 'yesfimage'; ?>
						<div class="fpthumb">
							<?php if ( !is_singular() ): ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('associationx-fpage-thumb'); ?></a><?php
							else: 
								the_post_thumbnail('associationx-fpage-thumb');
							endif; ?>
						</div><?php 
					endif; ?>        		
					<div class="entrytext <?php echo $havefimage; ?>">
						<?php if ( !is_singular() ): ?>
							<a href="<?php the_permalink(); ?>" class="post-title-link"><h2 class="post-title"><?php the_title(); ?></h2></a><div class="content-ver-sep"></div><?php
						else: ?>
							<h1 class="page-title"><?php the_title(); ?></h1><div class="content-ver-sep"></div><div class="beforecontent"></div><?php
						endif;
						associationx_content(); ?>
					</div>            
					<div class="clear"></div><?php 
					if ( is_singular() ): wp_link_pages( array( 'before' => '<div class="page-link fa-file-alt"><span>' . '' . '</span>', 'after' => '</div>' ) ); endif;
					if(!$postmeta) associationx_post_meta();
					if( !$sinpostpnext ) echo '<div class="content-ver-sep"></div>'; associationx_singlepage_next_previous(); 
					?>            
				</div>
			</div>
		<?php endwhile; ?>
		<!-- End the Loop. -->          

			<?php
			associationx_author_bio(esc_html__('Author : ', 'associationx'),1, 0);
		
			// Related Posts
			$srelatedpost = 1;
			$numrelpost = 3;
			if(is_single() && $srelatedpost && $numrelpost && is_numeric($numrelpost) && !is_attachment() ):
				$relpsttitle = esc_html__('Related Posts', 'associationx');
				if($relpsttitle) $relpsttitle = '<h2 class="related-post-tile">'.$relpsttitle.'</h2>';
				$relpstcat = get_the_category();
				$pstarg = array( 'cat' => absint($relpstcat[0]->cat_ID), 'orderby'  => 'post_date', 'order' => 'DESC', 'post_type' => 'post', 'post_status'  => 'publish', 'ignore_sticky_posts' => 1, 'posts_per_page'  => $numrelpost, 'suppress_filters' => true, 'post__not_in' => $duppost );
				$relpst = new WP_Query($pstarg); 
				if ( $relpst->have_posts() ):					
					echo $relpsttitle;
					global $associationx_ExLength; $associationx_ExLength = 15;
					while ( $relpst->have_posts() ) : $relpst->the_post(); ?>
						<div <?php post_class('relatespost'); ?> id="post-<?php the_ID(); ?>">
							<a href="<?php the_permalink(); ?>" class="relpostin" >
								<?php the_post_thumbnail('associationx-catpage-thumb', ['class' => 'relpstimg']); ?> 
								<h3 class="relpstttl"><?php the_title(); ?></h3>								
							</a>
							<div class="relpstcontent"><?php the_excerpt(); ?></div>
						</div>
					<?php
					endwhile; 
				endif;
				wp_reset_postdata();
				$associationx_ExLength = 50;
			endif;
			// End of Related Posts			
			
			if ( is_singular() ): comments_template('', true); endif;
			associationx_page_nav();
		else:
			associationx_not_found();
		endif; ?>
	</div>
	<?php do_action('associationx_ending_content'); ?>           
</div>
<?php
do_action('associationx_after_content');