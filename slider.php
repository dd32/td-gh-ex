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
/*custom query to make sure the slider does not reset with the pagination.*/
		global $wpdb;
		$querystr = "
			SELECT DISTINCT wposts.* 
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id 
			AND wposts.post_status = 'publish' 
			AND wposts.post_type = 'slider'";
		$pageposts = $wpdb->get_results($querystr, OBJECT); ?>
		<?php if ($pageposts): ?>	
			<?php global $post; ?>
			<?php foreach ($pageposts as $post): ?>
			<?php setup_postdata($post);
				$custom = get_post_custom($post->ID);
				?>
		<li>
			<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail();
			}
			the_excerpt();?>
		</li>
		<?php
		endforeach; 
	 endif; 
	 ?>
	</ul>
	<div class="feat_next"></div>
	<div class="feat_prev"></div>
</div>
<?php wp_reset_query(); //reset	?>