<?php

/* 	AssociationX Theme's Events Part of Front Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.9
*/
?>

<!--- ============  EVENTS  =========== ------------>
<?php 	
$portfboxv = esc_html(associationx_get_option('portfoliobox', ''));  
if(!$portfboxv) return;

$portheading = esc_html__('Our Upcoming Events', 'associationx');
if($portheading) $portheading = '<h2 class="boxtoptitle box90">'.do_shortcode($portheading).'</h2>';
	 
$portfbnum = 5; 
if($portfbnum && is_numeric($portfbnum)): 
	$portfitem = '';
	foreach (range(1, $portfbnum ) as $portfbnumn) { 
		$portimg = ''; $portfautomatic = ''; $portfpostid = ''; $getattpost = ''; $portitemlink = ''; $portitemlinkt = ''; $portft = ''; $portftdes= '';
		$portimg = esc_url(associationx_get_option('portfb-image' . $portfbnumn, ''));
		
		$portfautomatic = esc_html(associationx_get_option('portfb-image-automatic' . $portfbnumn, '0'));
		if($portimg && $portfautomatic ):
			$portfpostid = attachment_url_to_postid($portimg);
			$getattpost = get_post( $portfpostid );
			$portitemlink = get_permalink( $getattpost->ID );
			$portitemlinkt = 1;
			$portft = $getattpost->post_title;
			$portftdes = $getattpost->post_excerpt;
		endif;		

		if($portimg) $portimg = '<div class="poftfitem-image"><img src="'.$portimg.'" alt="'.$portft.'" /></div>';
		if($portft) $portft = '<h3 class="poftfitem-title">'.do_shortcode($portft).'</h3>';
		if($portftdes) $portftdes = '<span class="poftfitem-des">'.do_shortcode($portftdes).'</span>';
		if($portft || $portftdes ) $portft = '<figcaption class="portfoliotext">'.$portft.$portftdes.'</figcaption>';

		if($portimg) $portimg = associationx_linkandtarget($portimg.$portft, $portitemlink, $portitemlinkt, '', 'portfitemandlink' );
		if($portimg) $portfitem .= '<li class="portfitem-list"><figure class="portfitem-figure">'.$portimg.'</li></figure>';
	}	
endif;

if( !$portheading && !$portfitem ) return; ?>
	
<div class="clear"></div>
<div id="portfolio-box-item" class="posrel" data-sr="enter bottom, move 70px, over 0.7s, wait 0.5s">
	
	<?php
	echo $portheading; 
	if($portfitem):
		echo '<div id="portfslider" class="box90 portfolioslider posrel"><ul class="grid-portfolio slides  cs-style-3">'.$portfitem.'</ul></div>';			
		
	?>
       	<script type="text/javascript">
			jQuery(window).load(function() {
  				jQuery('#portfslider').flexslider({
					animation: "slide",
    				animationLoop: false,
    				itemWidth: 300,
    				itemMargin: 1,
    				minItems: 1,
    				maxItems: 4,
					slideshow: true,
					controlNav: false,
					directionNav: true, 
					prevText: "",       
 					nextText: ""		
				});
			});
		</script>
	<?php endif; ?>
</div>
<div class="clear"></div>
<!--- ============  END OF EVENTS  =========== ------------>