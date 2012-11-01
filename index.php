<?php get_header(); ?>

<?php if(!is_front_page()) { ?>

	<div id="subhead_container">
		
		<div class="row">

		<div class="twelve columns">
		
<h1><?php if ( is_category() ) {
		single_cat_title();
		} elseif (is_tag() ) {
		echo (__( 'Archives for ', 'antmagazine' )); single_tag_title();
	} elseif (is_archive() ) {
		echo (__( 'Archives for ', 'antmagazine' )); single_month_title();
	} else {
		wp_title('',true);
	} ?></h1>
			
			</div>	
			
	</div></div>
	
<?php } ?>

<!--content-->
		<div class="row" id="content_container">
				
	<!--left col--><div class="eight columns">
	
		<div id="left-col">
				
				<?php if(is_front_page()) {

require_once ( get_template_directory() . '/element-slider.php' );
} ?>
			
			<?php get_template_part( 'loop', 'index' ); ?>

	</div> <!--left-col end-->
</div> <!--column end-->

<?php get_sidebar(); ?>

</div>
<!--content end-->
		

<?php get_footer(); ?>