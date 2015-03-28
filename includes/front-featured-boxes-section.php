<?php global $avis_shortname; 
$_featured_heading = avis_get_option($avis_shortname."_featured_heading");
$_featured_desc = avis_get_option($avis_shortname."_featured_desc");
?>

<div id="featured-box" class="avis-section">

	<!-- container -->
	<div class="container">

		<div class="sections_inner_content">
			<?php if (isset($_featured_heading) && $_featured_heading !='') { ?><h2 class="section_heading"><?php echo $_featured_heading; ?></h2><?php } ?>
			<?php if (isset($_featured_desc) && $_featured_desc !='') { ?><div class="section_description"><?php echo $_featured_desc; ?></div><?php } ?>
			<div class="botton_style"><span class="leftsquare"></span><span class="rightsquare"></span></div>
		</div>
		
		<!-- row-fluid -->
		<ul class="mid-box-mid row-fluid">
				<?php dynamic_sidebar( 'Home Featured Sidebar' ); ?>	
			<div class="clearfix"></div>
		</ul>
		<!-- row-fluid -->
		
	</div>
	<!-- container -->
</div>