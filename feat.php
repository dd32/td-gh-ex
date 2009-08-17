<script type="text/javascript">
stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	panelbehavior: {speed:500, wraparound:true, persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['<?php bloginfo('template_directory'); ?>/images/left.jpg', -20, 40], rightnav: ['<?php bloginfo('template_directory'); ?>/images/right.jpg', 0, 40]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['external'] //content setting ['inline'] or ['external', 'path_to_external_file']
})


</script>

<div id="mygallery" class="stepcarousel">
<div class="belt">
<?php 
	$slidecat = get_option('pov_slide_category'); 
	$slidecount = get_option('pov_slide_count');
	
	$my_query = new WP_Query('category_name= '. $slidecat .'&showposts='.$slidecount.'');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="panel">

		<div class="slideimg">
		<?php $screen = get_post_meta($post->ID,'screen', true); ?>
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" > <img src="<?php echo ($screen); ?>" width="400" height="222" 	alt="<?php the_title(); ?>"/> </a>
		</div>

		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php 	the_title(); ?></a>
        </h2>
        <div class="slideex">
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>">Read More &raquo;</a></p>
		</div>
</div>

<?php endwhile; ?>



</div>

</div>

<div id="about" class="tabdiv">

<?php 
	$img = get_option('pov_img'); 
	$about = get_option('pov_about'); 
	?>			

<img src="<?php echo ($img); ?>" class="avatar" alt="" />
<h2>About Us</h2>
<p class="text">
<?php echo ($about); ?> 
</p>
			

</div>