<?php

/* 	AssociationX Theme's Staffs Part of Front Page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.9
*/
?>
<!--- ============  STAFFS  =========== ------------>
<?php 	
$stfboxv = esc_attr(associationx_get_option('staffbox', ''));
if ( !$stfboxv ) return; 

$stfbtitle = ''; $stfbtitle = esc_html__('Our Members', 'associationx');
if($stfbtitle) $stfbtitle = '<h2 class="boxtoptitle" data-sr="scale up 20%, wait 0.7s">'.$stfbtitle.'</h2>';
$viewstaffboxes = '';
	foreach (range(1, 5 ) as $staffboxsnumber ) { 	

		$stfimg = ''; $stfimgautomatic = ''; $stfpostid = ''; $stfautoname = ''; $stfautodesig = ''; $stfautolink = '';
		$stfimg = esc_url(associationx_get_option('staffboxes-image' . $staffboxsnumber, ''));
		
		$stfimgautomatic = esc_attr(associationx_get_option('staffboxes-image-automatic' . $staffboxsnumber, ''));
		if( $stfimg && $stfimgautomatic ):
			$stfpostid = attachment_url_to_postid($stfimg);
			$associationx_getattpost = get_post( $stfpostid );
			$stfautolink = get_permalink( $associationx_getattpost->ID );
			$stfautoname = $associationx_getattpost->post_title;
			$stfautodesig = $associationx_getattpost->post_excerpt;
		endif;		

		$stfname = ''; 
		if($stfautoname) $stfname = $stfautoname; 
		if($stfimg) $stfimg = '<img class="sbstaffimage" src="'.$stfimg.'" alt="'.$stfname.'" />';
		if($stfname) $stfname= '<h3 class="sboxstaffname">'.$stfname.'</h3>'; 	
		$stfdes = '';
		if($stfautodesig) $stfdes = $stfautodesig;
		if($stfdes) $stfdes= '<p class="sboxstaffdes">'.$stfdes.'</p>';
		if($stfname || $stfdes ) $stfname ='<div class="view-staff-name">'.$stfname.$stfdes.'</div>';
		
		$stfslink = '';

		$stfprlnk = ''; 
		if($stfautolink) $stfprlnk = $stfautolink;
		$stfpricon = 'fa-arrow-alt-circle-right'; 
		$sftlclass = ''; $sftlclass = 'profile-link '.$stfpricon;
		if ($stfprlnk) $stfslink .= associationx_linkandtarget('<span></span>',$stfprlnk,1,'',$sftlclass,'1');

		if($stfslink) $stfslink = '<div class="view-staff-back social-link">'.$stfslink.'</div>';

		if($stfprlnk) $stfname = associationx_linkandtarget($stfname,$stfprlnk,1);

		$name_image_links = ''; $name_image_links = $stfname.$stfslink.$stfimg;
		if($name_image_links) $viewstaffboxes .= '<div class="view-staff" data-sr="scale up 30%, wait 0.5s">'.$name_image_links.'</div>';					
	} 

$gridstaffbox = ''; 
if($viewstaffboxes) $gridstaffbox = '<div id="grid-staff" class="main">'.$viewstaffboxes.'</div>';

if(!$stfbtitle && !$gridstaffbox) return;
?>

<div class="clear"></div>
<div id="staff-box-item">
	<div class="box90">
		<?php echo  $stfbtitle.$gridstaffbox; ?>
	</div>
</div>
<div class="clear"></div>

<script type="text/javascript">	
	jQuery(window).load(function() {
  		jQuery( '#grid-staff' ).hoverfold();
	});	
</script>
<!--- ============  END OF STAFFS  =========== ------------>