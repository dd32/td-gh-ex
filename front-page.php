<?php
/*
	Template Name: Front Page
	SPARK Theme's Front Page to Display the Home Page if Selected
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
?>

<?php get_header(); ?>
<div class="clear"></div>
<div class="header-back-abs">
<div class="header-bottom"></div>
<div class="header-tcontainer">
<div class="tcontainer1"></div><div class="tcontainer2"></div>
</div>
</div>
<div id="container">
<h1 id="heading"><?php echo esc_textarea(spark_get_option('heading_text', 'Welcome to the SPARK WordPress Theme!')); ?></h1>
<p class="heading-desc"><?php echo esc_textarea(spark_get_option('heading_des', 'You can use SPARK Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option.')); ?></p>

<div class="noslide"><img src="<?php echo esc_url(spark_get_option('slide-image1', get_template_directory_uri() . '/images/slide-image/slide-image1.jpg')); ?>" alt="SPARK WordPress Theme by D5 Creation" /></div>

<?php get_template_part( 'featured-box' ); ?> 


<!--- ============  STAFFS  =========== ------------>
<div class="clear"></div>
<div id="staff-box-item">
	<h2 class="boxtoptitle" ><?php echo esc_textarea(spark_get_option('staffboxes-heading', 'WE ARE INSIDE')); ?></h2>
	<h4 class="boxtopdes" ><?php echo esc_textarea(spark_get_option('staffboxes-heading-des', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua')); ?></h4>
	
			<div id="grid-staff" class="main">
				<?php foreach (range(1, 6 ) as $staffboxsnumber ) { ?>
				<div class="view-staff" >
                	<div class="view-staff-name">
                    <h3><?php echo esc_textarea(spark_get_option('staffboxes-title' . $staffboxsnumber, 'OUR PROUD STAFF '. $staffboxsnumber )); ?></h3>
                    <p><?php echo esc_textarea(spark_get_option('staffboxes-description' . $staffboxsnumber, 'Service Executive' )); ?></p>
                    </div>
                    
					<div class="view-staff-back social-link">
						<a href="<?php echo esc_url(spark_get_option('staffboxes-linka' .$staffboxsnumber, 'http://wordpress.org' )); ?>"></a>
						<a href="<?php echo esc_url(spark_get_option('staffboxes-linkb' .$staffboxsnumber, 'http://wordpress.org' )); ?>"></a>
                        <a href="<?php echo esc_textarea(spark_get_option('staffboxes-linkc' .$staffboxsnumber, 'http://wordpress.org' )); ?>"></a>
						<a class="profile-link" href="<?php echo esc_url(spark_get_option('staffboxes-link' . $staffboxsnumber, '#' )); ?>">&rarr;</a>
					</div>
					<img src="<?php echo esc_url(spark_get_option('staffboxes-image' . $staffboxsnumber, get_template_directory_uri() . '/images/stf.jpg')); ?>" />
                </div>
       			<?php } ?>
			</div>
 
</div>

<!--- ============  END OF STAFFS  =========== ------------>

<?php get_template_part( 'fcontent' ); get_footer(); ?>

