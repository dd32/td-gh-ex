<?php get_header(); ?>

		<!--content-->
		<div id="content_container">
			
			<div id="content">
		
				<div id="left-col">
			
			<?php get_template_part( 'loop', 'index' ); ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>

	</div> 
</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>