<?php
	global $options;
	foreach ($options as $value) {
	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

<?php if ($tpl_featured_visibility == "on") { ?>

<div id="myGallery">
<?php
#RETRIEVE THE SMOOTH GALLERY POSTS
$smoothgallery_posts = new WP_Query("cat=$tpl_featured_cat_id");

if ($smoothgallery_posts->have_posts()) {

	#DISPLAY SMOOTH GALLERY ELEMENTS
	while ($smoothgallery_posts->have_posts())
	{
		$smoothgallery_posts->the_post();

		#RETRIEVE THE SMOOTH GALLERY IMAGE URL
		$picture = get_post_meta($post->ID, 'picture', true);
	 
		#RETRIEVE THE SMOOTH GALLERY URL
		$url = get_post_meta($post->ID, 'url', true);
	 
		?>
			<!-- SMOOTH GALLERY ELEMENT - START -->
			<div class="imageElement">
				<h3><?php the_title(); ?></h3>
				<?php the_excerpt(); ?>
			
				<?php
				#SMOOTH GALLERY URL EXISTS
				if(!empty($url))
				{
				?>
				<a href="<?php echo $url; ?>" title="Read more" class="open"></a>
				<?php
				}
				#SMOOTH GALLERY URL DOES NOT EXIST - USE POST URL
				else
				{
				?>
				<a href="<?php the_permalink(); ?>" title="Read more" class="open"></a>
				<?php
				}
				
				#SMOOTH GALLERY IMAGE URL EXISTS
				if (!empty($picture))
				{
				?>
				
				<img src="<?php echo $picture; ?>" class="full" alt="<?php the_title(); ?>"/>
				<img src="<?php echo $picture; ?>" class="thumbnail" alt="<?php the_title(); ?>"/>
				
				<?php
				}
				else
				{
				?>
				
				<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/set-picture.gif" class="full" alt="Set the picture" />
				<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/set-picture.gif" class="thumbnail" alt="Set the picture" />
				
				<?php
				}
				?>
				
			</div>
			<!-- SMOOTH GALLERY ELEMENT - END -->

		<?php
	}
} else {
?>

<div class="imageElement">
	<h3>How to make your post to appear right here?</h3>
	<p>If you want to list your posts here, you should go to you theme's options (Appereance => Theme Options) and put the category's id. Please note that if the category doesn't consist any posts, you'll be still seeing sample posts.</p>
	<a href="#" title="open image" class="open"></a>
	<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/default.jpg" class="full" alt="Sample photo" />
	<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/default.jpg" class="thumbnail" alt="Sample photo thumb"/>
</div>
<div class="imageElement">
	<h3>How to assign a picture to a featured post?</h3>
	<p>Select a post & click edit through your admin panel. Scroll down to the section named "Custom fields" then create a field named "picture" and the value should contain a path where you stored a picture. You may also create a custom field named "url" just in case you want to link your post elsewhere.</p>
	<a href="#" title="open image" class="open"></a>
	<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/default2.jpg" class="full" alt="Sample photo #2" />
	<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/default2.jpg" class="thumbnail" alt="Sample photo #2 thumb" />
</div>
<div class="imageElement">
	<h3>About this theme</h3>
	<p>Did you know that featured posts may contain up to 3 lines of text. This theme is built using CSS framework "Blueprint". The featured posts is based on "SmoothGallery" which is based on "MooTools" - a javascript framework.</p>
	<a href="#" title="open image" class="open"></a>
	<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/default2.jpg" class="full" alt="Sample photo #2" />
	<img src="<?php echo bloginfo('template_directory'); ?>/images/photo/default2.jpg" class="thumbnail" alt="Sample photo #2 thumb" />
</div>

<?php } ?>

</div>


<script type="text/javascript">
	function startGallery() {
		var myGallery = new gallery($('myGallery'), {
			timed: true,
			showArrows: true,
			showCarousel: false,
			embedLinks: true
		});
	}
	window.addEvent('domready',startGallery);
</script>
<?php } ?>
