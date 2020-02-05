<?php 
/* 	AssociationX Theme's Noticeboard and News Box Part
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$noticebv= esc_attr(associationx_get_option('noticebv',''));
$newsbv= esc_attr(associationx_get_option('newsbv',''));
if(!$noticebv && !$newsbv) return;
?>
<div id="noticenews-item">
	<div class="box90">
		<div class="noticenewsbox">
			<?php 
			if($noticebv): ?>
				<div class="noticebox" data-sr="enter left, move 60px, over 1s, wait 0.5s">
					<div class="notbitems">
						<?php
						$nbcatid = esc_attr(associationx_get_option('noticecat1', ''));						
						if($nbcatid):
							$nbcatname = get_cat_name($nbcatid);
							$nbcatlink = get_category_link($nbcatid);
							$nbcatnnum = 15;
							$nbitemlt = 1;
							$nbitemicon = 'fa-exclamation-circle';
							$nbitemicon = 'fa-exclamation-circle';
							$nbcatrall = esc_html__('Read All', 'associationx');
							$nbcattpos = 'cattpos-left';	

							$nbargs = array('orderby'=> 'post_date', 'order'=> 'DESC', 'cat'=> $nbcatid, 'posts_per_page'=> $nbcatnnum, 'ignore_sticky_posts' => 1 );
							$nbitem_query = new WP_Query($nbargs);
							if ($nbitem_query->have_posts()): ?> 
								<div id="nbcat-<?php echo esc_attr($nbcatid); ?>" class="nboardcat <?php echo $nbcattpos; ?>">
									<?php 
									$nbcatnamef = '<div class="nbcattitle"><h3 class="nbcatt">'.esc_html($nbcatname).'</h3></div>'; 
									echo associationx_linkandtarget($nbcatnamef,$nbcatlink,$nbitemlt,'','nbcatlink');
									echo '<div class="noticeitemtitles">';
									while ($nbitem_query->have_posts()): 
										$nbitem_query->the_post(); 
										$nbittite = '<div class="nbitemtitle '.$nbitemicon.'"><h4>' .esc_html(get_the_title()). '</h4></div>';
										$nbitlink = get_the_permalink();
										echo associationx_linkandtarget($nbittite,$nbitlink,$nbitemlt,'','nbitmplink');
									endwhile; wp_reset_postdata(); 
									echo '</div>';
									echo associationx_linkandtarget($nbcatrall,$nbcatlink,$nbitemlt,'','nbcatlinkra');
									?> 
								</div><?php 
							endif;
						endif; ?>
					</div>				
				</div><?php 
			endif; ?>
			<?php 
			if($newsbv): ?>
				<div class="newsbox" data-sr="enter right, move 60px, over 1s, wait 0.5s">
					<?php
					$nboxheading = esc_html__('A Few From Our Activities', 'associationx');				
					if($nboxheading) echo '<div class="nboxhdes"><h2 class="boxtoptitle">'.$nboxheading.'</h2></div>';
					?>
					<div class="nboxitems">
						<?php					
						$newsbnum = 3;
						foreach (range(1, 3 ) as $newsbnumn ) {
							$nboxcatid = esc_attr(associationx_get_option('nboxcat'.$newsbnumn, ''));						
							if($nboxcatid):
								$nboxcatname = get_cat_name($nboxcatid);
								$nboxcatlink = get_category_link($nboxcatid);
								$nboxcatnnum = 5;
								$nboxitemlt = 1;
								$nboxcatrall = esc_html__('Read All','associationx');
								$nboxcattpos = 'cattpos-left';					
							
								$nboxargs = array('orderby'=> 'post_date', 'order'=> 'DESC', 'cat'=> $nboxcatid, 'posts_per_page'=> $nboxcatnnum, 'ignore_sticky_posts' => 1 );
								$nboxitem_query = new WP_Query($nboxargs);
								if ($nboxitem_query->have_posts()): $pcount = 0; ?>											
									<div id="nboxcat-<?php echo esc_attr($nboxcatid); ?>" class="nboardcat <?php echo $nboxcattpos; ?>">
										<?php 
										$nbcatnamef = '<div class="nbcattitle"><h3 class="nbcatt">'.esc_html($nboxcatname).'</h3></div>'; 
										echo wp_kses_post(associationx_linkandtarget($nbcatnamef,$nboxcatlink,$nboxitemlt,'','nbcatlink'));
										while ($nboxitem_query->have_posts()): 
											$nboxitem_query->the_post(); $pcount++;
											$nbitlink = get_the_permalink();									
											$thumbimg = ''; $nfimage = ''; $nboxfpost = ''; 
											if($pcount == 1 ):
												$thumbimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'associationx-catpage-thumb' );
												$nboxfpost ='nboxfpost';
											else: 	
												$thumbimg = $thumbimg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID ));
											endif;
											if($thumbimg): $thumbimg ='<img class="nboxtimg" src="'.esc_url($thumbimg[0]).'" alt="'.esc_html(get_the_title()).'" />'; else: $thumbimg =''; $nfimage = 'nofimage'; endif; 
											$nbittite = '<div class="nbitemtitle '.$nfimage.'"><h4>' .esc_html(get_the_title()). '</h4></div>';										
											echo associationx_linkandtarget($thumbimg.$nbittite,$nbitlink,$nboxitemlt,'','nbitmplink '.$nboxfpost);
										endwhile; wp_reset_postdata(); 
										echo associationx_linkandtarget($nboxcatrall,$nboxcatlink,$nboxitemlt,'','nbcatlinkra');
										?> 									
									</div><?php 
								endif;
							endif;						
						} ?>				
					</div>
				</div><?php 
			endif; ?>			
		</div>
	</div>
</div>