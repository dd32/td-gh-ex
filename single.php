<?php get_header(); ?>
<div id="wrapper">
	<div id="contentcontainer" class="container_16 containermargin">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; endif;?>
	<div style="clear:both;"></div>
	</div><!-- #contentcontainer -->
	<div class="next-previous_nav next-previous_nav_previous">
		<div class="nav-previous"><?php previous_post_link( '%link', '<span>%title</span>' ); ?></div>
	</div>
	<div class="next-previous_nav next-previous_nav_next">
		<div class="nav-next"><?php next_post_link( '%link', '<span>%title</span>' ); ?></div>
	</div>
</div><!-- #wrapper -->
<?php get_footer(); ?>