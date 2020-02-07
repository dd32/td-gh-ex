<?php

/* 	AssociationX Theme's Events Part of Front Page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.9
*/
?>

<!--- ============  EVENTS  =========== ------------>
<?php 	
$associationx_portfboxv = associationx_get_option('portfoliobox', '');  
if(!$associationx_portfboxv) return;

$associationx_portheading = esc_html__('Our Upcoming Events', 'associationx');
if($associationx_portheading) $associationx_portheading = '<h2 class="boxtoptitle box90">'.$associationx_portheading.'</h2>';
	 
$associationx_portfbnum = 5; 
if($associationx_portfbnum && is_numeric($associationx_portfbnum)): 
	$associationx_portfitem = '';
	foreach (range(1, $associationx_portfbnum ) as $associationx_portfbnumn) { 
		$associationx_portimg = ''; $associationx_portfautomatic = ''; $associationx_portfpostid = ''; $associationx_getattpost = ''; $associationx_portitemlink = ''; $associationx_portitemlinkt = ''; $portft = ''; $portftdes= '';
		$associationx_portimg = esc_url(associationx_get_option('portfb-image' . $associationx_portfbnumn, ''));
		
		$associationx_portfautomatic = associationx_get_option('portfb-image-automatic' . $associationx_portfbnumn, '0');
		if($associationx_portimg && $associationx_portfautomatic ):
			$associationx_portfpostid = attachment_url_to_postid($associationx_portimg);
			$associationx_getattpost = get_post( $associationx_portfpostid );
			$associationx_portitemlink = esc_url(get_permalink( $associationx_getattpost->ID ));
			$associationx_portitemlinkt = 1;
			$portft = esc_html($associationx_getattpost->post_title);
			$portftdes = wp_kses_post($associationx_getattpost->post_excerpt);
		endif;		

		if($associationx_portimg) $associationx_portimg = '<div class="poftfitem-image"><img src="'.$associationx_portimg.'" alt="'.$portft.'" /></div>';
		if($portft) $portft = '<h3 class="poftfitem-title">'.do_shortcode($portft).'</h3>';
		if($portftdes) $portftdes = '<span class="poftfitem-des">'.do_shortcode($portftdes).'</span>';
		if($portft || $portftdes ) $portft = '<figcaption class="portfoliotext">'.$portft.$portftdes.'</figcaption>';

		if($associationx_portimg) $associationx_portimg = associationx_linkandtarget($associationx_portimg.$portft, $associationx_portitemlink, $associationx_portitemlinkt, '', 'portfitemandlink' );
		if($associationx_portimg) $associationx_portfitem .= '<li class="portfitem-list"><figure class="portfitem-figure">'.$associationx_portimg.'</li></figure>';
	}	
endif;

if( !$associationx_portheading && !$associationx_portfitem ) return; ?>
	
<div class="clear"></div>
<div id="portfolio-box-item" class="posrel" data-sr="enter bottom, move 70px, over 0.7s, wait 0.5s">
	
	<?php
	echo $associationx_portheading; 
	if($associationx_portfitem):
		echo '<div id="portfslider" class="box90 portfolioslider posrel"><ul class="grid-portfolio slides  cs-style-3">'.$associationx_portfitem.'</ul></div>';			
		
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