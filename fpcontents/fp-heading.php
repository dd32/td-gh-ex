<?php 
/* 	Travel Theme's E-Commerce Part
	Copyright: 2015-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 3.0
*/
?>
<?php if ( esc_textarea(beautyandspa_get_option('heading_text', 'Welcome to the World of Beauty !')) != '' || esc_textarea(beautyandspa_get_option('heading_des', 'You can use Beauty and Spa Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option')) != '' ): ?>
<div id="heading-box-item" class="box100 fpheadcon">
	<div class="box90">
    	<?php if ( esc_textarea(beautyandspa_get_option('heading_text', 'Welcome to the World of Beauty !')) != '' ): ?>
		<h1 id="heading"><?php echo esc_textarea(beautyandspa_get_option('heading_text', 'Welcome to the World of Beauty !')); ?></h1>
        <?php endif; if( esc_textarea(beautyandspa_get_option('heading_des', 'You can use Beauty and Spa Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option')) != '' ): ?>
		<p class="heading-desc"><?php echo esc_textarea(beautyandspa_get_option('heading_des', 'You can use Beauty and Spa Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option')); ?></p>
       <?php endif; ?>
	</div>
</div>
<?php endif; ?>