<?php
/* 	SPARK Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2014-2015, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
?>
<div id="featured-boxs">

<span class="featured-box-first"><h2><?php echo esc_textarea(of_get_option('featuredr-title', 'Recent Works')); ?></h2><div class="content-ver-sep"></div><br /><p><?php echo esc_textarea(of_get_option('featuredr-description',  'The Color changing options of SPARK will give the WordPress Driven Site an attractive look.')); ?></p></span>
<?php 
foreach (range(1, 3) as $fboxn) { ?>
<span class="featured-box"> 
<img class="box-image" src="<?php echo esc_url(of_get_option('featured-image' . $fboxn, get_template_directory_uri() . '/images/featured-image' . $fboxn . '.jpg')) ?>"/>
<h3><?php echo esc_textarea(of_get_option('featured-title' . $fboxn,  'SPARK Theme for Small Business')); ?></h3>
<div class="content-ver-sep"></div><br />
<p><?php echo esc_textarea(of_get_option('featured-description' . $fboxn ,  'The Color changing options of SPARK will give the WordPress Driven Site an attractive look. SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed.')); ?></p>
</span>

<?php }  


if ( esc_html(of_get_option('srfbox', '1')) == '1' ): echo '<div class="clear"></div><br /><div class="lsep"></div><br /><br />'; ?>
<br /><span class="featured-box-first"><h2><?php echo esc_textarea(of_get_option('featuredr2-title', 'Our Services')); ?></h2><div class="content-ver-sep"></div><br /><p><?php echo esc_textarea(of_get_option('featuredr2-description', 'SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed.')); ?></p></span>
<?php  foreach (range(1, 3) as $fboxn2) { ?>
<span class="featured-box"> 
<img class="box-icon" src="<?php echo get_template_directory_uri() . '/images/featured-image.png'; ?>" />
<h3 class="featured-box2"><?php echo esc_textarea(of_get_option('featured-title2' . $fboxn2, 'SPARK Theme for Business')); ?></h3>
<div class="clear"> </div>
<p><?php echo esc_textarea(of_get_option('featured-description2' . $fboxn2 , 'SPARK is super elegant and Professional Responsive Theme which will create the business widely expressed. The Color changing options of SPARK will give the WordPress Driven Site an attractive look.')); ?></p>

</span>

<?php }  ; endif; ?>



</div> <!-- featured-boxs -->