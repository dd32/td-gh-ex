<?php
/*
Template Name: BLANK
*/
?>

<?php get_header(); ?>

	<div id="blank-wrapper">

        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	
	<div id="content-broad2">
		
       		<div class="post">
	
            	<div class="entry">
            		<?php the_content(); ?>
       			</div>

			</div>

		<?php endwhile; ?>
 
		<?php endif; ?>

	</div>

		<div class="clear-all"></div>

</div>

		<div class="clear-all"></div>

<?php wp_footer(); ?> 

</body>
</html>