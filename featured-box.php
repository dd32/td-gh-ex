<?php
/* 	Awesome Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/
?>

<div class="box90">
	<div class="featured-boxs">
		<?php foreach (range(1, 3) as $fboxn) { ?>
				<span class="featured-box" > 
					<div class="box-icon fa-modx"></div>
					<h3 class="ftitle"><?php echo esc_attr(awesome_get_option('featured-title' . $fboxn, 'Awesome Responsive')); ?></h3>
					<div class="content-ver-sep"></div><br />
					<p><?php echo esc_attr(awesome_get_option('featured-description' . $fboxn , 'The Color changing options of Awesome will give the WordPress Driven Site an attractive look. Awesome is super elegant and Professional Responsive Theme which will create the business widely expressed.')); ?></p>
				</span>
		<?php } ?>
	</div> <!-- featured-boxs -->

</div>
<div class="lsep"></div>
