<?php
/*
	Template Name: Front Page
	Awesome Theme's Front Page to Display the Home Page if Selected
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/
?>

<?php get_header(); ?>
<?php get_template_part( 'slide' ); ?>
<div id="about-us-box-item">
	<div class="box90 about-us-part" >
    
		<h2 class="about-us"><?php echo wp_kses_post(awesome_get_option('abouttitle', 'We are <em>D5 Creation</em>')); ?></h2>
		<h3 class="about-us"><?php echo wp_kses_post(awesome_get_option('aboutsubtitle', 'Where Passion and Creativity Meets Experience')); ?></h3>

		<p class="about-us"><?php echo wp_kses_post(awesome_get_option('aboutdes', 'We are a small team of industry veterans having decades of experience in <em>web development</em> and design. Our work is our passion. We hand craft every piece of the work we do and we take pride in our hand crafted design and clean codes')); ?></p>
	
    </div>
</div>
<div id="featured-box-item"><?php get_template_part( 'featured-box' ); ?> </div>

<?php get_template_part( 'fcontent' ); ?>

<?php get_footer(); ?>