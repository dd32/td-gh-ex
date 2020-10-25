<?php
/*
	Template Name: Front Page
	SPARK Theme's Front Page to Display the Home Page if Selected
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
get_header(); ?>
<div class="clear"></div>

<?php
$headd = '';
$heading = esc_textarea(spark_get_option('heading_text', ''));
if($heading) $headd .= '<h1 id="heading" class="box90">'.$heading.'</h1>';
$headingdes = esc_textarea(spark_get_option('heading_des', ''));
if($headingdes) $headd .= '<p class="heading-desc box90">'.$headingdes.'</p>';
if($headd) echo '<div id="heading-con" class="box100">'.$headd.'</div>';

$sldimg = esc_url(spark_get_option('slide-image1', ''));
if($sldimg) echo '<div id="slide-con" class="box100"><div class="noslide box90"><img src="'.$sldimg.'" alt="'.$heading.'" /></div></div>';
?>

<div id="container">
	<?php 
	get_template_part( 'featured-box' ); 

	$stfbox = '';
	$stfhead = esc_textarea(spark_get_option('staffboxes-heading', ''));
	if($stfhead) $stfbox .= '<h2 class="boxtoptitle">'.$stfhead.'</h2>';
	$stfdes = esc_textarea(spark_get_option('staffboxes-heading-des', ''));
	if($stfdes) $stfbox .= '<h4 class="boxtopdes">'.$stfdes.'</h4>';
	
	$stfitems = '';
	foreach (range(1, 6 ) as $staffboxsnumber ) {
		$stfitemsin = '';
		$itemttl = ''; $itemdes = ''; $itemimg = '';
		$itemslink = '';
		$itemslink1 = ''; $itemslink2 = ''; $itemslink3 = ''; $itemslink4 = '';
		
		$itemttl = esc_textarea(spark_get_option('staffboxes-title' . $staffboxsnumber, '' ));
		if($itemttl) $itemttl = '<h3>'.$itemttl.'</h3>';
		$itemdes = esc_textarea(spark_get_option('staffboxes-description' . $staffboxsnumber, '' ));
		if($itemdes) $itemdes = '<p>'.$itemdes.'</p>';
		if($itemttl || $itemdes) $stfitemsin .= '<div class="view-staff-name">'.$itemttl.$itemdes.'</div>';
		
		$itemslink1 = esc_url(spark_get_option('staffboxes-linka' .$staffboxsnumber, '' ));
		if($itemslink1) $itemslink .= '<a href="'.$itemslink1.'"></a>';
		$itemslink2 = esc_url(spark_get_option('staffboxes-linkb' .$staffboxsnumber, '' ));
		if($itemslink2) $itemslink .= '<a href="'.$itemslink2.'"></a>';
		$itemslink3 = esc_url(spark_get_option('staffboxes-linkc' .$staffboxsnumber, '' ));
		if($itemslink3) $itemslink .= '<a href="'.$itemslink3.'"></a>';
		$itemslink4 = esc_url(spark_get_option('staffboxes-link' .$staffboxsnumber, '' ));
		if($itemslink4) $itemslink .= '<a class="profile-link" href="'.$itemslink4.'">&rarr;</a>';
		
		if($itemslink) $stfitemsin .= '<div class="view-staff-back social-link">'.$itemslink.'</div>';
		
		$itemimg = esc_url(spark_get_option('staffboxes-image' . $staffboxsnumber, ''));
		if($itemimg) $stfitemsin .= '<img src="'.$itemimg.'" />';
		
		if($stfitemsin) $stfitems .= '<div class="view-staff">'.$stfitemsin.'</div>';		
	}
	if($stfitems) $stfbox .= '<div id="grid-staff" class="main">'.$stfitems.'</div>';
	
	if($stfbox) echo '<div class="clear"></div><div id="staff-box-item">'.$stfbox.'</div>';

	
	get_template_part( 'fcontent' ); get_footer();