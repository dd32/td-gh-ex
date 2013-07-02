<script type="text/javascript">
/* <![CDATA[ */
jQuery('#featured_slider ul').cycle({ 
fx: 'scrollHorz',
prev: '.feat_prev',
next: '.feat_next',
speed:  1050, 
timeout: 4000, 
});
/* ]]> */
</script>
<div id="featured_slider">
	<ul id="slider">
	<?php 
		while ( have_posts() ) : the_post(); 
		?>
		<li>
		<?php if (is_search() ):
			printf( __( 'Search Results for: %s', 'star' ), '<h2>' . get_search_query() . '</h2>' );
		 else: 
		?>

			<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php 
			if (!is_single()) : 
			if (!is_page()) : 
		
			?>
			<a href="<?php the_permalink();?>">
			<?php 
			the_excerpt();
			?>	
			</a>
			<?php endif; endif; endif;?>
		</li>
		<?php
		endwhile;
			?>
	</ul>
	<div class="feat_next"></div>
	<div class="feat_prev"></div>
</div>
<?php wp_reset_query(); //reset	?>