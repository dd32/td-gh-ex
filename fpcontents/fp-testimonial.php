<?php

/* 	AssociationX Theme's Testimonial Part of Front Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.9
*/
?>
<!--- ============  TESTIMONIALS  =========== ------------>
<?php 	
$testiv = esc_attr(associationx_get_option('tes-cln', ''));
if(!$testiv) return;
$cltes = 7;
?>
<div class="clear"></div>
<div id="testimonial-box-item" class="box100 tesback twocolord" data-sr="enter bottom, move 60px, over 0.5s, wait 0.5s">
	<div class="box90 testimonialslider">
		<?php
		$tesheading = wp_kses_post(__('Sweet Words from our <b>Proud Members</b> Worldwide', 'associationx'));
		if($tesheading) echo '<h3 class="tesheading">'.$tesheading.'</h3>';			
		
		$testifrmcomnt = esc_attr(associationx_get_option('testifrmlcomnts', ''));
		$testicomnt = ''; 
		if($testifrmcomnt ):
			$testicomnt = get_comments(array( 'status' => 'approve', 'number' => $cltes ));
			if($testicomnt):
				echo '<ul id="customers-comment" class="slides">';
				foreach($testicomnt as $testicomntn) {
					$comdate = ''; $comcontent = ''; $comname = ''; $comdes = ''; $comemail = ''; $comavtr = ''; $comsite = ''; 
					$comdate = date('l F j, Y', strtotime(esc_html($testicomntn->comment_date)));
					if($comdate) $comdate = '<h3 class="testititle">'.$comdate.'</h3>';
					$comcontent = wp_kses_post($testicomntn->comment_content);
					if($comcontent) $comcontent = '<div class="fpage-quote twocolorl">'.$comdate.'<div class="testitext">'.$comcontent.'</div></div>';
					$comname = esc_html($testicomntn->comment_author);
					if($comname) $comname = '<h4 class="testiname">'.$comname.'</h4>';
					$comemail = esc_html($testicomntn->comment_author_email);
					if($comemail) $comavtr = get_avatar( $comemail, 60, '', '', array( 'class' => 'testiimage' ) );
					$comsite = esc_url($testicomntn->comment_author_url);
					if($comsite) $comdes = '<h5 class="testidesignation">'.$comsite.'</h5>';
					if($comname || $comsite ) $comname = '<div class="testinamedes">'.$comname.$comdes.'</div>';
					if($comname) $comname = '<div class="testiin">'.$comavtr.$comname.'</div>';
					if($comname) $comname = '<div class="arrow-down"></div>'.associationx_linkandtarget($comname, $comsite, '1' );
					if($comcontent) echo '<li class="testislideitem">'.$comcontent.$comname.'</li>';
				}
				echo '</ul>';
			endif;	
		endif;	
		?>
	</div>
</div>

<script type="text/javascript">
jQuery(window).load(function() {
  jQuery('.testimonialslider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 200,
    itemMargin: 1,
    minItems: 1,
    maxItems: 3,
	slideshow: true,
	controlNav: true,
	directionNav: false,
	prevText: "",       
 	nextText: ""		
  });
});
</script>
<!--- ============  END OF TESTIMONIALS  =========== ------------>