<?php
/* 	SPARK Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
?>
<div class="featured-boxs">
<div class="featured-box-first featured-box"><h2><?php echo esc_textarea(spark_get_option('featuredr-title', 'Recent Works')); ?></h2><div class="content-ver-sep"></div><p><?php echo esc_textarea(spark_get_option('featuredr-description',  'The Color changing options of Premium will give the WordPress Driven Site an attractive look.')); ?></p></div>
<?php 
foreach (range(1, 3) as $fboxn) { ?>
<div class="featured-box"> 
<img class="box-image" src="<?php echo esc_url(spark_get_option('featured-image' . $fboxn, get_template_directory_uri() . '/images/featured-image' . $fboxn . '.jpg')) ?>"/>
<h3><?php echo esc_textarea(spark_get_option('featured-title' . $fboxn,  'Premium Theme for Small Business')); ?></h3>
<div class="content-ver-sep"></div>
<p><?php echo esc_textarea(spark_get_option('featured-description' . $fboxn ,  'The Color changing options of Premium will give the WordPress Driven Site an attractive look. Premium is super elegant and Professional Responsive Theme which will create the business widely expressed.')); ?></p>
</div>
<?php }  ?>
<div class="lsep"></div>
</div>

<div class="featured-boxs">
<div class="featured-box-first featured-box"><h2><?php echo esc_textarea(spark_get_option('featuredr2-title', 'Our Services')); ?></h2><div class="content-ver-sep"></div><p><?php echo esc_textarea(spark_get_option('featuredr2-description', 'Premium is super elegant and Professional Responsive Theme which will create the business widely expressed.')); ?></p></div>
<?php  foreach (range(1, 3) as $fboxn2) { ?>
<div class="featured-box">
<div class="icontitle"> 
<img class="box-icon" src="<?php echo get_template_directory_uri() . '/images/featured-image.png'; ?>" />
<h3 class="featured-box2"><?php echo esc_textarea(spark_get_option('featured-title2' . $fboxn2, 'Premium Theme for Business')); ?></h3>
</div>
<div class="clear"> </div>
<p><?php echo esc_textarea(spark_get_option('featured-description2' . $fboxn2 , 'Premium is super elegant and Professional Responsive Theme which will create the business widely expressed. The Color changing options of Premium will give the WordPress Driven Site an attractive look.')); ?></p>
</div>
<?php }  ;?>
</div> <!-- featured-boxs -->